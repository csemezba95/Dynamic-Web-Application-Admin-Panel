<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $imageId = $_GET['id'];
    $uploadDirectory = 'public/uploads/';

    $imageId = $conn->real_escape_string($imageId);

    $get_all_data_sql = "SELECT * FROM our_projects_infos_file WHERE id = '$imageId'";
    $get_all_data_sql_result = $conn->query($get_all_data_sql);

    if ($get_all_data_sql_result === false) {
        echo 'Error querying the database.';
        exit();
    }

    if ($get_all_data_sql_result->num_rows > 0) {
        while ($row = $get_all_data_sql_result->fetch_assoc()) {
            $previousFileName = $row["img"];
            $previousFilePath = $uploadDirectory . $previousFileName;

            if (file_exists($previousFilePath)) {
                if (unlink($previousFilePath)) {
                } else {
                    echo 'Error deleting image file.';
                    exit();
                }
            } else {
                echo 'Image file not found.';
                exit();
            }
        }
    }

    $delete_image_sql = "DELETE FROM our_projects_infos_file WHERE id = $imageId";
    if ($conn->query($delete_image_sql) === false) {
        echo 'Error deleting image record from the database.';
        exit();
    }
	
}
?>
