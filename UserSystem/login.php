<?php
    include_once 'sidebar.php';

?>

<section class=signup-form>
    <h2> Login </h2> <br>
    <form  action="includes/login.inc.php" method="post">
        <input type="text" name= "email" placeholder= "Email Address">
        <input type="password" name= "pwd" placeholder= "Password">
        <button type='submit' name="submit"> Login </button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput" ){
            echo " <p> Fill in all fields ! </p> ";
         }
         else if ($_GET["error"]== wronglogin){
            echo " <p> Incorrect Login Info </p> ";
         }
    }
?>
</section>
    

<?php
    include_once 'footer.php';
?>