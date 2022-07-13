<?php 
  
// Username is root 
$user = 'root'; 
$password = '';  
  
// Database name is festmanagement 
$database = 'festmanagement';  
  
// Server is localhost with 
// port number 3306 
$servername='localhost:3306'; 
$mysqli = new mysqli($servername, $user,  
                $password, $database); 
  
// Checking for connections 
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 
  
// SQL query to select data from database 
//$sql = "SELECT * FROM Event e JOIN CoOrdinator c ON e.CodId=c.CodId JOIN Department d ON e.DeptId=d.DeptId JOIN Judge j ON e.JudgeId=j.JudgeId;"; 
//$result = $mysqli->query($sql); 
//$mysqli->close();  
?> 
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Events</title>
    <!-- CSS FOR STYLING THE PAGE --> 
    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: #006600; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
        td { 
            background-color: yellow; 
            border: 1px solid black; 
        } 
  
        th,
        td { 
            font-weight: bold;
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
        th {
            background-color: red;
        }
        td { 
            font-weight: lighter; 
        } 
        .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
/*  padding: 12px 16px;*/
  font-size: 12px;
  cursor: pointer;
  margin-right: 5px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
    </style> 

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
          <a class="navbar-brand" href="homepage.php"><center>COLLEGE FEST MANAGEMENT SYSTEM<br>Fest of Atria I. T.</center></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="homepage.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="judges.php">Judges</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="participants.php">Participants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="coordinators.php">Co-Ordinators</a>
            </li>
            <li class="nav-item">
                <div class="nav-link dropdown">New
                    <div class="dropdown-content">
                            <a href="addevent.php">Event</a>
                            <!-- <a href="adddepartment.php">Department</a>
                            <a href="addparticipant.php">Participant</a>
                            <a href="addjudge.php">Judge</a>
                            <a href="addcoordinator.php">Co-Ordinator</a>
                          <!--  <a href="addwinner.php">Winner</a> -->
                    </div>
                </div> 
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section> 
        <h1>EVENTS</h1> 
        <!-- TABLE CONSTRUCTION--> 
        <table> 
            <tr> 
                <th>Event Id</th> 
                <th>Event Name</th>
                <th>Registration Fees</th>
                <th>Department Name</th>
                <th>Co-Ordinator Name</th>
                <th>Judge Name</th>
                <th>Venue</th>
                <th>Time</th>
                <th></th>  
            </tr> 
            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            <?php   // LOOP TILL END OF DATA  
            $sql = "SELECT * FROM Event e JOIN CoOrdinator c ON e.CodId=c.CodId JOIN Department d ON e.DeptId=d.DeptId JOIN Judge j "
                    . "ON e.JudgeId=j.JudgeId group by EventId;"; 
            $result = $mysqli->query($sql); 
            $mysqli->close();  
                while($rows=$result->fetch_assoc()) 
                { 
            
            echo "<tr>"; 
                echo "<td>".$rows['EventId']."</td>"; 
                echo "<td>".$rows['EventName']."</td>";
                echo "<td>".$rows['RegFees']."</td>";
                echo "<td>".$rows['DeptName']."</td>";
                echo "<td>".$rows['CodName']."</td>";
                echo "<td>".$rows['JudgeName']."</td>";
                echo "<td>".$rows['Venue']."</td>";
                echo "<td>".$rows['TIME']."</td>";
                echo "<td><a href='updateevent.php?id=".$rows['EventId']."' title='Edit' class='btn'><i class='fa fa-edit'></i></a><a href='deleteevent.php?id=".$rows['EventId']."' title='Delete' class='btn'><i class='fa fa-trash'></i></a></td>";
            echo "<tr>";
                }
            
            ?> 
        </table> 
    </section> 
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>