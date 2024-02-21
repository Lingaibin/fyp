<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new item</title>
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <style>
        /* Form styling */

    </style>
</head>
<body>
    <?php
        include 'sidenav.php';
    ?>

    <div class="main">
        <form action="insertItem.php" method="post">
        <h1>Add New Item</h1>
            <div class="row">
                <label for="itemName">Item Name:</label>
                <input type="text" name="itemName" required>
            </div>
            <div class="row">
                <label for="itemPrice">Item Price (RM):</label>
                <input type="number" id="itemPrice" name="itemPrice" min="0.01" step="0.01" pattern="\d+(\.\d{2})?" required>
            </div>
            <div class="row">
                <label for="itemCategory">Item Category:</label>
                <input type="text" name="itemCategory" required>
            </div>
            <div class="row">
                <label for="itemBrand">Item Brand:</label>
                <input type="text" name="itemBrand">
            </div>
            <div class="row">
                <label for="itemSize">Item Size:</label>
                <input type="text" name="itemSize">
            </div>
            <div class="row">
                <label for="itemQuantity">Item Quantity:</label>
                <input type="number" name="itemQuantity" step="1" >
            </div>
            <div class="row">
                <label for="itemAlert">Notify when quantity less than:</label>
                <input type="text" name="itemAlert" step="1">
            </div>
            <div class="row">
                <label for="supplier">Supplier:</label>
                <select name="supplier">
                    <option value="">Select Supplier</option>
                    <?php 
                        include 'db.php';
                        $sql = "SELECT supplierID, supplierName, supplierPhoneNumber, supplierLocation FROM supplier";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row["supplierID"];?>"><?php echo $row["supplierName"];?></option>
                    
                    <?php
                            }
                        }
                        mysqli_close($conn);
                    ?>
                </select>
            </div>
            <!-- <div class="row">
                <label for="itemCategory">Supplier Phone Number:</label>
                <input type="text" name="itemCategory" value=" " readonly>
            </div>
            <div class="row">
                <label for="itemCategory">Supplier Address:</label>
                <input type="text" name="itemCategory" value=" " readonly>
            </div> -->
            <br><input type="submit" name="submit" value="Confirm and Save">
        </form>
    </div>
<script>

</script>
</body>
</html> 