<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xpense App</title>

    <!--load all Font Awesome styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        body{
            padding: 50px;
        }

        .blue-btn{
            background: none;
            border: none;
            background-color: #2f80ed;
            color: white;
            font-weight: bold;
            width: 80px;
            height: 25px;
            font-size: 12px;
        }

        .center-children{
            display: flex;
            justify-content: center;
        }

        .gap8{
            gap: 8px;
        }

        .w315{
            width: 315px;
        }
        .w220{
            width: 220px;
        }


        .w80{
            width: 80px;
        }

        .lbl{
            padding: 1px 4px;
            margin-top: 5px;
            margin-bottom: 5px;
            background-color: #f5f5f5;
        }

        .mt50{
            margin-top: 50px;
        }

        .mt5{
            margin-top: 5px;
        }

        .mt0{
            margin-top: 0;
        }

        .data-row{
            font-size: 18px;
        }

        .i-btn{
            background: none;
            border: none;
            font-size: 20px;
        }

        .red{
            color: red;
        }

        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }

        .data-btns{
            width: 80px;
            margin: 5px 0;
            display: flex;
            justify-content: center;width: 80px;
            background-color: #f5f5f5;
        }
        .hidden{
            visibility: hidden;
        }
        .data-view{
            max-height: 250px;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
    <h3 class="text-center">Expense App</h3>

    <form action="insertUpdate.php" method="post" class="mt50">
        <div class="center-children gap8">
            <input type="hidden" id="id" name="id" value="">
            <input type="text" class="w220" name="expense_head" id="expenseHead" placeholder="Detail">
            <input type="text" class="w80 text-right" name="expense_amt" id="expenseAmt" placeholder="Amount">
            <input type="submit" id="addBtn" class="blue-btn" value="Add +">
        </div>
        <div class="center-children mt5">
            <textarea name="expense_note" id="expenseNote" cols="42" rows="2" placeholder="Note"></textarea>
            <input type="text" class="w80 hidden">
        </div>
    </form>

    <div class="mt50 data-view">
        <?php
            require_once 'db_conn.php';

            $select_sql = "SELECT * from  expense_details ORDER BY create_date DESC";
            $result = $conn->query($select_sql);
    
            $totalAmt = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $totalAmt += $row["expense_amt"];
        ?>
        <div class="data-row">
            <div class="center-children gap8">
                <p class="lbl w220 expense-head"><?php echo $row["expense_head"]; ?></p>
                <p class="lbl w80 text-right expense-amt"><?php echo $row["expense_amt"]; ?></p>

                <div class="data-btns">
                    <button class="i-btn edit-btn"><i class="fa fa-edit"></i></button>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" class="id" value="<?php echo $row["id"]; ?>">
                        <input type="submit" class="i-btn red" value="&#10008;">
                        <!-- <i class="fa fa-trash" aria-hidden="true"></i> -->
                    </form>
                </div>
            </div>
            <div class="center-children gap8">
                <p class="mt0 w315 expense-note"><?php echo $row["expense_note"]; ?></p>
                <p class="mt0 w80 hidden">Note</p>
            </div>
        </div>
        <?php
                }
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
    </div>

    <div class="mt50">
        <div class="data-row center-children">
            <p class="lbl w220">Total</p>
            <p class="lbl w80 text-right"><?php echo $totalAmt; ?></p>
            
            <div class="data-btns">
            </div>
        </div>

    </div>

    <script>
        $('.data-view').on('click', '.edit-btn', function(){
            var id = $(this).closest( ".data-row" ).find(".id").val();
            var expenseHead = $(this).closest( ".data-row" ).find(".expense-head").text();
            var expenseAmt = $(this).closest( ".data-row" ).find(".expense-amt").text();
            var expenseNote = $(this).closest( ".data-row" ).find(".expense-note").text();

            $('#id').val(id);
            $('#expenseHead').val(expenseHead);
            $('#expenseAmt').val(expenseAmt);
            $('#expenseNote').val(expenseNote);
            $('#addBtn').val("Update");
        });
    </script>
</body>
</html>