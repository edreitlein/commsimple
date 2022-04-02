<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "./databaseInit.php";
include "./commSimpleHeader.php";
// this page should take listing information and upload it to the database

//database fields
/*
listingID
user_id
timeListed
addressStreet
addressCity
addressState
addressZipcode
saleType
description
*/
session_start();
if($_SESSION['loggedIn']!=true){
    header('Location: ./login.php');

}



if($_POST["submit"]==true){         //when submit button is pressed
    echo '<script type="text/javascript">
        alert("good to submit");
        </script>';
    //                                     int        text         text        text        text            text    longtext
    $insertQuery = "INSERT INTO listings (user_id,addressStreet,addressCity,addressState,addressZipcode,saleType,description) VALUES (?,?,?,?,?,?,?)";//may have to work with current_timestamp
    $stmd = $mysqli->prepare($insertQuery);
    $stmd->bind_param("issssss",$_SESSION['user_id'],$_POST["addressStreet"],$_POST["addressCity"],$_POST['addressState'],$_POST['addressZipcode'],$_POST['saleType'],$_POST['description']);
    // if($stmd->execute()){ removed for testing
    //     echo '<script>alert("listing uploaded!")</script>';
    // //    header('Location: ./home.php');

    // }else{
    //     echo "<br>Failed<br>Contact local admin<br>";
    //     echo($stmd->error);
    // }


    $listingImages='./listingImages';

    foreach($_FILES['files']['error'] as $key=>$error){
        if($error==0){
            $tmp_name = $_FILES['files']["tmp_name"][$key];
            $name=basename($_FILES['files']['name'][$key]);
            move_uploaded_file($tmp_name,"$listingImages/$name");


        }else{
            echo("error not 0");
        }
    }
    

    echo("<htlm><br></html>");
    echo(count($_FILES['files']['name']));
    $filesUploadedCount = count($_FILES['files']['name']);
    echo("<htlm><br></html>");

    foreach($_FILES['files'] as $file){
        var_dump($file);
    echo("<htlm><br></html>");

    }
    foreach($_FILES['files']['name'] as $file){
        var_dump($file);
    echo("<htlm><br></html>");

    }

}
?>
<html>

    <header>
        <style>
            .upload{
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                padding:.75rem;

            }
            textarea{
                vertical-align:top;
            }
        </style>

    </header>
    <body>
        
        <div class='upload'>
            <form action="<?php $_PHP_SELF ?>", id='uploadListing' method="POST" enctype="multipart/form-data">
                        <label style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Upload Listing</label><br>
                        <label>Street Address: </label>
                        <input type="text" name="addressStreet" placeholder="Street Address" id='addressStreet' required><br>
                        <label>City: </label>
                        <input type="text" name="addressCity" placeholder="City" id='addressCity' required><br>
                        <label>State: </label>
                        <select name='addressState' id='addressState' reqired>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select><br>
                        <!-- <input type="text" name="addressState" placeholder="State" id='addressState'><br> -->
                        <label>Area Code: </label>
                        <input type='text' name='addressZipcode' placeholder='00000' id='addressZipcode' required><br>
                        <label>Sale Type: </label>
                        <select name='saleType' id='saleType' required>
                            <option value="Sale">Sale</option>
                            <option value="Auction">Auction</option>
                            <option value="Rent">Rent</option>
                            <option value="Lease">Lease</option>
                        </select><br>
                        <!-- <input type="text" name="saleType" placeholder="Sale Type" id='saleType'><br> -->
                        <label>Description:</label><br>
                        <textarea id='description' name='description' rows='10' cols='50' placeholder='Suggestions: Additional Facilities, Parking, Proximity to Main Roads, Property Taxes, ect.'></textarea><br>
                        <!-- <input type="text" name="description" placeholder="Description" id='description'><br> -->


                        <!-- image uploading -->

                        <label for="files">Upload Images:</label>
                        <input type="file" id="files" name="files[]" accept="image/*, .jpeg, .png, .tif" multiple><br>
                        
                        
                        <input type="submit" value="Submit" name="submit" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                        <!-- <input type="button" name="submitButton" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" 
                        value="Submit" onclick=check()></button>name of button cannot be submit - -->
                        <!-- <input type="submit" name="submit" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> -->
            </form>
        </div>
        </body>

</html>

<?php
$stmd->close();
$mysqli->close();
?>
