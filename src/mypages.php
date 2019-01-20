<?php  
    include_once("include/config.php");
    /* header("location: url); mÃ¥ste ligga innan utskrift pÃ¥ skÃ¤rmen!!!! */
    if(!isset($_SESSION['username'])) {
          header("Location: login.php?message=2");
    }
    
      if(isset($_POST['movie'])){
        $title = $_POST['movie'];
        $post = $_POST['genre'];
 
        $posts = new moviePosts();
        if($posts->registermoviePosts($title, $post)){
          $message = "<p class='message'> Filmen har lagts till i listan!</p>";
        }else{
          $message ="<p class='errormessage'> Kunde inte lägga till i listan...</p>";
        }
 
        header("Location: mypages.php");
      }
            

      
      if
      (isset ($_GET['delete'])) 
{
      if ($_SESSION['username']) {
        $post = new moviePosts();
        $post->deletemoviePosts($_GET['delete']);
      }
      } 


    

      


      include("include/head.php");
      include("include/container.php");
      include("include/nav.php") ?>

            
        
              <h1>  Mina sidor </h1> 
<div class="col-3">


<h2 class="mypages">
                   lägg till film i lista
                </h2>
   
  <form method="post" class="filmlist">
                   <div>
                    <?php
                    if(isset($message)) { echo $message; }
                    ?>
                   </div>
 
          <label for="movie" class="filmlist">Film:</label> <br>
           <input type="text" name="movie" id="movie" class="filmlist" required> <br>
         
          <label for="genre" class="filmlist">Genre: </label><br>
          <input type="text" name="genre" id="genre" class="filmlist" required> <br>
          <br>
         
            <input type="submit" name="Send" value="Lägg till i listan!" class="btnfilm" id="savePost">  
   </form>
             
           </div> 
           <div class="col-4">

           <h2 class="mypages">
                   min filmlista
                </h2>
          <table id='filmlist'>
                <tr> 
                <th> Film </th>
                <th> Genre </th>
                <th> Tillagd </th>
                <th> Ta bort </th>
                </tr>
    <?php
   
        $movielist = new moviePosts();
 
        $filmlist = $movielist->getmoviePosts("",$_SESSION['username']);
 
        foreach($filmlist as $m) {
       
          echo 
              

               "<tr>" .
               "<td class='movie'>" .$m['movie'] .  "</td>" .
               "<td class='genre'>"   .$m['genre'] . " </td>" .
               "<td class='created'>" .$m['created']  . "</td>" . 
               "<td class='delete'>" . "<a href=?delete=" . $m['ID'] . " class='delete'> Radera </a>" . "</td>" .
               "</tr>"  ;
       
        }       
?>

  </table> 
</div> 
<?php include("include/footer.php"); ?>
    </div> 
    

     
          
        </div>
    </body>
</html>

