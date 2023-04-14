<?php
class News extends Controller {
    public function index($slug = null) {
        $data["nav_type"] = "Main";
        $data["nav_active"] = "active";

        $this->view("templates/navigation", $data);
        
        if(!is_null($slug)) {
            $data["detail"] = $this->model("News_model")->getDataBySlug($slug);
            if($data["detail"] == false) header("Location: " . BASE_URL . "news");
            
            $data["page_title"] = "Naxffee - ".$data["detail"]["title"];
            $data["news"] = $this->model("Admin_model")->getData("news");
            $data["admin"] = $this->model("Admin_model")->getData("admin");
            
            $this->view("templates/header", $data);
            $this->view("home/news-detail", $data);
        } else {
            $data["page_title"] = "Naxffee - News";
            $data["news"] = $this->model("Admin_model")->getData("news");
    
            $this->view("templates/header", $data);
            $this->view("home/news", $data);
        }

        $this->view("templates/footer", $data);
    }
}
?>