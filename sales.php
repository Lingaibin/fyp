<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidenav.css">
    <title>Sales</title>
    <style>
        /* Table styling */
        table {
            width: 99%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #c3e6cb;
            font-weight: bold;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #e0f2e9;
        }

        tr:hover {
            background-color: #6cce83;
        }

        tr a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease-in-out;
        }

        tr a:hover {
            color: #0056b3;
        }
        .row{
            width:70%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
        include'sidenav.php';
    ?>

    <div class="main">
        <div class="row" style="display:flex; width:30%; align-items: center;justify-content:space-between;">
            <h1>Sales</h1>
            <input type="text" placeholder="Search">
            <!-- <select name="Category" id="">
                <option value="">Select Category</option>
            </select> -->
        </div>
        
        <!--sales table-->
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>1</td>
                <td>testing</td>
                <td>10.00</td>
                <td>2</td>
                <td>20.00</td>
            </tr>
        </table>
        <br>

        <!-- Payment details-->
        <form action="" style="margin-left:70%;">
            <div class="row">
                <label for="noPlate">No Plate</label>
                <input type="text" name="noPlate">
            </div>
            <div class="row">
                <label for="total">Total</label>
                <input type="number" name="total">
            </div>
            <div class="row">
                <label for="payment">Payment</label>
                <input type="number" name="payment">
            </div>
            <div class="row">
                <label for="paymentMethod">Payment Method</label>
                <select name="paymentMethod" id="paymentMethod">
                    <option value="">Select Payment Method</option>
                    <option value="">Cash</option>
                    <option value="">Card</option>
                    <option value="">TnG e-Wallet</option>
                    <option value="">Online Banking</option>
                </select>
            </div>
            <div class="row">
                <label for="charge">Charge</label>
                <input type="number" name="charge">
            </div class="row">
            <input type="submit" name="submit" value="save">
        </form>
    </div>
</body>
</html>