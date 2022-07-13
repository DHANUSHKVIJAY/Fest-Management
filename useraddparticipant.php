<div class="container">
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

$eventsql = "select EventId, EventName from Event"; 
$eventresult = $mysqli->query($eventsql);

if(isset($_POST['addnew'])){
    if( empty($_POST['PId']) || empty($_POST['PName']) || empty($_POST['PMobile']) || empty($_POST['EventId']) || 
            empty($_POST['USN']) || empty($_POST['Gender']) || empty($_POST['College']))
    {
       echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $PId = $_POST['PId'];
        $PName = $_POST['PName'];
        $PMobile = $_POST['PMobile'];
        $EventId = $_POST['EventId'];
        $USN = $_POST['USN'];
        $Gender = $_POST['Gender'];
        $College = $_POST['College'];
        
        $sql = "INSERT INTO Participant(PId,PName,PMobile,EventId,USN,Gender,College)
        VALUES('$PId','$PName','$PMobile','$EventId','$USN','$Gender','$College')";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Registered successfully!")</script>';
            header("location:userhomepage.php");
        }else{
            echo '<script>alert("Error: There was an error while adding new Participant!")</script>';
           
        }
    }
}
?>
    <head>
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
        h3 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
        
        </style>
    </head>
    
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box">
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Participant</h3>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="PId">Participant ID</label>
                </th>
                <td>
                    <input type="text" id="PId" name="PId" class="form-control"><br>
                </td>
            </tr>
            <tr>
                <th><label for="PName">Participant Name</label></th>
                <td><input type="text" name="PName" id="PName" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="PMobile">Participant Mobile</label></th>
                <td><input type="text" name="PMobile" id="PMobile" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="EventId">Event</label></th>
                <td>
                    <select name="EventId" id="EventId" class="form-control">
                        <option value="">Select Event</option>
                    <?php   // LOOP TILL END OF DATA  
                        while($eventrows=$eventresult->fetch_assoc()) 
                        { 
                    
                    ?> 
                    <option value="<?php echo $eventrows["EventId"] ?>"><?php echo $eventrows["EventName"]?></option>
                    <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="USN">USN</label></th>
                <td><input type="text" name="USN" id="USN" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="Gender">Gender</label></th>
                <td><input type="text" name="Gender" id="Gender" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="College">College</label></th>
                <td><input type="text" name="College" id="College" class="form-control"><br></td>
            </tr>
                <th></th>
                <td><input type="submit" name="addnew" class="btn btn-success" value="Add New"></td>
            </tr>
            </table>
        </form>
    </div>
    </div>
    </div>
</div>


 

