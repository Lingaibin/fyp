<?php
include 'db.php';

$output = '';
$searchText = $_POST['query'];

if (isset($searchText)) {
    // If the search text is empty, return all records
    if (empty($searchText)) {
        $sql = "SELECT supplierID, supplierName, supplierPhoneNumber, supplierLocation FROM supplier";
    } else {
        $sql = "SELECT supplierID, supplierName, supplierPhoneNumber, supplierLocation FROM supplier
                WHERE supplierName LIKE '%$searchText%'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $output .= "<tr>
                            <th>No</th>
                            <th>Supplier Name</th>
                            <th>Supplier Phone Number</th>
                            <th>Supplier Address</th>
                            <th>Action</th>
                        </tr>";

            $counter = 1;
            while($row = mysqli_fetch_assoc($result)) {

            $output .= $supplierRow = <<<EOT
            <tr>
                <td>{$counter}</td>
                <td>{$row["supplierName"]}</td>
                <td>{$row["supplierPhoneNumber"]}</td>
                <td>{$row["supplierLocation"]}</td>
                <td style="display:flex;">
                    <a href="updateSupplier.php?supplierID={$row['supplierID']}"><i class="fa fa-edit"></i></a> 
                    <a href="#" onclick="return confirmDelete('{$row['supplierID']}')"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            EOT;
            
            $counter++;
            }
        } else {
            $output=  "<tr><td colspan='10'>No Supplier</td></tr>";
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