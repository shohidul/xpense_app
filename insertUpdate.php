<?php
    require_once 'db_conn.php';

    $id = $_POST['id'];
    $expense_head = $_POST['expense_head'];
    $expense_amt = $_POST['expense_amt'];
    $expense_note = $_POST['expense_note'];

    date_default_timezone_set('Asia/Dhaka');
    $create_date = date('Y-m-d H:i:s');
    $update_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO expense_details (expense_head, expense_amt, expense_note, create_date, update_date)  VALUES ('$expense_head', '$expense_amt', '$expense_note', '$create_date', '$update_date')";
    if (!empty($id)) {
        $sql = "UPDATE expense_details SET expense_head =  '$expense_head', expense_amt = '$expense_amt', expense_note = '$expense_note', update_date = '$update_date' WHERE id = $id";
    }
    
    if ($conn->query($sql) === TRUE) {
      header('Location: http://localhost/xpense_app/ ');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>