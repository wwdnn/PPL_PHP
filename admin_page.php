

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  </head>
  <body>
     <?php
        // get session
        session_start();
        if (isset($_SESSION['username'])) {
      ?>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <h1>Dashboard</h1>

          <div class="collapse navbar-collapse me-auto" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
            </ul>
            <form class="d-flex" role="" method="POST">
              <!-- button Logout -->
              <button class="btn btn-secondary" name="logout">Logout</button>
            </form>

          </div>
        </div>
      </nav>

      <!-- Content Welcome -->
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-4 mx-auto">
            <div class="card border-0">
              <div class="header pt-3">
                <h3 class="text-center">Hallo</h3>
              </div>
              <div class="card-body">
                <h5 class="text-center">Selamat Datang: <?php echo $_SESSION['username']; ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- footer -->
      <div class="container-fluid fixed-bottom">
        <div class="row">
          <div class="col-md-12 text-center">
            <p class="mt-3">Created by Wildan </p>
          </div>
        </div>
      </div
      <?php
      } 
      else {
        echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
        echo "<script>location='form_login.php';</script>";
      }
      // logout
      if (isset($_POST['logout'])) {
        session_start();
        session_destroy();
        header("Location: form_login.php");
      }

      ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>