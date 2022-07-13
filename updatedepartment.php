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
$sql = "select * from Department where DeptId=$id"; 
$result = $mysqli->query($sql);

if(isset($_POST['update'])){
    if( empty($_POST['departmentname']))
    {
        echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $departmentId = $id;
        $departmentname = $_POST['departmentname'];
        $sql = "UPDATE Department SET DeptName='$departmentname' where DeptId=$departmentId;";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Department updated successfully!")</script>';
            header("location:departments.php");
        }else{
            echo '<script>alert("Error: There was an error while updating Department!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Department</h3>
            <?php   // LOOP TILL END OF DATA  
                    while($rows=$result->fetch_assoc()) 
                    { 

            ?> 
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="departmentId">Department ID</label>
                </th>
                <td>
                    <input type="text" id="departmentId" name="departmentId" disabled="disabled" value="<?php echo $rows["DeptId"]; ?>"><br>
                </td>
            </tr>
            <tr>
                <th><label for="departmentname">Department Name</label></th>
                <td><input type="text" name="departmentname" id="departmentname" class="form-control" value="<?php echo $rows["DeptName"]; ?>"><br></td>
            </tr>
            <tr>
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