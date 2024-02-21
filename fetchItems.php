<?php
include 'db.php';

$output = '';
$searchText = $_POST['query'];

if (isset($searchText)) {
    // If the search text is empty, return all records
    if (empty($searchText)) {
        $sql = "SELECT itemID, itemName, itemPrice, itemCategory, itemBrand, itemSize, itemQuantity, itemAlert, supplier.supplierName FROM inventory 
                LEFT JOIN supplier ON inventory.supplierID = supplier.supplierID";
    } else {
        $sql = "SELECT itemID, itemName, itemPrice, itemCategory, itemBrand, itemSize, itemQuantity, itemAlert, supplier.supplierName FROM inventory 
                LEFT JOIN supplier ON inventory.supplierID = supplier.supplierID
                WHERE itemName LIKE '%$searchText%'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $output .= "<tr>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Status</th>
                            <th>Item Category</th>
                            <th>Item Brand</th>
                            <th>Item Size</th>
                            <th>Item Price (RM)</th>
                            <th>Item Quantity</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>";

            $counter = 1;
            while($row = mysqli_fetch_assoc($result)) {

            $status = "";
            if($row["itemQuantity"] >= $row["itemAlert"]) {
                $status = "Available";
            } else if($row["itemQuantity"] == 0) {
                $status = "Out of Stock";
            } else {
                $status = "Low Stock";
            }

            $output .= "<tr>
                            <td>{$counter}</td>
                            <td>{$row["itemName"]}</td>
                            <td>{$status}</td>
                            <td>{$row["itemCategory"]}</td>
                            <td>{$row["itemBrand"]}</td>
                            <td>{$row["itemSize"]}</td>
                            <td>{$row["itemPrice"]}</td>
                            <td>{$row["itemQuantity"]}</td>
                            <td>{$row["supplierName"]}</td>
                            <td>
                                <a href='updateItem.php?itemID={$row['itemID']}'><i class='fa fa-edit'></i></a> 
                                <a href='#' onclick='return confirmDelete({$row['itemID']})'><i class='fa fa-trash-o'></i></a>
                            </td>
                        </tr>";
            $counter++;
            }
        } else {
            $output=  "<tr><td colspan='10'>No Item</td></tr>";
        }
    }else {
        $output .= "<tr><td colspan='10'>Error retrieving data</td></tr>";
    }  
} else {
    // If no search text provided
    $output = "<tr><td colspan='10'>Please enter a search query</td></tr>";
}

echo $output;
mysqli_close($conn);

?>