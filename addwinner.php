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

$participantsql = "select PId, PName from Participant";
$participantresult = $mysqli->query($participantsql);

if(isset($_POST['addnew'])){
    if( empty($_POST['WId']) || empty($_POST['EventId']) || empty($_POST['PId']) || empty($_POST['Place']))
    {
       echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $WId = $_POST['WId'];
        $EventId = $_POST['EventId'];
        $PId = $_POST['PId'];
        $Place = $_POST['Place'];
        
        $sql = "INSERT INTO winners(WId,EventId,PId,Place)
        VALUES('$WId','$EventId','$PId','$Place')";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Winner added successfully!")</script>';
            header("location:winners.php");
        }else{
            echo '<script>alert("Error: There was an error while adding new Winner!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Winner</h3>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="WId">Winner ID</label>
                </th>
                <td>
                    <input type="text" id="WId" name="WId" class="form-control"><br>
                </td>
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
                        <option value="<?php echo $eventrows["EventId"] ?>"><?php echo $eventrows["EventId"]." - ".$eventrows["EventName"]?></option>
                    <?php
                        }
                        
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="PId">Participant</label></th>
                <td>
                    <select name="PId" id="PId" class="form-control">
                        <option value="">Select Participant</option>
                    <?php   // LOOP TILL END OF DATA  
                        while($participantrows=$participantresult->fetch_assoc()) 
                        {
                    ?> 
                        <option value="<?php echo $participantrows["PId"] ?>"><?php echo $participantrows["PId"]." - ".$participantrows["PName"]?></option>
                    <?php
                        }
                        
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="Place">Place</label></th>
                <td><input type="text" name="Place" id="Place" class="form-control"><br></td>
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


 