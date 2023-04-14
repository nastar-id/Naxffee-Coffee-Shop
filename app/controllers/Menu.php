<?php
class Menu extends Controller {
    public function index() {
        $data["page_title"] = "Naxffee - Menu List";
        $data["nav_type"] = "Main";
        $data["nav_active"] = "active";
        
        $data["drink"] = $this->model("Admin_model")->getData("drinkmenu");
        $data["food"] = $this->model("Admin_model")->getData("foodmenu");
        $data["news"] = $this->model("Admin_model")->getData("news");

        $this->view("templates/header", $data);
        $this->view("templates/navigation", $data);
        $this->view("home/menu", $data);
        $this->view("templates/footer", $data);
    }
}
?>