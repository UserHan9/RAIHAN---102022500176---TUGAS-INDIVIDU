<?php

require "config.php";

if (!isset($_GET["id"])) {
    die("ID tidak ditemukan.");
}

$id = $_GET["id"];


$sql = "SELECT * FROM car_data WHERE id = $id";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Data tidak ditemukan.");
}

$row = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {

    $plat_nomor = $_POST["plat_nomor"];
    $tahun_keluar = $_POST["tahun_keluar"];
    $jenis_mobil = $_POST["jenis_mobil"];

    $sql = "UPDATE car_data SET
            plat_nomor = '$plat_nomor',
            tahun_keluar = '$tahun_keluar',
            jenis_mobil = '$jenis_mobil'
            WHERE id = $id";

    $result = mysqli_query($db, $sql);

    if ($result) {

        header("Location: index.php");
        exit;

    } else {

        die("Gagal mengedit: " . mysqli_error($db));

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mobil</title>

    <style>
        body {
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

        .field {
            margin-bottom: 18px;
        }

        input {
            width: 92%;
            padding: 10px 12px;
            border-radius: 5px;
            font-size: 14px;
        }

        label {
            display: block;
            font-size: 20px;
            margin-bottom: 6px;
        }

        button {
            width: 100%;
            background-color: #65a744;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 6px;
        }

        .kembali {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="card">

        <h1>EDIT DATA</h1>

        <form action="" method="POST">

            <div class="field">
                <label for="plat_nomor">Plat Nomor:</label>

                <input
                    type="text"
                    id="plat_nomor"
                    name="plat_nomor"
                    value="<?php echo $row["plat_nomor"]; ?>"
                >
            </div>

            <div class="field">
                <label for="tahun_keluar">Tahun Keluar:</label>

                <input
                    type="text"
                    id="tahun_keluar"
                    name="tahun_keluar"
                    value="<?php echo $row["tahun_keluar"]; ?>"
                >
            </div>

            <div class="field">
                <label for="jenis_mobil">Jenis Mobil:</label>

                <input
                    type="text"
                    id="jenis_mobil"
                    name="jenis_mobil"
                    value="<?php echo $row["jenis_mobil"]; ?>"
                >
            </div>

            <button type="submit" name="update">
                Update Data
            </button>

        </form>

        <a class="kembali" href="index.php">
            Kembali
        </a>

    </div>

</body>
</html>