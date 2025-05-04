<?php
require_once 'include/ProductHeader.php';
require_once 'include/NavBar.php';
require_once 'include/sqlConfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchResults = [];
if (isset($_GET['query'])) {
    $query = "%" . trim($_GET['query']) . "%";
    $statement = $conn->prepare("SELECT name, link, price, image FROM product WHERE name LIKE ?");
    $statement->bind_param("s", $query);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
}

$conn->close();
?>

<head>
    <link rel="stylesheet" href="css/productDc.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 10px;
            padding: 0;
        }

        .header {
            overflow: hidden;
            padding: 20px 10px;
            font-size: 20px;
            margin-bottom: 20px;
            background-color: lightgray;
        }

        .container {
            width: 60%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="text"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #ae00be;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #800090;
        }

        .results {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .product {
            background: white;
            margin: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 220px;
        }

        .product img {
            width: 100%;
            border-radius: 5px;
        }

        .product h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .product p {
            color: #666;
            font-size: 16px;
        }

        .product a {
            display: block;
            margin-top: 10px;
            padding: 8px;
            background: #ae00be;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .product a:hover {
            background: #800090;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Find Your Product</h2>
        <form method="get">
            <input type="text" name="query" placeholder="Search for products..." required>
            <button type="submit">Search</button>
        </form>
    </div>

<?php if (!empty($searchResults)) : ?>
    <div class="results">
        <?php foreach ($searchResults as $product) : ?>
            <div class="product">
                <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <h3><?php echo $product['name']; ?></h3>
                <p>$<?php echo number_format($product['price'], 2); ?></p>
                <a href="<?php echo $product['link']; ?>">View Product</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php elseif (isset($_GET['query'])) : ?>
    <div class="container">
        <p>No results found for "<strong><?php echo $_GET['query']; ?></strong>"</p>
    </div>
<?php endif; ?>

</body>
</html>
