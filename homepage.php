<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dexterix</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
    
    <style>
        .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    </style>

  </head>
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
          <a class="navbar-brand" href="homepage.php"><center>COLLEGE FEST MANAGEMENT SYSTEM<br>Fest of Atria I. T.</center></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="homepage.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="judges.php">Judges</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="participants.php">Participants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="coordinators.php">Co-Ordinators</a>
            </li>
            <li class="nav-item">
                <div class="nav-link dropdown">Add
                    <div class="dropdown-content">
                            <a href="addevent.php">Event</a>
                            <a href="adddepartment.php">Department</a>
                            <a href="addparticipant.php">Participant</a>
                            <a href="addjudge.php">Judge</a>
                            <a href="addcoordinator.php">Co-Ordinator</a>
                            <a href="addwinner.php">Winner</a>
                    </div>
                </div> 
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      

      <!-- Page Features -->
      <center>
      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="C:\xampp\htdocs\FestManagement\images\eventicon.png" width="25%" height="80%" alt="">
            
            <div class="card-footer">
              <a href="events.php" class="btn btn-primary btn-lg">Events</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="C:\xampp\htdocs\FestManagement\images\departmenticon.png" width="25%" height="80%" alt="">
            
            <div class="card-footer">
              <a href="departments.php" class="btn btn-primary btn-lg">Departments</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="C:\xampp\htdocs\FestManagement\images\winnericon.jpg" width="25%" height="80%" alt="">
            
            <div class="card-footer">
              <a href="winners.php" class="btn btn-primary btn-lg">Winners</a>
            </div>
          </div>
        </div>

        
      </div>
      </center>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Visit Us at:<br>ATRIA INSTITUTE OF TECHNOLOGY<br>Anandnagar, Bangalore - 560024</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

