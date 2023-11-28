<?php

class UserModel extends Model
{
     function __destruct()
     {
          $this->query = null;
     }

     function login()
     {
          try {
               // We check if holidays table exists or not
               $this->query = $this->db->connect()->prepare("SELECT 1 FROM user LIMIT 1");

               if (!$this->query) {
                    // Holiday does not exist, we create it dinamically
                    require_once("./resources/createUser.php");
               }

               $this->query = $this->db->connect()->prepare("SELECT password FROM user WHERE email = '{$_POST['email']}'");
               $this->query->execute();
               $result = $this->query->fetch();
               if (!$result) {
                    unset($_POST);
                    return false;
               } else {
                    $password = $result['password'];

                    if (password_verify($_POST['password'], $password)) {
                         unset($_POST);
                         return true;
                    }
               }
          } catch (PDOException $e) {
               unset($_POST);
               return false;
          }
     }
}
