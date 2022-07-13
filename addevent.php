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

$deptsql = "select DeptId, DeptName from Department"; 
$deptresult = $mysqli->query($deptsql);

$judgesql = "select JudgeId, JudgeName from Judge"; 
$judgeresult = $mysqli->query($judgesql);

$codsql = "select CodId, CodName from Coordinator"; 
$codresult = $mysqli->query($codsql);

if(isset($_POST['addnew'])){
    if( empty($_POST['EventId']) || empty($_POST['EventName']) || empty($_POST['RegFees']) || empty($_POST['CodId']) || empty($_POST['DeptId']) || empty($_POST['JudgeId']) || empty($_POST['Venue']) || empty($_POST['TIME']))
    {
       echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $EventId = $_POST['EventId'];
        $EventName = $_POST['EventName'];
        $RegFees = $_POST['RegFees'];
        $CodId = $_POST['CodId'];
        $DeptId = $_POST['DeptId'];
        $JudgeId = $_POST['JudgeId'];
        $Venue = $_POST['Venue'];
        $TIME = $_POST['TIME'];
        
        $sql = "INSERT INTO Event(EventId,EventName,RegFees,CodId,DeptId,JudgeId,Venue,TIME)
        VALUES('$EventId','$EventName','$RegFees','$CodId','$DeptId','$JudgeId','$Venue','$TIME')";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Event added successfully!")</script>';
            header("location:events.php");
        }else{
            echo '<script>alert("Error: There was an error while adding new Event!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Event</h3>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="EventId">Event ID</label>
                </th>
                <td>
                    <input type="text" id="EventId" name="EventId" class="form-control"><br>
                </td>
            </tr>
            <tr>
                <th><label for="EventName">Event Name</label></th>
                <td><input type="text" name="EventName" id="EventName" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="RegFees">Registration Fees</label></th>
                <td><input type="text" name="RegFees" id="RegFees" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="CodId">Coordinator</label></th>
                <td>
                    <select name="CodId" id="CodId" class="form-control" >
                        <option value="">Select Coordinator</option>
                    <?php   // LOOP TILL END OF DATA  
                        while($codrows=$codresult->fetch_assoc()) 
                        { 
                    
                    ?> 
                    <option value="<?php echo $codrows["CodId"] ?>"><?php echo $codrows["CodId"]."-".$codrows["CodName"]?></option>
                    <?php
                        }
                    ?>
                    </select>

                </td>
            </tr>
            <tr>
                <th><label for="DeptId">Department</label></th>
                <td>
                    <select name="DeptId" id="DeptId" class="form-control" >
                        <option value="">Select Department</option>
                    <?php   // LOOP TILL END OF DATA  
                        while($deptrows=$deptresult->fetch_assoc()) 
                        { 
                    
                    ?> 
                    <option value="<?php echo $deptrows["DeptId"] ?>"><?php echo $deptrows["DeptName"]?></option>
                    <?php
                        }
                    ?>
                    </select>

                </td>
            </tr>
            <tr>
                <th><label for="JudgeId">Judge</label></th>
                <td>
                    <select name="JudgeId" id="JudgeId" class="form-control" >
                        <option value="">Select Judge</option>
                    <?php   // LOOP TILL END OF DATA  
                        while($judgerows=$judgeresult->fetch_assoc()) 
                        { 
                    
                    ?> 
                    <option value="<?php echo $judgerows["JudgeId"] ?>"><?php echo $judgerows["JudgeId"]."-".$judgerows["JudgeName"]?></option>
                    <?php
                        }
                    ?>
                    </select>

                </td>
                </tr>
            <tr>
            <tr>
                <th><label for="Venue">Venue</label></th>
                <td><input type="text" name="Venue" id="JudgeName" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="TIME">Time</label></th>
                <td><input type="text" name="TIME" id="TIME" class="form-control"><br></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="addnew" class="btn btn-success" value="Add New"></td>
            </tr>
            </table>
        </form>
    </div>
    </div>
    </div>
</div>


 