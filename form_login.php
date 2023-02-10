<?php 
  $connect = mysqli_connect("localhost", "root", "", "db_supermarket");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>

  <body>
    <?php
      session_start();
      if (isset($_SESSION['username'])) {
        echo "<script>alert('Anda Sudah Login!')</script>";
        echo "<script>location='admin_page.php';</script>";
      }
    ?>

    <!-- Login -->
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-md-4 mx-auto">
          <div class="card border-0">

            <div class="header">
              <h3 class="text-center">Login</h3>
            </div>

            <div class="card-body ">
              <form action="form_login.php" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-secondary" name="login">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

    <?php

      // login
      if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // cek username dan password
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);

        // num rows
        if(mysqli_num_rows($query) == 0) {
          echo "<script>alert('Username atau Password Salah!')</script>";
        } else
        {
          if ($row['username'] == $username && $row['password'] == $password) {
            $_SESSION['username'] = $username;
            echo "<script>alert('Login Berhasil!')</script>";
            header("location: admin_page.php");
          } else {
            // refresh
            echo "<script>alert('Username atau Password Salah!')</script>";
          }
        }
       
      }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>
