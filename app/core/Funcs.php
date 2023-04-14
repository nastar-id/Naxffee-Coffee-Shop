<?php
class Funcs extends Database {
    private $control;

    public function __construct() {
        $this->control = new Controller;
    }

    public function addData($post, $file, $table, $type) {
        $check = ($type == "menu") ? $this->control->model("Menu_model")->addMenu($post, $file, $table)
               : ($type == "gallery" ? $this->control->model("Gallery")->addImage($post, $file)
               : ($type == "news" ? $this->control->model("News_model")->addNews($post, $file)
               : $this->control->model("Slider")->addImage($post, $file)));
 
        $url = ($table == "drinkmenu") ? "menu/drink"
             : ($table == "foodmenu" ? "menu/food"
             : ($type == "gallery" ? "gallery"
             : ($type == "news" ? "news"
             : "slider")));

        $error = (array) json_decode($check);
        if(array_key_exists("error", $error)) {
            Flash::setFlash("Failed!", $error["error"], "danger");
            header("Location: " . BASE_URL . "admin/$url");
        } elseif($check > 0) {
            Flash::setFlash("Success!", "Data successfully added", "success");
            header("Location: " . BASE_URL . "admin/$url");
        } else {
            Flash::setFlash("Failed!", "Failed to add data", "danger");
            header("Location: " . BASE_URL . "admin/$url");
        }
    }

    public function deleteData($id, $type) {
        $table = ($type == "drink") ? "drinkmenu"
               : ($type == "food" ? "foodmenu"
               : ($type == "gallery" ? "gallery"
               : ($type == "news" ? "news"
               : "slider")))
        ;
        $url = ($table == "drinkmenu") ? "menu/drink"
             : ($table == "foodmenu" ? "menu/food"
             : ($type == "gallery" ? "gallery"
             : ($type == "news" ? "news"
             : "slider")))
        ;
        $check = ($type == "drink" || $type == "food") ? $this->control->model("Menu_model")->deleteMenu($id, $table)
               : ($type == "gallery" ? $this->control->model("Gallery")->deleteImage($id)
               : ($type == "news" ? $this->control->model("News_model")->deleteNews($id)
               : $this->control->model("Slider")->deleteImage($id)))
        ;

        if($check > 0) {
            Flash::setFlash("Success!", "Data successfully deleted", "success");
            header("Location: " . BASE_URL . "admin/$url");
        } else {
            Flash::setFlash("Failed!", "Failed to delete data", "danger");
            header("Location: " . BASE_URL . "admin/$url");
        }
    }

    public function editData($post, $file, $table, $type) {
        $check = ($type == "menu") ? $this->control->model("Menu_model")->editMenu($post, $file, $table)
               : ($type == "gallery" ? $this->control->model("Gallery")->editImage($post, $file)
               : ($type == "news" ? $this->control->model("News_model")->editNews($post, $file)
               : ($type == "slider" ? $this->control->model("Slider")->editImage($post, $file)
               : $this->control->model("Admin_model")->editUser($post, $file))));
 
        $url = ($table == "drinkmenu") ? "menu/drink"
             : ($table == "foodmenu" ? "menu/food"
             : ($type == "gallery" ? "gallery"
             : ($type == "news" ? "news"
             : ($type == "slider" ? "slider"
             : "profile"))));

        if(!is_numeric($check)) {
            Flash::setFlash("Failed!", $check["error"], "danger");
            header("Location: " . BASE_URL . "admin/$url");
        } elseif($check > 0) {
            Flash::setFlash("Success!", "Data successfully editted", "success");
            header("Location: " . BASE_URL . "admin/$url");
        } else {
            Flash::setFlash("Failed!", "Failed to edit data", "danger");
            header("Location: " . BASE_URL . "admin/$url");
        }
    }

    public function uploadImage($file, $folder) {
        $filename = $file["name"];
        $filesize = $file["size"];
        $tmp_name = $file["tmp_name"];
        $fileext = explode(".", $filename);
        $fileext = strtolower(end($fileext));

        $allowedExt = ["jpg", "jpeg", "png", "gif"];
        
        if($filesize > 5000000) {
            $err = ["error" => "File size is too big"];
            return json_encode($err);
        }
        if(!in_array($fileext, $allowedExt)) {
            $err = ["error" => "Forbidden file extension"];
            return json_encode($err);
        }

        $new_name = "IMG_".uniqid().".$fileext";
        $upload_dir = ($folder == "uploads" || $folder == "gallery") ? __DIR__."/../../public/assets/$folder/$new_name" : __DIR__."/../../public/$folder/$new_name";
        if(!move_uploaded_file($tmp_name, $upload_dir)) {
            $err = ["error" => "Failed to upload file"];
            return json_encode($err);
        }

        return $new_name;
    }
}
