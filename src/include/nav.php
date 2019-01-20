<ul class="nav">
                    <li class="nav"><a href="index.php">hem</a></li>
                    <li class="nav"><a href="register.php">registrera</a></li>
                    <li class="nav"><a href="mypages.php">mina sidor</a></li>

                           <?php 
            if (isset($_SESSION['username'])) {            
                 echo "<li class='logout'> <a href='?logout'> Logga ut </a> </li>";
           
            } else {
                 echo "<li class='nav'> <a href='login.php'> Logga in </a> </li>";
            }
?>   
                </ul>