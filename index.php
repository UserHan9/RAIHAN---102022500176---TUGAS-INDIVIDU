<?php
require "config.php";

if(isset($_POST["submit"])){

    $plat_nomor = $_POST["plat_nomor"];
    $tahun_keluar = $_POST["tahun_keluar"];
    $jenis_mobil = $_POST["jenis_mobil"];

    $sql = "INSERT INTO car_data (plat_nomor, tahun_keluar, jenis_mobil)
            VALUES ('$plat_nomor', '$tahun_keluar', '$jenis_mobil')";

    $result = mysqli_query($db, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body{
        background-color: antiquewhite;
        padding: 40px;
    }

    .card {
        background-color: rgb(250, 251, 251);
        width: 100%;
        max-width: 350px;
        margin: auto;
        padding: 28px 24px;
        border-radius: 10px;
    }

    .field{
        margin-bottom: 18px;
    }

    input{
        width: 92%;
        padding: 10px 12px;
        border-radius: 5px;
        font-size: 14px;
    }

    select{
        background-color: white;
        width: 100%;
        padding: 10px 12px;
        border-radius: 5px;
        font-size: 14px;
    }

    label{
        display: block;
        font-size: 24px;
        margin-bottom: 6px;
    }

    button{
        width: 100%;
        background-color: #65a744;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 6px;
    }

    .submit{
        background-color: aqua;
    }

    .data {
        background-color: white;
        max-width: 350px;
        margin: 30px auto;
        padding: 20px;
        border-radius: 10px;
    }

    .data li {
        margin-bottom: 15px;
    }

    .hapus {
        display: inline-block;
        margin-top: 10px;
        padding: 7px 12px;
        background-color: red;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

<body>

    <div class="card">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <h1>FORM INPUT</h1>

            <div class="field">
                <label for="plat_nomor">Plat Nomor:</label>
                <input type="text" id="plat_nomor" name="plat_nomor" placeholder="B 1234 ABC">
            </div>

            <div class="field">
                <label for="tahun_keluar">Tahun Keluar:</label>
                <input type="text" id="tahun_keluar" name="tahun_keluar" placeholder="2025">
            </div>

            <div class="field">
                <label for="jenis_mobil">Jenis Mobil:</label>
                <input type="text" id="jenis_mobil" name="jenis_mobil" placeholder="Toyota">
            </div>

            <button type="submit" name="submit">
                kirim data
            </button>

        </form>

    </div>


    <div class="data">
        <h2>Data Mobil</h2>
        <ul>
            <?php

            $sql = "SELECT * FROM car_data";

            $result = mysqli_query($db, $sql);

            while($row = mysqli_fetch_assoc($result)){
            ?>

                <li>
                    <strong>Plat Nomor:</strong><?php echo $row["plat_nomor"]; ?>
                    <br>
                    <strong>Tahun Keluar:</strong><?php echo $row["tahun_keluar"]; ?>
                    <br>
                    <strong>Jenis Mobil:</strong><?php echo $row["jenis_mobil"]; ?>
                    <br>

                    <a class="hapus" href="delete.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>

                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>
</html>
```