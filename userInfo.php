<?php include "./commSimpleHeader.php" ?>
<?php
session_start();
if($_SESSION['loggedIn']!=true){//redirect user if they are not logged in
    header('Location: ./login.php');

}
?>
<html>
<header>

</header>
<body>
The user info page, should also provide a logout button/link

<?php include './logoutButton.php' ?>
</body>
</html>