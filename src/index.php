<?php  
    include_once("include/config.php");
    /* header("location: url); mÃ¥ste ligga innan utskrift pÃ¥ skÃ¤rmen!!!! */
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $email = $_POST['email']; 
        $password = $_POST['password']; 
       
       

        
    }
      include("include/head.php");
      include("include/container.php");
      include("include/nav.php") ?>


            <div class="col-1">
            <h1>Filmlistan 2019</h1>
            </div>

            <div class="col-2">

                <h2 class="index">
                   - skapa din lista med filmer du önskar se under 2019 -
                </h2>

            </div>
            <?php include("include/footer.php"); ?>
   
    </body>
</html>