<?php
class Home extends Controller {
    public function index() {
        $data["page_title"] = "Homepage";
        $data["nav_type"] = "Main";
        
        $data["slider"] = $this->model("Admin_model")->getData("slider");
        $data["food"] = $this->model("Admin_model")->getData("foodmenu");
        $data["drink"] = $this->model("Admin_model")->getData("drinkmenu");
        $data["gallery"] = $this->model("Admin_model")->getData("gallery");
        $data["news"] = $this->model("Admin_model")->getData("news");

        $this->view("templates/header", $data);
        $this->view("templates/navigation", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer", $data);
    }
}
?>