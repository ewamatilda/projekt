
<?php 
      include("include/config.php");
   

    

      if(isset($_POST['username'])) {
          $username = $_POST['username'];
          $email = $_POST['email']; 
          $password = $_POST['password']; 
         
         

          $users = new users(); 
          if($users->userAvailable($username)){
              $message="<p class='errormessage'> Användarnamnet är upptaget!</p>"; 
          }else{
          if($users->registerUser($username,  $email, $password)){
              $message ="<p class='message'>Användare skapad!</p>"; 
          }else{
              $message ="<p class='errormessage'> Fel vid lagring av användare...</p>"; 
         
         }
        }
      }
?> 
 <?php  include("include/head.php");
      include("include/container.php");
      include("include/nav.php") ?>

              
              <div class="col-01">
<div class="col-1">
<h1 class="reg"> Registrera </h1> 
   
<div class="reg">
    <form method="post" class="reg">

    <?php
        if(isset($message)){ echo $message; } 
    ?>
       

        <label for="username" class="reg">Användarnamn:</label> <br><input type="text" name="username" id="username"  class="reg" required>
        <br>

        <label for="email"  class="reg">Epost:</label> <br><input type="text" name="email" id="email"  class="reg" required> 
        <br>

         <label for="password"  class="reg">Lösenord:</label> <br><input type="password" name="password" id="password"  class="reg" required> 
        <br>

        <input type="checkbox" id="confirm" onchange="confirmSave()"  class="confirm">
        <label for="confirm"  class="reg">Jag godkänner att ovanstående uppgifter lagras i syfte för inloggning.</label>
        <br>

        <input type="submit" value="Registrera!" class="btn" id="saveButton" disabled>
    </form>
    </div>
       </div>
    </div>

     <?php include("include/footer.php"); ?>

  
    
    <script>
        function confirmSave(){
            if(document.getElementById("confirm").checked){
                document.getElementById("saveButton").disabled = false; 
            }else{
                documet.getElementById("saveButton").disabled = true;
            }
        }
    </script>
