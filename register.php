<!--
This register.php connects database and take user input to fill table assign1 which stores user information.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN� "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>ShipOnline System</title>
  <style type="text/css">
    body {
      margin-top: 20px;
      margin-left: 10px;
      background-color: #fbebab;
    }
  </style>
</head>
<body>
  <h1>ShipOnline System Registration Page</h1>
  <form id="register" method="post" action="register.php" novalidate="novalidate"><fieldset>
    <p><label for="name">Name: </label><input type="text" id="name" name="name" size="50%"/></p>
    <p><label for="password">Password: </label><input type="password" id="password" name="password" size="50%"/></p>
    <p><label for="password2nd">Confirm Password: </label><input type="password" id="password2nd" name="password2nd" size="50%"/></p>
    <p><label for="email">Email Address: </label><input type="text" id="email" name="email" size="50%"/></p>
    <p><label for="phone">Contact Phone: </label><input type="text" id="phone" name="phone" size="50%"/></p>
    <input type="submit" value="Register" name="Register"/>
      <?php
        /*shut down warnings*/
        error_reporting(0);
        /*mysql information*/
        $connection = @mysqli_connect("feenix-mariadb.swin.edu.au", "s101272826", "010293", "s101272826_db");
        /*use table assign1*/
        @mysqli_select_db($connection, "assign1");

        if (!$connection) 
        {
            echo "<script type='text/javascript'>";
            echo "alert('Database connection failure');";
            echo "</script>";
        } else if (isset($_POST["Register"]))
        {
          /*defines*/
          $name = mysqli_real_escape_string($connection, $_POST["name"]);
          $password = mysqli_real_escape_string($connection, $_POST["password"]);
          $password2nd = mysqli_real_escape_string($connection, $_POST["password2nd"]);  
          $email = mysqli_real_escape_string($connection, $_POST["email"]); 
          $phone = mysqli_real_escape_string($connection, $_POST["phone"]); 


          /*error messages*/
          $errMsg = "";    
          /*name*/
          if ($name=="") {
            $errMsg .= "<p>You must enter your name.</p>";
          } else if (!preg_match("/^[a-zA-Z- ]*$/", $name)) {
            $errMsg .= "<p>Only alpha letters and hyphens allowed in your name.</p>";
          }
          /*password*/
          if ($password=="") {
            $errMsg .= "<p>You must enter your password.</p>";
          } else if (strlen($password) < 8) {
            $errMsg .= "<p>Password must be at least 8 characters.</p>";
          } else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $password)) {
            $errMsg .= "<p>Only alpha letters and numbers allowed in your password.</p>";
          }
          /*password2nd*/
          if ($password2nd != $password) {
            $errMsg .= "<p>Your confirm password does not match.</p>";
          }     
          /*email*/
          if ($email=="") {
            $errMsg .= "<p>You must enter your email.</p>";
          } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errMsg .= "<p>Invalid email format.</p>";
          }

          $emailquery = "SELECT DISTINCT email FROM assign1";
          $emailfromdb = mysqli_query($connection, $emailquery);   
          
          while ($emailadd = $emailfromdb->fetch_assoc()) 
          {
            $emailaddress = $emailadd['email'];
            if ($emailaddress == $email) {
              $errMsg .= "<p>You already have an account with your email.</p>";
            }
          }
          /*phone*/
          if ($phone=="") {
            $errMsg .= "<p>You must enter your phone number.</p>";
          } else if (!preg_match("/^[0-9 ]*$/", $phone)) {
            $errMsg .= "<p>Only numbers allowed in your phone number.</p>";
          }
          /*echo error messages*/
          if ($errMsg != "") {
            echo "$errMsg";
          } else 
          {
            $generatequery = "INSERT INTO assign1 (name, password, email, phone) VALUES ('$name', '$password', '$email', '$phone')";      
            $customer_numberquery = "SELECT customer_number FROM assign1 WHERE email='$email'";      
            $addcustomer = mysqli_query($connection, $generatequery);
            $customer_number = mysqli_query($connection, $customer_numberquery);
            while ($id = $customer_number->fetch_assoc()) 
            {
              $cusnum = $id['customer_number']; 
              echo '<p>Dear <b><font color="green">'.$name.'</font></b>, you are successfully registered into ShipOnline, and your customer number is <b><font color="green">'.$cusnum.'</font></b>, which will be used to get into the system.</p>';
            }
         }
        }
        mysqli_close($connection);
      ?>
  </fieldset>
  </form>
  <p><a href="shiponline.php">Home</a></p>
</body>
</html>
