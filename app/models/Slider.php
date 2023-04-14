<?php
class Slider {
    private $db;
    private $funcs;

    public function __construct() {
        $this->db = new Database;
        $this->funcs = new Funcs;
    }

    public function getDataById($id) {
        $this->db->query("SELECT * FROM slider WHERE id = :id");
        $this->db->bind("id", $id);

        $result = $this->db->single();
        return $result;
    }

    public function addImage($post, $file) {
        if($file["image"]["error"] == 4) {
            $err = ["error" => "Please upload an image"];
            return json_encode($err);
        }

        $image = $this->funcs->uploadImage($file["image"], "slider");
        if(array_key_exists("error", (array) json_decode($image))) {
            return $image;
        }

        $query = "INSERT INTO slider VALUES(NULL, :title, :image);";
        try {
            $this->db->query($query);
            $this->db->bind("title", $post["title"]);
            $this->db->bind("image", $image);
            $this->db->execute();
        } catch(PDOException $e) {
            print_r($e);
            exit;
        }

        return $this->db->rowCount();
    }

    public function deleteImage($id) {
        $image = $this->getDataById($id)["image"];
        if(!unlink(__DIR__."/../../public/assets/slider/".$image)) {
            return false;
        }

        try {
            $this->db->query("DELETE FROM slider WHERE id = :id");
            $this->db->bind("id", $id);
            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e);
            exit;
        }

        return $this->db->rowCount();
    }

    public function editImage($post, $file) {
        $id = $post["id"];
        if(($file["image"]["error"] != 4)) {
            $upload = $this->funcs->uploadImage($file["image"], "slider");
            if(array_key_exists("error", (array) json_decode($upload))) {
                return (array) json_decode($upload);
            }

            $oldimage = $this->getDataById($id)["image"];
            unlink(__DIR__."/../../public/assets/slider/".$oldimage);
            $image = $upload;
        } else {
            $image = $this->getDataById($id)["image"];
        }

        $query = "UPDATE slider SET title = :title, image = :image WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("title", htmlspecialchars($post["title"]));
        $this->db->bind("image", $image);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>