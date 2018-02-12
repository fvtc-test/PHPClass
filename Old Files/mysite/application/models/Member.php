<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model
{

    public function user_login($email, $Password)
    {
        $this->load->database();
        $this->load->library('session');
        try {
            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options);
            $sql = $db->prepare("select userID, userPassword, userKey from login where userEmail = :Email AND roleID=2");
            $sql->bindValue(":Email", $email);
            $sql->execute();
            $row = $sql->fetch();
            if ($row != null) {

                $hashedPassword = md5($Password . $row["userKey"]);
                if ($hashedPassword == $row["userPassword"]) {
                    $this->session->set_userdata(array("UID" => $row["userID"]));
                    // $_SESSION["Role"] = $row["roleID"];
                    return true;
                } else {
                    return false;

                }
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }

    }

    public function create_user($Name, $Email, $Password)
    {
        $key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

        $this->load->database();
        $this->load->library('session');

        try {
            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options);
            $sql = $db->prepare("insert into login (username,userEmail,userPassword, roleID,userKey) VALUE(:Name,:Email,:Password,:roleID, :Key)");
            $sql->bindValue(":Name", $Name);
            $sql->bindValue(":Email", $Email);
            $sql->bindValue(":Password", md5($Password . $key));
            $sql->bindValue(":roleID", 2);
            $sql->bindValue(":Key", $key);
            $sql->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}

