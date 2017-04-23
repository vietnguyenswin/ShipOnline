<!--
This admin.php connects database and help the admin to manage request records by retrieve information from request_assign1 and assign1 tables.
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
  <h1>ShipOnline System Admin Page</h1>

  <form id="admin" method="post"><fieldset>
    <p><label>Date for Retrieve: </label>
      <select id="retrieveday" name="retrieveday">
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
      <select id="retrievemonth" name="retrievemonth">
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
      <select id="retrieveyear" name="retrieveyear">
        <option value="none">Year</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
      </select>
    </p>
  
    <p><label>Select Date Item for Retrieve</label>
      <input type="radio" id="requestdate" name="retrievedate" value="request"/><label for="requestdate">Request Date</label>
      <input type="radio" id="pickupdate" name="retrievedate" value="pickup"/><label for="pickupdate">Pick-up Date</label>
    </p>  
    <p><input type="submit" name="Show" value="Show"/></p>
    <?php
    	/*connnect database*/
      error_reporting(0);
      $connection = @mysqli_connect("feenix-mariadb.swin.edu.au", "s101272826", "010293", "s101272826_db");
      @mysqli_select_db($connection, "request_assign1");
      @mysqli_select_db($connection, "assign1");

      /*events after button "Show" is clicked*/
      if (isset($_POST["Show"]))
      {
      	/*variables definition*/
        $revenue = 0;
        $radioselected = $_POST["retrievedate"];
        $retrieveday = $_POST["retrieveday"]; //list
        $retrievemonth = $_POST["retrievemonth"]; //list
        $retrieveyear = $_POST["retrieveyear"]; //list
        $retrievedate = ($retrieveyear . '-' . $retrievemonth . '-' . $retrieveday);

        $errMsg = "";        
        if (($retrieveday == "none") || ($retrievemonth == "none") || ($retrieveyear == "none"))  
        {
          $errMsg .= "<p>You must provide retrieve date.</p>";
        }
        if($radioselected == "") 
        {
          $errMsg .= "<p>You must select an option to retrieve.</p>";
        }     
        /*echo error messages*/
        if ($errMsg != "") 
        {
          echo "$errMsg";
        } else 
        {
          /*events after option "Request Date" is selected*/
          if ($radioselected == "request") 
          {
            /*search table request_assign1 with $retrievedate as keyword*/
            $query = "SELECT * FROM request_assign1 WHERE request_date LIKE '%" . $retrievedate .  "%'";
            $result = mysqli_query($connection, $query);
            $total = mysqli_num_rows($result);

            if (!$result) 
            {
              echo "";
            } else 
              {
                echo "<h1>Results</h1>\n";
                echo "<table border=\"1\">";
                echo "<tr>"
                ."<th scope=\"col\">Customer Number</th>"
                ."<th scope=\"col\">Request Number</th>"
                ."<th scope=\"col\">Item Description</th>"
                ."<th scope=\"col\">Weight</th>"
                ."<th scope=\"col\">Pickup Suburb</th>"
                ."<th scope=\"col\">Pickup Date</th>"
                ."<th scope=\"col\">Delivery Suburb</th>"
                ."<th scope=\"col\">Delivery State</th>"                
                ."</tr>";

                while ($row = mysqli_fetch_assoc($result)) 
                {
                  $spacedetector = strpos($row["pickup_datetime"], " ");
                  $pickupdate = substr($row["pickup_datetime"], 0, $spacedetector);
                  
                  $itemweight = $row["weight"];
                  
                  if ($itemweight <= 2) {
                    $cost = 10;
                  } else {
                    $cost = 10 + (2 * ($itemweight - 2));
                  }

                  $revenue = $revenue + $cost;

                  echo "<tr>";
                  echo "<td>",$row["customer_number"],"</td>";
                  echo "<td>",$row["request_number"],"</td>";
                  echo "<td>",$row["item_description"],"</td>";
                  echo "<td>",$row["weight"],"</td>";
                  echo "<td>",$row["pickup_suburb"],"</td>";
                  echo "<td>",$pickupdate,"</td>";
                  echo "<td>",$row["delivery_suburb"],"</td>";
                  echo "<td>",$row["delivery_state"],"</td>";                  
                  echo "</tr>";
                  //echo "$revenue";
                }
                echo "</table>";              
                echo "<p>Total requests: $total</p>";
                echo "<p>Revenue: $$revenue</p>";
                mysqli_free_result ($result);
              }
            }
			     /*events after option "Pickup Date" is selected*/
            if ($radioselected == "pickup") 
            {
              $querya = "SELECT * FROM request_assign1";
              $resulta = mysqli_query($connection, $querya);

              if (!$resulta)
              {
                echo "";
              } else {
                while ($row = mysqli_fetch_assoc($resulta)) {
                  $pudatetime = $row["pickup_datetime"];
                  $cusnum = $row["customer_number"];
                  $spacedetector = strpos($pudatetime, " ");
                  $pickupdate = substr($pudatetime, 0, $spacedetector);
                  $pickuptime = substr($pudatetime, $spacedetector+1);
                  if ($retrievedate == $pickupdate){
                    $queryb = "SELECT * FROM request_assign1 WHERE pickup_datetime LIKE '%" . $pudatetime .  "%'";
                    $queryc = "SELECT * FROM assign1 WHERE customer_number LIKE '%" . $cusnum .  "%'";
                    $cus = mysqli_query($connection, $queryc);
                    $result = mysqli_query($connection, $queryb);
                    $total = mysqli_num_rows($result);
                    $sumweight = 0;
                    if ((!$result) || (!$cus)) {
                      echo "";
                    } else {
                      echo "<h1>Results</h1>\n";
                      echo "<table border=\"1\">";
                      echo "<tr>"
                      ."<th scope=\"col\">Customer Number</th>"
                      ."<th scope=\"col\">Name</th>"
                      ."<th scope=\"col\">Phone</th>"
                      ."<th scope=\"col\">Request Number</th>"
                      ."<th scope=\"col\">Item Description</th>"
                      ."<th scope=\"col\">Weight</th>"
                      ."<th scope=\"col\">Pickup Address</th>"
                      ."<th scope=\"col\">Pickup Suburb</th>"
                      ."<th scope=\"col\">Pickup Time</th>"
                      ."<th scope=\"col\">Delivery Suburb</th>"
                      ."<th scope=\"col\">Delivery State</th>"                
                      ."</tr>";

                      while (($row = mysqli_fetch_assoc($result)) && ($rowb = mysqli_fetch_assoc($cus)))
                      {

                        $sumweight += $row["weight"];

                        echo "<tr>";
                        echo "<td>",$row["customer_number"],"</td>";
                        echo "<td>",$rowb["name"],"</td>";
                        echo "<td>",$rowb["phone"],"</td>";
                        echo "<td>",$row["request_number"],"</td>";
                        echo "<td>",$row["item_description"],"</td>";
                        echo "<td>",$row["weight"],"</td>";
                        echo "<td>",$row["pickup_address"],"</td>";
                        echo "<td>",$row["pickup_suburb"],"</td>";   
                        echo "<td>",$pickuptime,"</td>";
                        echo "<td>",$row["delivery_suburb"],"</td>";
                        echo "<td>",$row["delivery_state"],"</td>";                 
                        echo "</tr>";
                      }
                      echo "</table>";
                      echo "<p>Total requests: $total</p>";
                      echo "<p>Total weight: $sumweight</p>";        
                      mysqli_free_result ($result);
                    }
                  }
                }
              }
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
