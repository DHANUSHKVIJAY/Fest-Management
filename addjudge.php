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
    if( empty($_POST['JudgeId']) || empty($_POST['JudgeName']) || empty($_POST['JudgeMobile']))
    {
        echo '<script>alert("Please fill out all required fields")</script>';
    }else{
        $JudgeId = $_POST['JudgeId'];
        $JudgeName = $_POST['JudgeName'];
        $JudgeMobile = $_POST['JudgeMobile'];
        $sql = "INSERT INTO Judge(JudgeId,JudgeName,JudgeMobile)
        VALUES('$JudgeId','$JudgeName','$JudgeMobile')";

        if( $mysqli->query($sql) === TRUE){
            echo '<script>alert("Judge added successfully!")</script>';
            header("location:judges.php");
        }else{
            echo '<script>alert("Error: There was an error while adding new Judge!")</script>';
           
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
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Judge</h3>
        <form action="" method="POST">
            <table>
            <tr>
                <th>
                    <label for="JudgeId">Judge ID</label>
                </th>
                <td>
                    <input type="text" id="JudgeId" name="JudgeId" class="form-control"><br>
                </td>
            </tr>
            <tr>
                <th><label for="JudgeName">Judge Name</label></th>
                <td><input type="text" name="JudgeName" id="JudgeName" class="form-control"><br></td>
            </tr>
            <tr>
                <th><label for="JudgeMobile">Judge Mobile</label></th>
                <td><input type="text" name="JudgeMobile" id="JudgeMobile" class="form-control"><br></td>
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

