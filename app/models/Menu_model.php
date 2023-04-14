<?php
class Menu_model {
    private $db;
    private $funcs;

    public function __construct() {
        $this->db = new Database;
        $this->funcs = new Funcs;
    }

    public function getDataById($id, $table) {
        $this->db->query("SELECT * FROM $table WHERE id = :id");
        $this->db->bind("id", $id);

        $result = [
                    "table" => $table, 
                    "record" => $this->db->single()
                ];
        return $result;
    }

    public function addMenu($data, $file, $table) {
        if($file["image"]["error"] == 4) {
            $err = ["error" => "Please upload an image"];
            return json_encode($err);
        }

        $image = $this->funcs->uploadImage($file["image"], "uploads");
        if(array_key_exists("error", (array) json_decode($image))) {
            return $image;
        }

        $query = "INSERT INTO $table
                    VALUES(
                        NULL, :menuname, :price, :discount, :description, :image
                    );
                ";
                
        $discount = (!empty($data["discount"])) ? $data["discount"] : 0;
        
        try {
            $this->db->query($query);
            $this->db->bind("menuname", htmlspecialchars($data["name"]));
            $this->db->bind("price", htmlspecialchars($data["price"]));
            $this->db->bind("discount", htmlspecialchars($discount));
            $this->db->bind("description", htmlspecialchars($data["description"]));
            $this->db->bind("image", $image);

            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e); exit;
        }

        return $this->db->rowCount();
    }

    public function deleteMenu($id, $table) {
        $image = $this->getDataById($id, $table)["record"]["image"];
        if(!unlink(__DIR__."/../../public/assets/uploads/".$image)) {
            return false;
        }

        try {
            $this->db->query("DELETE FROM $table WHERE id = :id");
            $this->db->bind("id", $id);
            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e);
            exit;
        }

        return $this->db->rowCount();
    }

    public function editMenu($data, $file, $table) {
        $id = $data["id"];

        echo $this->getDataById($id, $table)["record"]["image"];
        
        if(($file["image"]["error"] != 4)) {
            $upload = $this->funcs->uploadImage($file["image"], "uploads");
            if(array_key_exists("error", (array) json_decode($upload))) {
                return (array) json_decode($upload);
            }

            $oldimage = $this->getDataById($id, $table)["record"]["image"];
            if(!unlink(__DIR__."/../../public/assets/uploads/".$oldimage)) {
                $err = json_encode(["error" => "Can't edit menu"]);
                return (array) json_decode($err);
            }
            $image = $upload;
        } else {
            $image = $this->getDataById($id, $table)["record"]["image"];
        }

        $menuname = ($table == "drinkmenu") ? "drinkname" : "foodname";
        $discount = $data["discount"];

        $query = "UPDATE $table SET 
                    $menuname = :name, price = :price, discount = :discount,
                    description = :description, image = :image 
                    WHERE id = :id
        ";

        try {
            $this->db->query($query);
            $this->db->bind("id", $id);
            $this->db->bind("name", htmlspecialchars($data["name"]));
            $this->db->bind("price", htmlspecialchars($data["price"]));
            $this->db->bind("discount", htmlspecialchars($discount));
            $this->db->bind("description", htmlspecialchars($data["description"]));
            $this->db->bind("image", $image);

            $this->db->execute();
        } catch(PDOException $e) {
            print_r($e);
            exit;
        }

        return $this->db->rowCount();
    }
}
?>