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

$deptsql = "select DeptId, DeptName from Department"; 
$deptresult = $mysqli->query($deptsql);

// SQL query to select data from database 
$sql = "SELECT * FROM CoOrdinator c JOIN Department d ON c.DeptId=d.DeptId where c.CodId=$id; "; 
$result = $mysqli->query($sql); 

if(isset($_POST['update'])){
    if(empty($_POST['CodName']) || empty($_POST['CodMobile']) || empty($_POST['departmentId']))
    {
        echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $CodId = $id;
        $CodName = $_POST['CodName'];
        $CodMobile = $_POST['CodMobile'];
        $departmentId = $_POST['departmentId']; 
        $sql = "update Coordinator set CodName='$CodName', CodMobile='$CodMobile', DeptId=$departmentId where CodId=$CodId;";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Co-Ordinator added successfully!")</script>';
            header("location:coordinators.php");
        }else{
            echo '<script>alert("Error: There was an error while adding new Co-Ordinator!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Update Co-Ordinator</h3>
        <?php   // LOOP TILL END OF DATA  
                    while($rows=$result->fetch_assoc()) 
                    { 

            ?> 
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="CodId">Co-Ordinator ID</label>
                </th>
                <td>
                    <input type="text" id="CodId" name="CodId" class="form-control" disabled="disabled" value="<?php echo $rows["CodId"]; ?>"><br>
                </td>
            </tr>
            <tr>
                <th><label for="CodName">Co-Ordinator Name</label></th>
                <td><input type="text" name="CodName" id="CodName" class="form-control" value="<?php echo $rows["CodName"]; ?>"><br></td>
            </tr>
            <tr>
                <th><label for="CodMobile">Co-Ordinator Mobile</label></th>
                <td><input type="text" name="CodMobile" id="CodMobile" class="form-control" value="<?php echo $rows["CodMobile"]; ?>"><br></td>
            </tr>
            <tr>
                <th><label for="departmentId">Department</label></th>
                <td>
                    <select name="departmentId" id="departmentId" class="form-control" >
                        <?php   // LOOP TILL END OF DATA  
                        while($deptrows=$deptresult->fetch_assoc()) 
                        { 
                            if($rows["DeptId"] == $deptrows["DeptId"])
                            {
                    ?>
                        <option selected="selected" value="<?php echo $deptrows["DeptId"] ?>"><?php echo $deptrows["DeptName"]?></option>
                    <?php
                            }
                            else{
                                ?>
                        <option value="<?php echo $deptrows["DeptId"] ?>"><?php echo $deptrows["DeptName"]?></option>
                        <?php
                            }
                        }
                    ?>
                    </select>

                </td>
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


