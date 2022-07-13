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
  
$id=$_REQUEST["id"];

// Checking for connections 
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 

$eventsql = "select EventId, EventName from Event"; 
$eventresult = $mysqli->query($eventsql);
  
// SQL query to select data from database 
$sql = "SELECT * FROM Participant p JOIN Event e on p.EventId=e.EventId where p.PId=$id; "; 
$result = $mysqli->query($sql); 
if(isset($_POST['update'])){
    if( empty($_POST['PName']) || empty($_POST['PMobile']) || empty($_POST['EventId']) || empty($_POST['USN']) || empty($_POST['Gender']) || empty($_POST['College']))
    {
       echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $PId = $id;
        $PName = $_POST['PName'];
        $PMobile = $_POST['PMobile'];
        $EventId = $_POST['EventId'];
        $USN = $_POST['USN'];
        $Gender = $_POST['Gender'];
        $College = $_POST['College'];
        
        $sql = "update Participant set PName='$PName', PMobile='$PMobile', EventId='$EventId', USN='$USN', Gender='$Gender', College='$College'
        where PId=$PId";
         
        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Participant updated successfully!")</script>';
            header("location:participants.php");
        }else{
            echo '<script>alert("Error: There was an error while updating Participant!")</script>';
           
        }
    }
}

$mysqli->close();  
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Update Participant</h3>
        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
                {
        ?>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="PId">Participant ID</label>
                </th>
                <td>
                    <input type="text" id="PId" name="PId" class="form-control" disabled="disabled" value="<?php echo $rows["PId"] ?>"><br>
                </td>
            </tr>
            <tr>
                <th><label for="PName">Participant Name</label></th>
                <td><input type="text" name="PName" id="PName" class="form-control" value="<?php echo $rows["PName"] ?>"><br></td>
            </tr>
            <tr>
                <th><label for="PMobile">Participant Mobile</label></th>
                <td><input type="text" name="PMobile" id="PMobile" class="form-control" value="<?php echo $rows["PMobile"] ?>"><br></td>
            </tr>
            <tr>
                <th><label for="EventId">Event</label></th>
                <td>
                    <select name="EventId" id="EventId" class="form-control">
                        <option value="">Select Event</option>
                    <?php   // LOOP TILL END OF DATA  
                        while($eventrows=$eventresult->fetch_assoc()) 
                        {
                            if($rows["EventId"] == $eventrows["EventId"])
                            {
                    ?> 
                        <option selected="selected" value="<?php echo $eventrows["EventId"] ?>"><?php echo $eventrows["EventName"]?></option>
                    <?php
                        }
                        else
                        {
                    ?>
                        <option value="<?php echo $eventrows["EventId"] ?>"><?php echo $eventrows["EventName"]?></option>
                    <?php
                        }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="USN">USN</label></th>
                <td><input type="text" name="USN" id="USN" class="form-control" value="<?php echo $rows["USN"] ?>"><br></td>
            </tr>
            <tr>
                <th><label for="Gender">Gender</label></th>
                <td><input type="text" name="Gender" id="Gender" class="form-control" value="<?php echo $rows["Gender"] ?>"><br></td>
            </tr>
            <tr>
                <th><label for="College">College</label></th>
                <td><input type="text" name="College" id="College" class="form-control" value="<?php echo $rows["College"] ?>"><br></td>
            </tr>
                <th></th>
                <td><input type="submit" name="update" class="btn btn-success" value="Update"></td>
            </tr>
            </table>
        </form>
        <?php
                }
                ?>
        
    </div>
    </div>
    </div>
</div>