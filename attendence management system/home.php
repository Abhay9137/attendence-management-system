<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbconnect.php';
    

    if (isset($_POST['submited'])) {
        $id = $_POST['Id'];
        $name = $_POST['Name'];
        $depart = $_POST['Depart'];
        $date = $_POST['Date'];
        $jointime = $_POST['Join_Time']; 
        $logtime = $_POST['Logout_Time']; 

        $sql = "INSERT INTO attendance (id, name, depart, date, jointime, logtime) 
                VALUES ('$id', '$name', '$depart', '$date', '$jointime', '$logtime')";

        /*$result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }*/
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <!-- css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body> 

  <div class="container mt-3">
    <div class="d-flex justify-content-end">
      <a href="logout.php">Logout</a>
    </div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="row mb-3">
            <div class="col-sm-4 col-md-4 col-lg-4">
                  <label for="id" class="form-label">Id</label>
                  <input type="number" class="form-control" id="id" name="Id"> 
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="Name"> 
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                  <label for="depart" class="form-label">Depart</label>
                  <input type="text" class="form-control" id="depart" name="Depart"> 
              </div>
            </div>
            
            <div class="row mb-3">
            <div class="col-sm-4 col-md-4 col-lg-4">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="Date"> 
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                  <label for="join_time" class="form-label">Join Time</label> 
                  <input type="time" class="form-control" id="join_time" name="Join_Time"> 
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                  <label for="logout_time" class="form-label">Logout Time</label>
                  <input type="time" class="form-control" id="logout_time" name="Logout_Time"> 
              </div>
            </div>
             <div class="d-grid col-3 mx-auto mt-4">
              <button type="submit" class="btn btn-primary" name="submited" value="Submit">Add New Employee</button>
             </div>
          </form>

          <div class="row mt-5">
            <div class="col-sm col-md col-lg">
              <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Depart</th>
                    <th scope="col">Date</th>
                    <th scope="col">Join Time</th>
                    <th scope="col">Logout Time</th>
                </tr>
                </thead>
            </table>
            </div>
          </div>
      </div>




    <script src="https://kit.fontawesome.com/ace1a3a0e7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>