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
    <title>Latihan 3 PPL</title>
</head>

<body>
    <h1>LATIHAN 3 PPL</h1>
    <h3>Nama : Wildan Setya Nugraha <br> NIM : 211511032</h3>

    <!-- clear data input -->
    <form action="latihan3.php" method="POST">
        <input type="submit" name="clear" value="Clear" style="margin-bottom: 10px;">
    </form>


    <!-- input data -->
    <form action="latihan3.php" method="POST">
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim">

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        
        <label for="umur">Umur</label>
        <input type="text" name="umur" id="umur">

        <input type="submit" name="submit" value="Submit">

    </form>

    <?php
      if (isset($_POST['submit'])) {
          $NIM = $_POST['nim'];
          $Nama = $_POST['nama'];
          $Umur = $_POST['umur'];
          $sql = "INSERT INTO mahasiswa (NIM, Nama, Umur) VALUES ('$NIM', '$Nama', '$Umur')";
          $query = mysqli_query($connect, $sql);
          if ($query) {
              echo "Data berhasil ditambahkan";
          } else {
              echo "Data gagal ditambahkan";
          }
      }
    ?>

    <table class="table" border="1" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM mahasiswa";
            $query = mysqli_query($connect, $sql);
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $data['NIM'] ?></td>
                    <td><?= $data['Nama'] ?></td>
                    <td><?= $data['Umur'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
