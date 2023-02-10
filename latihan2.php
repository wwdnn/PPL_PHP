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
    <title>Latihan 2 PPL</title>
</head>

<body>
    <h1>LATIHAN 2 PPL</h1>
    <h3>Nama : Wildan Setya Nugraha <br> NIM : 211511032</h3>
    <table class="table" border="1">
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
