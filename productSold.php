<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidenav.css">
    <link rel="stylesheet" href="theme.css">
    <title>Product Sold</title>
</head>
<body>
    <?php
        include'sidenav.php';
    ?>

    <div class="main">
       <h1>Product Sold on XXXX-XX-XX</h1>

       <table>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Size</th>
                <th>Price (RM)</th>
                <th>Quantity</th>
                <th>Total Sales (RM)</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Michelin Energy XM2+</td>
                <td>Tyre</td>
                <td>Michelin</td>
                <td>205/65R15</td>
                <td>420.00</td>
                <td>2</td>
                <td>840.00</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Michelin Energy XM2+</td>
                <td>Tyre</td>
                <td>Michelin</td>
                <td>195/65R15</td>
                <td>350.00</td>
                <td>4</td>
                <td>1400.00</td>
            </tr>
       </table>
    </div>
</body>
</html>