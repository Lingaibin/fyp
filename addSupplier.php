<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new supplier</title>
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
</head>
<body>
    <?php
        include 'sidenav.php';
    ?>

    <div class="main">
        <h1>This is Add new supplier page.</h1>
        <form action="insertSupplier.php" method="post">
            <h1>Add New Supplier</h1>
            <div class="row">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" name="supplierName" required>
            </div>
            <div class="row">
                <label for="supplierPhoneNumber">Supplier Phone Number:</label>
                <input type="text" name="supplierPhoneNumber" required>
            </div>
            <div class="row">
                <label for="supplierAddress">Supplier Address:</label>
                <input type="text" name="supplierAddress" required>
            </div>
            <input type="submit" name="submit" value="Confirm and Save">
        </form>
    </div>
   
</body>
</html> 