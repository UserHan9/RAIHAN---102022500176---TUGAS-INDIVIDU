<?php

require "config.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "DELETE FROM car_data WHERE id = $id";

    $result = mysqli_query($db, $sql);

    if ($result) {

        header("Location: index.php");
        exit;

    } else {

        die("Gagal menghapus: " . mysqli_error($db));

    }
}

?>
