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
$sql = "SELECT * FROM Judge where JudgeId=$id; "; 
$result = $mysqli->query($sql); 

if(isset($_POST['update'])){
    if(empty($_POST['JudgeName']) || empty($_POST['JudgeMobile']))
    {
        echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $JudgeId = $id;
        $JudgeName = $_POST['JudgeName'];
        $JudgeMobile = $_POST['JudgeMobile'];
        $sql = "UPDATE Judge SET JudgeName='$JudgeName', JudgeMobile='$JudgeMobile' where JudgeId=$JudgeId";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Judge updated successfully!")</script>';
            header("location:judges.php");
        }else{
            echo '<script>alert("Error: There was an error while updating Judge!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Update Judge</h3>
        <?php   
                while($rows=$result->fetch_assoc()) 
                { 
            ?>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="JudgeId">Judge ID</label>
                </th>
                <td>
                    <input type="text" id="JudgeId" name="JudgeId" disabled="disabled" class="form-control" value="<?php echo $rows["JudgeId"]?>"><br>
                </td>
            </tr>
            <tr>
                <th><label for="JudgeName">Judge Name</label></th>
                <td><input type="text" name="JudgeName" id="JudgeName" class="form-control" value="<?php echo $rows["JudgeName"]?>"><br></td>
            </tr>
            <tr>
                <th><label for="JudgeMobile">Judge Mobile</label></th>
                <td><input type="text" name="JudgeMobile" id="JudgeMobile" class="form-control" value="<?php echo $rows["JudgeMobile"]?>"><br></td>
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