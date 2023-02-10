<?php
  $connect = mysqli_connect("localhost", "root", "", "akademik");

  if (!$connect) {
      echo "Connection Failed";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Latihan 5 PPL</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  
    <!-- card -->
    <div class="card mx-auto" style="width: 18rem; margin-top: 30px;">
      <div class="card-body">
        <h5 class="card-title text-center">Detail Data Mahasiswa</h5>
        <?php
             if (isset($_GET['nim'])) {
              $nim = $_GET['nim'];
              $sql = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
              $query = mysqli_query($connect, $sql);
              $data = mysqli_fetch_array($query);
            }
        ?>
        <p class="card-text">NIM : <?= $data['NIM'] ?></p>
        <p class="card-text">Nama : <?= $data['Nama'] ?></p>
        <p class="card-text">Umur : <?= $data['Umur'] ?></p>
      </div>
       <!-- kembali -->
      <div class="">
        <a href="latihan4.php" class="btn btn-primary">Kembali</a>
      </div>
    </div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
