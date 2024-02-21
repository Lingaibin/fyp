<?php
    include("db.php");

    $itemName = mysqli_escape_string($conn, $_POST["itemName"]);
    $itemPrice = (float)$_POST["itemPrice"];
    $itemCategory = mysqli_escape_string($conn, $_POST["itemCategory"]);
    $itemBrand = mysqli_escape_string($conn, $_POST["itemBrand"]);
    $itemSize = mysqli_escape_string($conn, $_POST["itemSize"]);
    $itemQuantity = (int)$_POST["itemQuantity"];
    $itemAlert = (int)$_POST["itemAlert"];
    $supplier = $_POST["supplier"];

    $query = "INSERT INTO inventory (itemID, itemName, itemPrice, itemCategory, itemBrand, itemSize, itemQuantity, itemAlert, supplierID)
     VALUES (0, '$itemName', '$itemPrice', '$itemCategory', '$itemBrand', '$itemSize', '$itemQuantity', '$itemAlert', $supplier)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Item Successfully Added');
        setTimeout(function() {
            window.location.href = 'inventory.php';
        }, 500); // Redirect after 0.5 second (500 milliseconds)
      </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
