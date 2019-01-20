<?php



// Av Matilda Wiklund, 2018-08-20


class moviePosts {
   
private $db;
private $ID; 
private $username; 
private $movie; 
private $genre; 

        // Constructor
        function __construct() {
            // Connect to database 
            $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE); 
            if($this->db->connect_errno > 0) {
                die("Fel vid anslutning: " . $this->db->connect_error);
            }
        }

        // Register new post 
        public function registermoviePosts( $movie, $genre) {
            $title = $this->db->real_escape_string($movie);
            $post = $this->db->real_escape_string($genre);

            $sql = "INSERT INTO movies(userID, movie, genre) VALUES ((SELECT userID FROM users WHERE username = '{$_SESSION['username']}'), '$movie', '$genre')";
             return $result = $this->db->query($sql);
            
         


            $result = $this->db->query($sql);  
            
            return $result; 
        }

        // Get post 

        public function getmoviePosts( $num = "", $username = ""){
        	$where = "";
        	$limit = "";
        	if (!empty($username)) {
        		$where = "WHERE movies.userID = (SELECT users.userID FROM users WHERE username = '$username') ";
        	}

        	if (!empty($num)) {
        		$limit = "LIMIT $num";
        	}

           $sql = <<<__ENDIF
        SELECT movies.*, users.username FROM movies
            LEFT JOIN users 
            ON users.userID = movies.userID 
            $where
            ORDER BY movies.created DESC
            $limit;
__ENDIF;
$result = $this->db->query($sql) or die($this->db->error);
           
            $array = array();
 while($row = $result->fetch_assoc())
   $array[] = $row;
 return $array;
        } 


        public function getmoviePostsFromId($ID){
            $ID=intval($ID); 
            $sql = "SELECT * FROM movies WHERE id=$ID"; 

            $result = $this->db->query($sql); 
            $row = mysqli_fetch_array($result); 

            return $row;
        }        
          

        // Delete post 

        public function deletemoviePosts($ID){
            $ID = intval($ID); 
            $sql =  "DELETE  FROM movies WHERE ID=$ID"; 
            $this->db->query($sql); 
        }


}

