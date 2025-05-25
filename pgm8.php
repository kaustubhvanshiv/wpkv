//make sure you save this file in /xammp/opt/lammp/htdocs/firstphp and then run 


<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["itemID"]) && isset($_POST["itemName"]) && isset($_POST["itemQty"])) {
        $itemID = $_POST["itemID"];
        $itemName = $_POST["itemName"];
        $itemQty = $_POST["itemQty"];

        if ($itemID && $itemName && $itemQty > 0) {
            $_SESSION['cart'][] = [
                'id' => $itemID,
                'name' => $itemName,
                'qty' => $itemQty
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Computer Store - Add Item</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
            max-width: 700px;
            margin: auto;
            background-color: #e3f2fd;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #4a148c;
        }

        form {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        label {
            font-weight: bold;
            color: #006064;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            width: 95%;
            margin: 8px 0 15px 0;
            border: 1px solid #80cbc4;
            border-radius: 6px;
            transition: border 0.3s;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border: 1px solid #4db6ac;
            outline: none;
        }

        input[type="submit"] {
            background-color: #4a148c;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #6a1b9a;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #b2ebf2;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #006064;
            color: white;
        }

        h3 {
            color: #00796b;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>🛒 Computer Store - Add Item to Cart</h2>

<form method="post">
    <label>Item ID:</label><br>
    <input type="text" name="itemID" required><br>

    <label>Item Name:</label><br>
    <input type="text" name="itemName" required><br>

    <label>Item Quantity:</label><br>
    <input type="number" name="itemQty" min="1" required><br>

    <input type="submit" value="Add to Cart">
</form>

<?php if (!empty($_SESSION['cart'])): ?>
    <h3>🧾 Cart Items:</h3>
    <table>
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['qty']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>
