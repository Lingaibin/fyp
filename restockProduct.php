<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <title>Restock product</title>
</head>
<body>
    <?php
        include'sidenav.php';
    ?>

    <div class="main">
        <h1>Restock Information</h1>
        <form action="">
            <div>
                <label for="supplierName">Supplier Name:</label>
                <select name="supplierName" id="supplierName">
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
            <div>
                <label for="supplierPhoneNumber">Supplier Phone Number:</label>
                <input type="text" name="supplierPhoneNumber">
            </div>
            <div>
                <label for="supplierAddress">Supplier Address:</label>
                <input type="text" name="supplierAddress">
            </div>
            <div>
                <label for="invoiceNumber">Invoice Number:</label>
                <input type="text" name="invoiceNumber">
            </div>
            <div>
                <label for="restockFee">Restock Fee (RM):</label>
                <input type="number" name="restockFee" min="0.01" step="0.01">
            </div>
            <div>
                <label for="dateOrderPlaced">Date Order Placed:</label>
                <input type="date" name="dateOrderPlaced">
            </div>
            <div>
                <label for="dateOrderReceived">Date Order Received</label>
                <input type="date" name="dateOrderReceived">
            </div>
            <br>

            <!--Restock product-->
            <div style="display:flex; align-items:center; justify-content:space-between;">
                <h2 style="width:50%;">Restock Product</h2>
                <input type="text" placeholder="Search bar">
            </div>
            
            <table>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Total Price (RM)</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Michelin Energy XM2+</td>
                    <td>205/55R16</td>
                    <td>350.00</td>
                    <td>5</td>
                    <td>1750.00</td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="Confirm and Save">
        </form>
    </div>
        


</body>
</html>