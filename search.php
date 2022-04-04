<!-- This is a secondary search page. It opens after something was entered into the search bar on the home page.
Listings must be displayed here. -->
<!DOCTYPE html>
<html>
<head>
	<title>Outwyrd</title>

	<link rel="stylesheet" type="text/css" href="style.css">			<!-- linking style.css-->

</head>
<body>

	<div class="wrapper">
    <div class="header">
      <div class="headerContent">

        <div class="logoContainer">
          <a href="home.php">
            <img src="assets/logo.png">
          </a>
        </div>

        <div class="searchContainer">
          <form action="search.php" method="GET">
            <div class="searchBarContainer">
              <input class="searchBox" type="text" name="term">
              <button class="searchButton">
								 <img src="assets/searchIcon.png"></a>
							</button>
            </div>
          </form>
        </div>

     </div>
    </div>
	</div>



</body>
</html>
