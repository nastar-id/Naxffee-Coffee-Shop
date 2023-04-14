<?php
ob_start();

class Admin extends Controller {
    private $funcs;

    public function __construct() {
        $this->funcs = new Funcs;
    }

    public function index() {
        $this->sess();
        $data["page_title"] = "Admin Dashboard";
        $data["nav_type"] = "Dashboard";

        $this->view("templates/header", $data);
        $this->view("templates/navigation", $data);
        $this->view("admin/index");
        $this->view("templates/footer");
    }

    public function login() {
        $data["page_title"] = "User Login";

        $this->view("templates/header", $data);
        $this->view("admin/login", $data);
        $this->view("templates/footer");
    }

    public function loginAction() {
        $check = $this->model("Admin_model")->userLogin($_POST["username"], $_POST["password"]);
        echo $check;
        if($check["status"] == "true") {
            session_start();
            $_SESSION["login"] = true;

            Flash::setFlash("Success!", "Berhasil login", "success");
            header("Location: " . BASE_URL . "admin");
        } else {
            Flash::setFlash("Failed!", "Username atau password salah", "danger");
            header("Location: " . BASE_URL . "admin/login");
        }
    }

    public function sess() {
        if(!isset($_SESSION["login"])) {
            header("Location: " . BASE_URL . "admin/login");
            exit;
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL . "admin/login");
    }

    public function profile() {
        $this->sess();
        $data["page_title"] = "Admin Profile";
        $data["nav_type"] = "Dashboard";

        $db = new Database;
        $db->query("SELECT * FROM admin");
        $data["admin"] = $db->single();

        $this->view("templates/header", $data);
        $this->view("templates/navigation", $data);
        $this->view("admin/profile", $data);
        $this->view("templates/footer");
    }

    // Dashboard menu
    public function menu($url = null) {
        $this->sess();
        if($url == null) header("Location: " . BASE_URL . "user");

        $data["nav_type"] = "Dashboard";

        if($url == "drink") {
            $data["page_title"] = "Drink Menu";
            $data["drinkmenu"] = $this->model("Admin_model")->getData("drinkmenu");

            $this->view("templates/header", $data);
            $this->view("templates/navigation", $data);
            $this->view("admin/drink-menu", $data);
            $this->view("templates/footer");
        } elseif($url == "food") {
            $data["page_title"] = "Food Menu";
            $data["foodmenu"] = $this->model("Admin_model")->getData("foodmenu");

            $this->view("templates/header", $data);
            $this->view("templates/navigation", $data);
            $this->view("admin/food-menu", $data);
            $this->view("templates/footer");
        } else {
            header("Location: " . BASE_URL . "user");
        }
    }

    public function gallery() {
        $this->sess();
        $data["page_title"] = "Gallery";
        $data["nav_type"] = "Dashboard";
        $data["gallery"] = $this->model("Admin_model")->getData("gallery");

        $this->view("templates/header", $data);
        $this->view("templates/navigation", $data);
        $this->view("admin/gallery", $data);
        $this->view("templates/footer");
    }

    public function slider() {
        $this->sess();
        $data["page_title"] = "Slider";
        $data["nav_type"] = "Dashboard";
        $data["slider"] = $this->model("Admin_model")->getData("slider");

        $this->view("templates/header", $data);
        $this->view("templates/navigation", $data);
        $this->view("admin/slider", $data);
        $this->view("templates/footer");
    }

    public function news() {
        $this->sess();
        $data["page_title"] = "Manage News";
        $data["nav_type"] = "Dashboard";
        $data["news"] = $this->model("Admin_model")->getData("news");

        $this->view("templates/header", $data);
        $this->view("templates/navigation", $data);
        $this->view("admin/news", $data);
        $this->view("templates/footer");
    }

    public function getEdit() {
        $this->sess();
        $get = ($_POST["table"] == "gallery") ? $this->model("Gallery")->getDataById($_POST["id"])
             : ($_POST["table"] == "news" ? $this->model("News_model")->getDataById($_POST["id"])
             : $this->model("Menu_model")->getDataById($_POST["id"], $_POST["table"]));
        echo json_encode($get);
    }

    public function action($action, $type = null, $id = null) {
        $this->sess();
        if($action == null) header("Location: " . BASE_URL . "user");
        $data["nav_type"] = "Dashboard";

        if($action == "add") {
            $this->funcs->addData($_POST, $_FILES, $_POST["table"], $type);
        } elseif($action == "delete") {
            $this->funcs->deleteData($id, $type);
        } elseif($action == "edit") {
            $this->funcs->editData($_POST, $_FILES, $_POST["table"], $type);
        }
    }
}
?>