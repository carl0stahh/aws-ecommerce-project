<?php
$host = 'ecommerce-db.cl2wmywakooy.ap-southeast-2.rds.amazonaws.com';
$user = 'admin';
$pass = getenv(DB_PASSWORD');
$db   = 'ecommerce';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$result = $conn->query('SELECT * FROM products');
?>
<!DOCTYPE html>
<html>
<head>
    <title>My E-Commerce Store</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; background: #f5f5f5; }
        h1 { color: #333; }
        .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .product { background: white; border-radius: 12px; padding: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .product img { width: 100%; height: 180px; object-fit: cover; border-radius: 8px; background: #eee; }
        .product h2 { font-size: 1em; margin: 12px 0 4px; }
        .price { color: green; font-size: 1.2em; font-weight: bold; }
        .btn { background: #ff9900; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; width: 100%; margin-top: 10px; font-size: 1em; }
        .no-img { width: 100%; height: 180px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #aaa; }
    </style>
</head>
<body>
    <h1>🛒 My E-Commerce Store</h1>
    <div class="grid">
    <?php while($row = $result->fetch_assoc()): ?>
    <div class="product">
        <?php if($row['image_url']): ?>
            <img src="<?= $row['image_url'] ?>" alt="<?= $row['name'] ?>">
        <?php else: ?>
            <div class="no-img">No image yet</div>
        <?php endif; ?>
        <h2><?= $row['name'] ?></h2>
        <p><?= $row['description'] ?></p>
        <p class="price">$<?= $row['price'] ?></p>
        <button class="btn">Add to Cart</button>
    </div>
    <?php endwhile; ?>
    </div>
</body>
</html>
