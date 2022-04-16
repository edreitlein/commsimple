<?php 


// include "./commSimpleHeader.php"
include "newHeader.php"
?>
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

<div style='padding:.75rem;'>
The user info page, should also provide a logout button/link
<br>
<button onClick="javascript:window.location.href='./uploadListing.php'">Upload Listing</button>
<br>
<button onClick="javascript:window.location.href='./listings.php'">View All Listings</button>
<br>

<?php include './logoutButton.php' ?>
</div>
</body>
</html>