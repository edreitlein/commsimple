<?php
session_start();

?>
<html>
    <header>
    <style>
            .createUserForm{
                box-sizing: content-box;

                background-color: lightblue;
                position:relative;
                top:20%;
                left:42%;
                padding:20px;
                width: 180px;                 
            }

        </style>
    </header>
    <script src="./scripts/checkSamePasswords.js"></script>
    <body>
        
        <div class="createUserForm">
        <?php
                if (($_SESSION["emailAlreadyExists"])==true){
                    echo "<p style='text-align:center'>Account creation failed! Email already registered!</p>";
                }

            ?>
            <form action="./createUserBackend.php", id='createAccount' method="POST" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                <label style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Create Account</label>
                <input type="text" name="firstName" placeholder="First Name" id='firstName'><br>
                <input type="text" name="lastName" placeholder="Last Name" id='lastName'><br>
                <input type="email" name="email" placeholder="Email" id='email' required="required"><br>
                <input type="text" name="password" placeholder="Password" id='pass1'><br>
                <input type="text" name="confirmpassword" placeholder="Confirm Password" id='pass2'><br>
                <input type="button" name="submitButton" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" 
                value="Submit" onclick=check()></button><!-- name of button cannot be submit --->
                <!-- <input type="submit" name="submit" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> -->
            </form>
        </div>
</body>
</html>