<!--
This login.php connects database and take user input to find information in assign1 table, if information is found then allow user to use request.php.
-->
<?php
  /*turn off warnings*/
  error_reporting(0);
  /*connect database*/
  //start session
  session_start();
  /*define databse information*/
  $connection = @mysqli_connect("feenix-mariadb.swin.edu.au", "s101272826", "010293", "s101272826_db");
  $sql_table = @mysqli_select_db($connection, "assign1");
  if (!$connection) 
  {
    /*popup notification if errors occur when trying to connect database*/
    echo "<script type='text/javascript'>";
    echo "alert('Database connection failure');";
    echo "</script>";
  } else 
  { 
    if (isset($_POST["customerid"]) and isset($_POST["password"]))
    {
      $customerid = mysqli_real_escape_string($connection, $_POST["customerid"]);
      $password = mysqli_real_escape_string($connection, $_POST["password"]);
      $query = "SELECT * FROM assign1 WHERE customer_number='$customerid' and password='$password'";
      $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
      //if username and password are found in table in the same row, means the login detail is correct
      $count = mysqli_num_rows($result);
      if (!isset($_SESSION["customer_number"])) 
      {
        $_SESSION["customer_number"] = false;
      }
      if ($count == 1)
      {
         //if login detail is correct, start login session
        $_SESSION["customer_number"] = true;
        header ("location: request.php");
      }
      /*Assign session name with customer ID*/
      $_SESSION["customer_number"] = $customerid;
    }
  }
  if (!$_SESSION['customer_number']) :
?>
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
  <h1>ShipOnline System Login Page</h1>
  <form method="post" id="login"><fieldset>
    <p><label for="customerid">Customer Number: </label><input type="text" id="customerid" name="customerid" size="50%"/></p>
    <p><label for="password">Password: </label><input type="password" id="password" name="password" size="50%"/></p>
    <input type="submit" name="Login" value="Login"/>
    <?php
      if (isset($_POST["customerid"]) and isset($_POST["password"])) {
       if ($count != 1) {
        echo "<p>Please login again.</p>";
       }
      }
    ?>
  </fieldset>
  </form>
  <p><a href="shiponline.php">Home</a></p>
</body>
</html>
<?php
  exit();
  endif;
?>