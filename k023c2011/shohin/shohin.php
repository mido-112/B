<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $num = $_POST['num'];
    $_SESSION['cart'][$product] = $num;
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

$products = [
    ['id' => 'desk_01', 'name' => 'a-1', 'image' => "./photo/a-1.jpg"],
    ['id' => 'chair_07', 'name' => 'b-1', 'image' => "./photo/b-1.jpg"],
    ['id' => 'lamp_02', 'name' => 'c-1', 'image' => "./photo/c-1.jpg"],
    ['id' => 'sofa_03', 'name' => 'd-1', 'image' => "./photo/d-1.jpg"],
    ['id' => 'shelf_04', 'name' => 'e-1', 'image' => "./photo/e-1.jpg"],
    ['id' => 'table_05', 'name' => 'f-1', 'image' => "./photo/f-1.jpg"]
];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" type="text/css" href="h2.css">
</head>
<body>
<h1>商品一覧</h1>
<a href="../cart/cart.php">カートを見る</a>
<a href="../shop/shop.php">商品詳細</a>
<table>
    <tr><th>商品</th><th>写真</th><th>数量</th><th>ボタン</th></tr>
    <?php foreach ($products as $product): ?>
    <form action="" method="post">
    <tr>
        <td><?php echo $product['name']; ?></td>
        <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"></td>
        <td>
            <select name="num">
                <?php for ($i = 1; $i < 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </td>
        <td>
            <input type="hidden" name="product" value="<?php echo $product['id']; ?>">
            <?php if (isset($cart[$product['id']])): ?>
            <p>追加済み</p>
            <?php else: ?>
            <input type="submit" value="カートに入れる">
            <?php endif; ?>
        </td>
    </tr>
    </form>
    <?php endforeach; ?>
</table>
</body>
</html>
