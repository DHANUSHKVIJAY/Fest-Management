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

if(isset($_POST['addnew'])){
    if( empty($_POST['CodId']) || empty($_POST['CodName']) || empty($_POST['CodMobile']) || empty($_POST['departmentId']))
    {
        echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $CodId = $_POST['CodId'];
        $CodName = $_POST['CodName'];
        $CodMobile = $_POST['CodMobile'];
        $departmentId = $_POST['departmentId']; 
        $sql = "INSERT INTO CoOrdinator(CodId,CodName,CodMobile,DeptId)
        VALUES('$CodId','$CodName','$CodMobile','$departmentId')";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Co-Ordinator added successfully!")</script>';
            header("location:coordinators.php");
        }else{
            echo '<script>alert("Error: There was an error while adding new Co-Ordinator!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Co-Ordinator</h3>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="CodId">Co-Ordinator ID</label>
                </th>
                <td>
                    <input type="text" id="CodId" name="CodId" class="form-control"><br>
                </td>
            </tr>
            <tr>
                <th><label for="CodName">Co-Ordinator Name</label></th>
                <td><input type="text" name="CodName" id="CodName" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="CodMobile">Co-Ordinator Mobile</label></th>
                <td><input type="text" name="CodMobile" id="CodMobile" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="departmentId">Department</label></th>
                <td>
                    <select name="departmentId" id="departmentId" class="form-control" >
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
                <th></th>
                <td><input type="submit" name="addnew" class="btn btn-success" value="Add New"></td>
            </tr>
            </table>
        </form>
    </div>
    </div>
    </div>
</div>

