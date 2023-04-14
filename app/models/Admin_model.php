<?php
class Admin_model {
    private $funcs,
            $db;

    public function __construct() {
        $this->db = new Database;
        $this->funcs = new Funcs;
    }

    public function getData($table) {
        $this->db->query("SELECT * FROM $table ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function userLogin($uname, $upass) {
        $return = [];

        $query = "SELECT * FROM admin WHERE username = :username";

        try {
            $this->db->query($query);
            $this->db->bind("username", $uname);
            $this->db->execute();
        } catch (PDOException $e) {
            print_r($e); die;
        }

        if($this->db->rowCount() == 1) {
            $user_data = $this->db->single();
            if(password_verify($upass, $user_data["password"])) {
                $return["status"] = "true";
                $return["user_id"] = $user_data["id"];
                return $return;
            }
        }

        $return["status"] = "false";
        return $return;
    }

    public function editUser($data, $file) {
        if($data["password"] != $data["password2"]) {
            $err = json_encode(["error" => "Password confirmation doesn't match"]);
            return (array) json_decode($err);
        }

        $admin = $this->getData($data["table"])[0];
        if($file["image"]["error"] != 4) {
            unlink(__DIR__."/../../public/img/".$admin["image"]);
            $uploadImg = $this->funcs->uploadImage($file["image"], "img");
            if(array_key_exists("error", (array) json_decode($uploadImg))) {
                return (array) json_decode($uploadImg);
            }

            $image = $uploadImg;
        } else {
            $image = $admin["image"];
        }

        $id = $data["id"];
        $pass = (empty($data["password"])) ? $admin["password"] : password_hash($data["password"], PASSWORD_DEFAULT);

        $query = "UPDATE admin SET name = :name, email = :email, username = :username, password = :password, image = :image WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->bind("name", $data["name"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("username", $data["username"]);
        $this->db->bind("password", $pass);
        $this->db->bind("image", $image);

        $this->db->execute();
        return $this->db->rowCount();
    }
}