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

if(isset($_POST['addnew'])){
    if( empty($_POST['departmentId']) || empty($_POST['departmentname']))
    {
        echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $departmentId = $_POST['departmentId'];
        $departmentname = $_POST['departmentname'];
        $sql = "INSERT INTO Department(DeptId,DeptName)
        VALUES('$departmentId','$departmentname')";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Department added successfully!")</script>';
            header("location:departments.php");
        }else{
            echo '<script>alert("Error: There was an error while adding new Department!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Department</h3>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="departmentId">Department ID</label>
                </th>
                <td>
                    <input type="text" id="departmentId" name="departmentId" class="form-control"><br>
                </td>
            </tr>
            <tr>
                <th><label for="departmentname">Department Name</label></th>
                <td><input type="text" name="departmentname" id="departmentname" class="form-control"><br></td>
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