<?php
    require_once 'db_conn.php';

    $id = $_POST['id'];
   
    $sql = "DELETE FROM expense_details WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      header('Location: http://localhost/xpense_app/ ');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
