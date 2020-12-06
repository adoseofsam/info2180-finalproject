<?php
    include_once 'sidebar.php';

?>

<section class='signup-form'>
    <h2> New User </h2> <br>
    <form  action="includes/signup.inc.php" method="post">
        <input type="text" name= " Firstname" placeholder= "First Name">
        <input type="text" name= " Lastname" placeholder= "Last Name">
        <input type="password" name= " pwd" placeholder= "Password">
        <input type="text" name= "email" placeholder= "Email">  
        <button type='submit' name="submit"> Submit </button>
    </form>
  
</section>
    

<?php
    include_once 'footer.php';
?>