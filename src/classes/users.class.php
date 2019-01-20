<?php

/* Klassfil för att hantera användare 
* Matilda Viklund, mavi1700 
* Projektarbete i kursen webbutveckling III, DT173G 
    - Återanvändning av kod från kursen Webbutveckling III, Augusti 2018 
*/ 

class Users{
    private $db; 
    private $username; 
    private $email;
    private $password; 

    // Constructor 
    function __construct(){
        // Connect to database
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE); 
        if($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error); 
        }
    }
        // Register new user 
        public function registerUser($username, $email, $password) {
            $username = $this->db->real_escape_string($username);
            $email = $this->db->real_escape_string($email); 
            $password = $this->db->real_escape_string($password); 

            $sql = "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')"; 

            $result = $this->db->query($sql);

            return $result;

        }


        // Log in existing user 
        
        public function loginUser($username, $password){
            $username = $this->db->real_escape_string($username); 
            $password = $this->db->real_escape_string($password); 

            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $this->db->query($sql);

            if($result->num_rows > 0){
                $_SESSION['username'] = $username;
                return true;
            }else{
                return false; 
            }
        }

        // Check if username is available 

        public function userAvailable($username){
            $username = $this->db->real_escape_string($username); 

            $sql = "SELECT username FROM users WHERE username='$username'"; 

            $result = $this->db->query($sql); 

            if($result->num_rows > 0){
               return true;
            }else{
                return false;
            }
        }

        // Get user 

        public function getUsers($num = "", $username = ""){
            $sql = "SELECT * FROM users ORDER BY created DESC"; 
            $result = $this->db->query($sql);

            $array = array();
 while($row = $result->fetch_assoc())
   $array[] = $row;
 return $array; 
        }

}