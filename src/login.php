<?php 
      include_once("include/config.php");

      /*  Location can't be sent after output started (in head.php) */

      $message = ""; // Default value of $message is empty string

      if(isset($_POST['username'])) {
          $username = $_POST['username'];
          $password = $_POST['password']; 

          $users = new users(); 
          if($users->loginUser($username, $password)){
              header("Location: mypages.php"); 
          }else{
              $message = "<p class='errormessage'> Felaktigt användarnamn eller lösenord </p>";
              /* Add output of $message on page */
          }
      }

?>

 <?php  include("include/head.php");
      include("include/container.php");
      include("include/nav.php") ?>

<div class="col-01">
<div class="col-1">
<h1 class="reg">  Logga in </h1> 
   
   <form method="post" action="login.php" class="login">
         <label for="username" class="userlogin">Användarnamn:</label> 
         <br>
         <input type="text" name="username" id="username" class="userlogin">
           
         <br> 
         <label for="password" class="passlogin">Lösenord:</label>
         <br>
         <input type="password" name="password" id="password" class="passlogin">
         <br> 
         <input type="submit" value="Logga in!" class="submit">
   </form>
       </div>
    </div>

     <?php include("include/footer.php"); ?>
  