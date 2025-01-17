<?php

session_start();
$cart = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $kind = $_POST['kind'];

    if ($kind === 'change') {
        $num = $_POST['num'];
        $_SESSION['cart'][$product] = $num;
    } elseif ($kind === 'delete') {
        unset($_SESSION['cart'][$product]);
    }
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ショッピングカート</title>
    <link rel="stylesheet" type="text/css" href="h2.css">
</head>
<body>

<h1>ショッピングカート</h1>
<p><a href="../shohin/shohin.php">商品一覧へ</a></p>
<table>
    <tr><th>商品</th><th>個数</th><th>数量</th><th>変更ボタン</th><th>削除ボタン</th></tr>
    <?php foreach ($cart as $key => $var): ?>
    <tr>
        <td>
        <?php
        switch ($key) {
            case 'a-1':
                echo '香水';
                break;
            case 'b-1':
                echo '香水';
                break;
            case 'c-1':
                echo '香水';
                break;
            case 'd-1':
                echo '香水';
                break;
            case 'e-1':
                echo '香水';
                break;
            case 'f-1':
                echo '香水';
        }
        ?>
        </td>
        <td><?php echo $var ?>個</td>
        <form action="" method="post">
            <td>
                <select name="num">
                    <?php for ($i = 1; $i < 10; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($i == $var) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </td>
            <td>
                <input type="hidden" name="kind" value="change">
                <input type="hidden" name="product" value="<?php echo $key ?>">
                <input type="submit" value="変更">
            </td>
        </form>
        <form action="" method="post">
            <td>
                <input type="hidden" name="kind" value="delete">
                <input type="hidden" name="product" value="<?php echo $key ?>">
                <input type="submit" value="削除">
            </td>
        </form>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
