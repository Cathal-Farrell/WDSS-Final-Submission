<?php 
    require_once 'include/DefaultHeader.php';
    require_once 'include/NavBar.php';
    require_once 'include/sqlConfig.php';
?>

<head>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <h1>Best selling</h1>

<?php

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$qryResult = mysqli_query($conn, "SELECT * FROM product");

$bestSellers = [];  

// fetch_assoc learned from W3Schools: https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp
// returns next row as an associative array
while ($row = mysqli_fetch_assoc($qryResult)) {
    $bestSellers[] = [
        "link" =>  $row["link"] ,
        "image" => $row["image"],
        "name" => $row["name"]
    ];
}

mysqli_close($conn);

?>
    <div class="bestSellerFlex">
        <?php foreach ($bestSellers as $product) : ?>
            <div>
                <a href="<?php echo $product['link']; ?>">
                    <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h4><?php echo $product['name']; ?></h4>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
