<!--
This request.php connects database and take user input to fill table request_assign1 which stores request information.
-->
<?php
  require('login.php');
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
  <h1>ShipOnline System Request Page</h1>
  <form id="request" method="post"><fieldset>
    <p>Item Information</p>    
    <fieldset>
      <p><label for="itemdesc">Description: </label><input type="text" id="itemdesc" name="itemdesc" size="70%"/></p>
      <p><label for="itemweight">Weight: </label><select id="itemweight" name="itemweight">
        <option value="none">Select Weight</option>
        <option value="1">1 kg</option>
        <option value="2">2 kg</option>
        <option value="3">3 kg</option>
        <option value="4">4 kg</option>
        <option value="5">5 kg</option>
        <option value="6">6 kg</option>
        <option value="7">7 kg</option>
        <option value="8">8 kg</option>
        <option value="9">9 kg</option>
        <option value="10">10 kg</option>
        <option value="11">11 kg</option>
        <option value="12">12 kg</option>
        <option value="13">13 kg</option>
        <option value="14">14 kg</option>
        <option value="15">15 kg</option>
        <option value="16">16 kg</option>
        <option value="17">17 kg</option>
        <option value="18">18 kg</option>
        <option value="19">19kg </option>
        <option value="20">20 kg</option>
      </select></p>
    </fieldset>

    <p>Pick-up Information</p>
    <fieldset>
      <p><label for="pickupaddress">Address: </label><input type="text" id="pickupaddress" name="pickupaddress" size="70%"/></p>
      <p><label for="pickupsuburb">Suburb: </label><input type="text" id="pickupsuburb" name="pickupsuburb" size="50%"/></p>
      <p><label for="pickup_date">Preferred Date: </label><!--<input type="date" id="pickup_date" name="pickup_date"/>-->
        <select id="pikcupday" name="pikcupday">
        <option value="none">Day</option>
        <option value="01">1</option>
        <option value="02">2</option>
        <option value="03">3</option>
        <option value="04">4</option>
        <option value="05">5</option>
        <option value="06">6</option>
        <option value="07">7</option>
        <option value="08">8</option>
        <option value="09">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>

        <select id="pikcupmonth" name="pikcupmonth">
        <option value="none">Month</option>
        <option value="01">1</option>
        <option value="02">2</option>
        <option value="03">3</option>
        <option value="04">4</option>
        <option value="05">5</option>
        <option value="06">6</option>
        <option value="07">7</option>
        <option value="08">8</option>
        <option value="09">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>        
        </select>

        <select id="pikcupyear" name="pikcupyear">
        <option value="none">Year</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>       
        </select>

      </p>
      <p><label for="pickup_time">Preferred Time: </label><!--<input type="time" id="pickup_time" name="pickup_time"/>-->
        <select id="pikcuphour" name="pikcuphour">
        <option value="none">Hour</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>        
        </select>
        <label for="pickupminute"><input type="text" id="pickupminute" name="pickupminute" size="10%"/>
      </p>
    </fieldset>

    <p>Delivery Information</p>
    <fieldset>
      <p><label for="receiver">Receiver Name: </label><input type="text" id="receiver" name="receiver" size="70%"/></p>
      <p><label for="shippingaddress">Address: </label><input type="text" id="shippingaddress" name="shippingaddress" size="50%"/></p>
      <p><label for="shippingsuburb">Suburb: </label><input type="text" id="shippingsuburb" name="shippingsuburb" size="50%"/></p>
      <p><label for="shippingstate">State: </label><select id="shippingstate" name="shippingstate">
        <option value="none">Select State</option>
        <option value="NSW">New South Wales</option> 
        <option value="NT">Northern Territory</option>
        <option value="Queensland">Queensland</option>
        <option value="SA">South Australia</option>
        <option value="Tasmania">Tasmania</option>        
        <option value="Victoria">Victoria</option>
        <option value="WA">Western Australia</option>
      </select></p>
    </fieldset>
    <p><input type="submit" name="Request" value="Request"/></p>
      <?php
        /*shut down warnings*/
        error_reporting(0);
        $customer_number = $_SESSION["customer_number"];
        //echo "$customer_number";
        /*mysql information*/
        $connection = @mysqli_connect("feenix-mariadb.swin.edu.au", "s101272826", "010293", "s101272826_db");
        /*use table assign1*/
        @mysqli_select_db($connection, "request_assign1");

        if (!$connection) 
        {
            echo "<script type='text/javascript'>";
            echo "alert('Database connection failure');";
            echo "</script>";
        } else if (isset($_POST["Request"]))
        {
          /*defines*/
          $itemdesc = mysqli_real_escape_string($connection, $_POST["itemdesc"]); //
          $itemweight = $_POST["itemweight"]; //list
          $pickupaddress = mysqli_real_escape_string($connection, $_POST["pickupaddress"]); //
          $pickupsuburb = mysqli_real_escape_string($connection, $_POST["pickupsuburb"]); //
          //$pickup_date = mysqli_real_escape_string($connection, $_POST["pickup_date"]);
          //$pickup_time = mysqli_real_escape_string($connection, $_POST["pickup_time"]); 
          $receiver = mysqli_real_escape_string($connection, $_POST["receiver"]); // 
          $shippingaddress = mysqli_real_escape_string($connection, $_POST["shippingaddress"]); //
          $shippingsuburb = mysqli_real_escape_string($connection, $_POST["shippingsuburb"]); //
          $shippingstate = $_POST["shippingstate"]; //list

          $pikcupday = $_POST["pikcupday"]; //list
          $pikcupmonth = $_POST["pikcupmonth"]; //list
          $pikcupyear = $_POST["pikcupyear"]; //list

          $pickup_date = ($pikcupyear . '-' . $pikcupmonth . '-' . $pikcupday);

          $pikcuphour = $_POST["pikcuphour"]; //list
          $pickupminute = mysqli_real_escape_string($connection, $_POST["pickupminute"]); // 

          $pickup_time = ($pikcuphour . ':' . $pickupminute);

          date_default_timezone_set('Australia/Melbourne');
          $currentdate = date('Y-m-d h:i');
          $requestdate = date('Y-m-d');
          $cdate = strtotime($currentdate);
          $pickup_datetime = ($pickup_date . ' ' . $pickup_time);
          $putimestamp = strtotime($pickup_datetime);          

          /*error messages*/
          $errMsg = "";    
          /*itemdesc*/
          if ($itemdesc=="") {
            $errMsg .= "<p>You must provide item description.</p>";
          } else if (strlen($itemdesc) > 100){
            $errMsg .= "<p>Item description must be less than 100 characters.</p>";
          } else if (!preg_match("/^[a-zA-Z0-9- ]*$/", $itemdesc)) {
            $errMsg .= "<p>Only alpha letters, numbers and hyphens allowed in item description.</p>";
          }
          /*itemweight*/
          if ($itemweight == "none") {
           $errMsg .= "<p>You must select item weight.</p>";
          }

          /*pickupaddress*/
          if ($pickupaddress=="") {
            $errMsg .= "<p>You must provide pickup address.</p>";
          } else if (strlen($pickupaddress) > 100){
            $errMsg .= "<p>Pickup address must be less than 100 characters.</p>";
          } else if (!preg_match("/^[a-zA-Z0-9-# ]*$/", $pickupaddress)) {
            $errMsg .= "<p>Only alpha letters, numbers, hyphens and # character allowed in pickup address.</p>";
          }
          /*pickupsuburb*/
          if ($pickupsuburb=="") {
            $errMsg .= "<p>You must provide pickup suburb.</p>";
          } else if (strlen($pickupsuburb) > 20){
            $errMsg .= "<p>Pickup suburb must be less than 20 characters.</p>";
          } else if (!preg_match("/^[a-zA-Z ]*$/", $pickupsuburb)) {
            $errMsg .= "<p>Only alpha letters allowed in pickup suburb.</p>";
          }

          /*pickup_date*/
          if (($pikcupday == "none") || ($pikcupmonth == "none") || ($pikcupyear == "none"))  {
            $errMsg .= "<p>You must provide pickup date.</p>";
          } else if ($putimestamp < $cdate + 86400) {
            $errMsg .= "<p>Pickup date and time must be at least 24 hours after the current time.</p>";
          }
          /*pickup_time*/
          if (($pikcuphour == "none") || (!$pickupminute)) {
            $errMsg .= "<p>You must provide pickup time.</p>";
          } else if (strlen($pickupminute) > 2){
            $errMsg .= "<p>Pickup minute must be less than 2 digits.</p>";
          } else if (!preg_match("/^[0-9]*$/", $pickupminute)) {
            $errMsg .= "<p>Only alpha numbers allowed in pickup minute.</p>";
          } else if ((strtotime($pickup_time) < strtotime('07:30')) || (strtotime($pickup_time) > strtotime('20:30'))) {
            $errMsg .= "<p>Pickup time must be between 7:30 AM and 20:30 PM.</p>";
          }
          /*receiver*/
          if ($receiver=="") {
            $errMsg .= "<p>You must provide receiver name.</p>";
          } else if (strlen($receiver) > 100){
            $errMsg .= "<p>Receiver name must be less than 100 characters.</p>";
          } else if (!preg_match("/^[a-zA-Z- ]*$/", $receiver)) {
            $errMsg .= "<p>Only alpha letters and hyphens allowed in receiver name.</p>";
          }
          /*shippingaddress*/
          if ($shippingaddress=="") {
            $errMsg .= "<p>You must provide shipping address.</p>";
          } else if (strlen($shippingaddress) > 100){
            $errMsg .= "<p>Shipping address must be less than 100 characters.</p>";
          } else if (!preg_match("/^[a-zA-Z0-9-# ]*$/", $shippingaddress)) {
            $errMsg .= "<p>Only alpha letters, numbers, hyphens and # character allowed in shipping address.</p>";
          }
          /*shippingsuburb*/
          if ($shippingsuburb=="") {
            $errMsg .= "<p>You must provide shipping suburb.</p>";
          } else if (strlen($shippingsuburb) > 20){
            $errMsg .= "<p>Shipping suburb must be less than 20 characters.</p>";
          } else if (!preg_match("/^[a-zA-Z ]*$/", $shippingsuburb)) {
            $errMsg .= "<p>Only alpha letters allowed in shipping suburb.</p>";
          }
          /*shippingstate*/
          if ($shippingstate == "none") {
           $errMsg .= "<p>You must select shipping state.</p>";
          }
          /*shipping cost*/
          if ($itemweight <= 2) {
            $cost = 10;
          } else {
            $cost = 10 + (2 * ($itemweight - 2));
          }
          /*echo error messages*/
          if ($errMsg != "") {
            echo "$errMsg";
          } else 
          {
            //echo "$customer_number";
            
            $generatequery = "INSERT INTO request_assign1 (customer_number, request_date, item_description, weight, pickup_address, pickup_suburb, pickup_datetime, receiver_name, delivery_address, delivery_suburb, delivery_state) VALUES ('$customer_number','$requestdate','$itemdesc','$itemweight','$pickupaddress', '$pickupsuburb', '$pickup_datetime', '$receiver', '$shippingaddress', '$shippingsuburb', '$shippingstate')";      
            
            $request_numberquery = "SELECT request_number FROM request_assign1 WHERE customer_number='$customer_number' AND item_description = '$itemdesc' AND weight = '$itemweight' AND request_date = '$requestdate' AND pickup_datetime = '$pickup_datetime'";      
            
            $addrequest = mysqli_query($connection, $generatequery);
            
            $request_number = mysqli_query($connection, $request_numberquery);
            
            while ($id = $request_number->fetch_assoc()) 
            {
              $reqnum = $id['request_number']; 
              echo '<p>Thank you! Your request number is <b><font color="green">'.$reqnum.'</font></b>. The cost is <b><font color="green">$'.$cost.'</font></b>. We will pickup the item at <b><font color="green">'.$pickup_time.'</font></b> on <b><font color="green">'.$pickup_date.'</font></b>.</p>';
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
