<?php
include 'db.php';

// Check if 'itemID' is set in URL
if(isset($_GET['itemID'])) {
    $itemID = $_GET['itemID'];

    // Prepare a select statement
    $sql = "SELECT itemID, itemName, itemPrice, itemCategory, itemBrand, itemSize, itemQuantity, itemAlert, inventory.supplierID, supplierName FROM inventory LEFT JOIN supplier ON inventory.supplierID = supplier.supplierID WHERE itemID = ?";

    if($stmt = mysqli_prepare($conn, $sql)) {
        // Set parameters
        $param_itemID = $itemID;

        // Bind variables to the prepared statement
        mysqli_stmt_bind_param($stmt, "i", $param_itemID);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. */
                if($row = mysqli_fetch_assoc($result)) {
                    // Retrieve individual field value
                    $itemName = $row["itemName"];
                    $itemPrice = $row["itemPrice"];
                    $itemCategory = $row["itemCategory"];
                    $itemBrand = $row["itemBrand"];
                    $itemSize = $row["itemSize"];
                    $itemQuantity = $row["itemQuantity"];
                    $itemAlert = $row["itemAlert"];
                    $supplierID = $row["supplierID"];
                    $supplierName = $row["supplierName"];

                }
            } else {
                // URL doesn't contain valid supplierID. Redirect or error message
                echo("Error occured");
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // URL doesn't contain supplierID. Redirect or error message
    echo("Error occured");
    exit();
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate and update the data in database
    
    // Prepare an update statement
    $sql = "UPDATE inventory SET itemName = ?, itemPrice = ?, itemCategory = ?, itemBrand = ?, itemSize = ?, itemQuantity = ?, itemAlert = ?, supplierID = ?   WHERE itemID = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Set parameters
        $param_itemName = $_POST["itemName"];
        $param_itemPrice = $_POST["itemPrice"];
        $param_itemCategory = $_POST["itemCategory"];
        $param_itemBrand = $_POST["itemBrand"];
        $param_itemSize = $_POST["itemSize"];
        $param_itemQuantity = $_POST["itemQuantity"];
        $param_itemAlert = $_POST["itemAlert"];
        $param_supplier = $_POST["supplier"];
        

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sdsssiiii", $param_itemName, $param_itemPrice, $param_itemCategory, $param_itemBrand, $param_itemSize, $param_itemQuantity, $param_itemAlert, $param_supplier, $param_itemID);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            echo "<script>alert('Item Successfully Edited');
            setTimeout(function() {
                window.location.href = 'inventory.php';
            }, 500); // Redirect after 0.5 second (500 milliseconds)
          </script>";
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new item</title>
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
</head>
<body>
    <?php
        include 'sidenav.php';
    ?>

    <div class="main">
        <h1>This is edit item page.</h1>
        <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post">
        <h1>Edit Item</h1>
            <div class="row">
                <label for="itemName">Item Name:</label>
                <input type="text" name="itemName" value="<?php echo $itemName?>" required>
            </div>
            <div class="row">
                <label for="itemPrice">Item Price (RM):</label>
                <input type="number" id="itemPrice" name="itemPrice" min="0.01" step="0.01" pattern="\d+(\.\d{2})?" value="<?php echo $itemPrice?>" required>
            </div>
            <div class="row">
                <label for="itemCategory">Item Category:</label>
                <input type="text" name="itemCategory" value="<?php echo $itemCategory?>" required>
            </div>
            <div class="row">
                <label for="itemBrand">Item Brand:</label>
                <input type="text" name="itemBrand" value="<?php echo $itemBrand?>">
            </div>
            <div class="row">
                <label for="itemSize">Item Size:</label>
                <input type="text" name="itemSize" value="<?php echo $itemSize?>">
            </div>
            <div class="row">
                <label for="itemQuantity">Item Quantity:</label>
                <input type="number" name="itemQuantity" step="1" value="<?php echo $itemQuantity?>">
            </div>
            <div class="row">
                <label for="itemAlert">Notify when quantity less than:</label>
                <input type="text" name="itemAlert" step="1"value="<?php echo $itemAlert?>">
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
                                // Check if the current supplierID matches $supplierID
                                $selected = ($row["supplierID"] == $supplierID) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $row["supplierID"];?>" <?php echo $selected; ?>><?php echo $row["supplierName"];?></option>
                    
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