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
    <title>Latihan 4 PPL</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  
  <h1>LATIHAN 4 PPL</h1>
  <h3>Nama : Wildan Setya Nugraha <br> NIM : 211511032</h3>

  <div class="container d-flex justify-content-center">
    <div class="mx-5 w-25">
      <form action="latihan4.php" method="POST" >
        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" class="form-control" name="nim" id="nim">
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama">
        </div>

        <div class="mb-3">
          <label for="umur" class="form-label">Umur</label>
          <input type="text" class="form-control" name="umur" id="umur">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>


   

    <?php
      if (isset($_POST['submit'])) {
          $NIM = $_POST['nim'];
          $Nama = $_POST['nama'];
          $Umur = $_POST['umur'];
          $sql = "INSERT INTO mahasiswa (NIM, Nama, Umur) VALUES ('$NIM', '$Nama', '$Umur')";
          $query = mysqli_query($connect, $sql);
      }
    ?>

    <table class="table" border="1" style="margin-top:30px;">
        <thead>
            <tr class="text-center">
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM mahasiswa";
            $query = mysqli_query($connect, $sql);
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr class="text-center">
                    <td><?= $data['NIM'] ?></td>
                    <td><?= $data['Nama'] ?></td>
                    <td><?= $data['Umur'] ?></td>
                    <!-- delete -->
                    <td>
                      <div class="d-flex justify-content-center">
                        <form action="latihan4.php" method="POST">
                              <input type="hidden" name="nim" value="<?= $data['NIM'] ?>">
                              <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                          </form>

                          <!-- view detail anker -->
                          <a href="latihan5.php?nim=<?= $data['NIM'] ?>" class="btn btn-primary mx-2">View Detail</a>
                      </div>
                       
                    </td>
                </tr>
            <?php
            }
            // delete
            if (isset($_POST['delete'])) {
                $nim = $_POST['nim'];
                $sql = "DELETE FROM mahasiswa WHERE NIM = '$nim'";
                $query = mysqli_query($connect, $sql);
                if ($query) {
                    header('Location: latihan4.php');
                } else {
                    echo "Delete Failed";
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
