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

$id=$_REQUEST["id"];
  
// SQL query to select data from database 
$sql = "SELECT * FROM Winners where WId=$id"; 
$result = $mysqli->query($sql); 

$eventsql = "select EventId, EventName from Event"; 
$eventresult = $mysqli->query($eventsql);

$participantsql = "select PId, PName from Participant";
$participantresult = $mysqli->query($participantsql);

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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Update Winner</h3>
        <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
                {
        ?>
                
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="WId">Winner ID</label>
                </th>
                <td>
                    <input type="text" id="WId" name="WId" disabled="disabled" class="form-control" value="<?php echo $rows["WId"] ?>"><br>
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
                <th><label for="PId">Participant</label></th>
                <td>
                    <select name="PId" id="PId" class="form-control">
                    <?php   // LOOP TILL END OF DATA  
                        while($participantrows=$participantresult->fetch_assoc()) 
                        {
                            if($rows["PId"] == $participantrows["PId"])
                            {
                    ?> 
                        <option selected="selected" value="<?php echo $participantrows["PId"] ?>"><?php echo $participantrows["PId"]." - ".$participantrows["PName"]?></option>
                    <?php
                        }
                        else
                        {
                    ?>
                        <option value="<?php echo $participantrows["PId"] ?>"><?php echo $participantrows["PId"]." ".$participantrows["PName"]?></option>
                    <?php
                        }
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