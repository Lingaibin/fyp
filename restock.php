<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restock</title>
    <style>
        .row{
            display: flex;
            justify-content: space-between;
            width: 50%;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php
        include'sidenav.php';
    ?>

    <div class="main">
        <div class="row">
            <h1 style="width:100%;">Restock History</h1>
            <a href="restockProduct.php"><button>Restock</button></a>
            <input type="text" placeholder="Search bar">
        </div>

        <!--Table for restock history-->
        <table>
            <tr>
                <th>InvoiceID</th>
                <th>Supplier Name</th>
                <th>Date Order Placed</th>
                <th>Date Order Received</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Supplier 1</td>
                <td>2023-01-15</td>
                <td>2023-01-30</td>
                <td>0123456789</td>
                <td><a href=""><i class="fa fa-eye"></i></a></td>
            </tr>
        </table>
    </div>
</body>
</html>