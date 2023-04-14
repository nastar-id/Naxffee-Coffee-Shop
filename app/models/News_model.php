<?php
class News_model {
    private $db,
            $funcs;

    public function __construct() {
        $this->db = new Database;
        $this->funcs = new Funcs;
    }

    public function getDataById($id) {
        $this->db->query("SELECT * FROM news WHERE id = :id");
        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function getDataBySlug($slug) {
        $this->db->query("SELECT * FROM news WHERE slug = :slug");
        $this->db->bind("slug", $slug);
        $this->db->execute();
        
        if($this->db->rowCount() > 0) {
            return $this->db->single();
        } else {
            return false;
        }
    }

    public function slugNews($string) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return $slug;
    }

    public function getDate() {
        $date = date("d M Y");
        $date = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', ' - ', $date)));

        return $date;
    }

    public function addNews($post, $file) {
        if($file["image"]["error"] == 4) {
            $err = ["error" => "Please upload an image"];
            return json_encode($err);
        }

        $image = $this->funcs->uploadImage($file["image"], "uploads");
        if(array_key_exists("error", (array) json_decode($image))) {
            return $image;
        }

        $query = "INSERT INTO news VALUES(NULL, :title, :news, :image, :slug, :date);";
        $this->db->query($query);
        $this->db->bind("title", $post["title"]);
        $this->db->bind("news", $post["news"]);
        $this->db->bind("image", $image);
        $this->db->bind("slug", $this->slugNews($post["title"]));
        $this->db->bind("date", $this->getDate());

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteNews($id) {
        $image = $this->getDataById($id)["image"];
        unlink(__DIR__."/../../public/assets/uploads/".$image);

        try {
            $this->db->query("DELETE FROM news WHERE id = :id");
            $this->db->bind("id", $id);
            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e);
            exit;
        }

        return $this->db->rowCount();
    }

    public function editNews($post, $file) {
        $id = $post["id"];
        if(($file["image"]["error"] != 4)) {
            $upload = $this->funcs->uploadImage($file["image"], "uploads");
            if(array_key_exists("error", (array) json_decode($upload))) {
                return (array) json_decode($upload);
            }

            $oldimage = $this->getDataById($id)["image"];
            if(!unlink(__DIR__."/../../public/assets/uploads/".$oldimage)) {
                $err = json_encode(["error" => "Can't edit menu"]);
                return (array) json_decode($err);
            }
            $image = $upload;
        } else {
            $image = $this->getDataById($id)["image"];
        }

        $query = "UPDATE news SET title = :title, news = :news, image = :image, slug = :slug, date = :date WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->bind("title", $post["title"]);
        $this->db->bind("news", $post["news"]);
        $this->db->bind("image", $image);
        $this->db->bind("slug", $this->slugNews($post["title"]));
        $this->db->bind("date", $this->getDate());

        $this->db->execute();
        return $this->db->rowCount();
    }
}
?>