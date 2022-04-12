<?php
    require_once 'db_conn.php';

    $expense_head = $_POST['expense_head'];
    $expense_amt = $_POST['expense_amt'];
    $expense_note = $_POST['expense_note'];

    date_default_timezone_set('Asia/Dhaka');
    $expense_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO expense_details (expense_head, expense_amt, expense_note, expense_date)  VALUES ('$expense_head', '$expense_amt', '$expense_note', '$expense_date')";
    
    if ($conn->query($sql) === TRUE) {
      header('Location: http://localhost/xpense_app/ ');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>