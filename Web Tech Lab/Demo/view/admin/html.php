<?php

$jsonFile = "products.json";

// Read existing products
$products = [];

if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $products = json_decode($jsonData, true) ?? [];
}


// ================= ADD PRODUCT =================

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $code = $_POST['code'];
    $price = $_POST['price'];

    $products[] = [
        "name" => $name,
        "code" => $code,
        "price" => $price
    ];

    file_put_contents(
        $jsonFile,
        json_encode($products, JSON_PRETTY_PRINT)
    );

    header("Location: index.php");
    exit;
}


// ================= UPDATE PRODUCT =================

if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $products[$id]['name'] = $_POST['name'];
    $products[$id]['code'] = $_POST['code'];
    $products[$id]['price'] = $_POST['price'];

    file_put_contents(
        $jsonFile,
        json_encode($products, JSON_PRETTY_PRINT)
    );

    header("Location: index.php");
    exit;
}


// ================= DELETE PRODUCT =================

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    unset($products[$id]);

    $products = array_values($products);

    file_put_contents(
        $jsonFile,
        json_encode($products, JSON_PRETTY_PRINT)
    );

    header("Location: index.php");
    exit;
}


// ================= SEARCH PRODUCT =================

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Product CRUD</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">

<h2>Product Management System</h2>


<!-- ================= ADD FORM ================= -->

<h3>Add Product</h3>

<form method="POST">

    Product Name:
    <input type="text" name="name" required>

    <br><br>

    Product Code:
    <input type="text" name="code" required>

    <br><br>

    Price:
    <input type="number" name="price" required>

    <br><br>

    <button type="submit" name="add">
        Add Product
    </button>

</form>


<hr>


<!-- ================= SEARCH ================= -->

<h3>Search Product</h3>

<form method="GET" class="search-form">

    <input
        type="text"
        name="search"
        placeholder="Enter name or code"
        value="<?php echo $search; ?>"
    >

    <button type="submit">
        Search
    </button>

    <a href="index.php" class="show-all">Show All</a>

</form>


<hr>


<!-- ================= PRODUCT TABLE ================= -->

<h3>Product List</h3>

<table border="1" cellpadding="10">

<tr>

    <th>Product Name</th>
    <th>Product Code</th>
    <th>Price</th>
    <th>Action</th>

</tr>


<?php

foreach ($products as $index => $product) {

    // Search condition
    if (
        $search != "" &&
        stripos($product['name'], $search) === false &&
        stripos($product['code'], $search) === false
    ) {
        continue;
    }

?>

<tr>

    <td>
        <?php echo $product['name']; ?>
    </td>

    <td>
        <?php echo $product['code']; ?>
    </td>

    <td>
        <?php echo $product['price']; ?>
    </td>

    <td>

        <!-- UPDATE -->

        <a href="?edit=<?php echo $index; ?>">
            Update
        </a>

        |

        <!-- DELETE -->

        <a
            href="?delete=<?php echo $index; ?>"
            onclick="return confirm('Are you sure?')"
        >
            Delete
        </a>

    </td>

</tr>

<?php

}

?>

</table>


<?php

// ================= EDIT FORM =================

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $product = $products[$id];

?>

<hr>

<h3>Update Product</h3>

<form method="POST">

    <input
        type="hidden"
        name="id"
        value="<?php echo $id; ?>"
    >

    Product Name:

    <input
        type="text"
        name="name"
        value="<?php echo $product['name']; ?>"
        required
    >

    <br><br>

    Product Code:

    <input
        type="text"
        name="code"
        value="<?php echo $product['code']; ?>"
        required
    >

    <br><br>

    Price:

    <input
        type="number"
        name="price"
        value="<?php echo $product['price']; ?>"
        required
    >

    <br><br>

    <button type="submit" name="update">
        Update Product
    </button>

</form>

<?php

}

?>

</div>
</body>
</html>