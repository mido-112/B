<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $num = $_POST['num'];
    $_SESSION['cart'][$product] = $num;
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

$products = [
    ['id' => 'desk_01', 'name' => 'a-1', 'image' => "./photo/a-1.jpg", 'price' => '¥10,000', 'details' => 'ジュニパー・クミン・サンダルウッド'],
    ['id' => 'chair_07', 'name' => 'b-1', 'image' => "./photo/b-1.jpg", 'price' => '¥8,500', 'details' => 'フランキンセンス・ベチバー'],
    ['id' => 'lamp_02', 'name' => 'c-1', 'image' => "./photo/c-1.jpg", 'price' => '¥5,200', 'details' => 'ラベンダー・ベルガモット'],
    ['id' => 'sofa_03', 'name' => 'd-1', 'image' => "./photo/d-1.jpg", 'price' => '¥22,000', 'details' => 'バニラ・パチョリ・アンバー'],
    ['id' => 'shelf_04', 'name' => 'e-1', 'image' => "./photo/e-1.jpg", 'price' => '¥60,500', 'details' => 'ローズ・イランイラン・シダーウッド'],
    ['id' => 'table_05', 'name' => 'f-1', 'image' => "./photo/f-1.jpg", 'price' => '¥16,800', 'details' => 'シトラス・グリーン・ムスク']
];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" type="text/css" href="h2.css">
    <style>
        /* レスポンシブデザイン */
        @media (max-width: 768px) {
            .slider-item {
                width: 80%;
            }
        }

        @media (max-width: 480px) {
            .slider-item {
                width: 100%;
            }
        }

        /* スライダーのアニメーション */
        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
    </style>
</head>
<body>
<h1>商品を比較する</h1>
<a href="../cart/cart.php">カートを見る</a>
<!-- スライダーコンテナ -->
<div class="slider-container">
    <button class="slider-nav prev">←</button>
    <div class="slider">
        <?php foreach ($products as $product): ?>
        <div class="slider-item">
            <form action="" method="post">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <h2><a href="product_details.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h2>
                <p><?php echo $product['details']; ?></p>
                <p><?php echo $product['price']; ?></p>
                <input type="hidden" name="product" value="<?php echo $product['id']; ?>">
                <input type="number" name="num" min="1" value="1">
                <?php if (isset($cart[$product['id']])): ?>
                    <p>追加済み</p>
                <?php else: ?>
                    <input type="submit" value="カートに追加">
                <?php endif; ?>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="slider-nav next">→</button>
</div>

<script>
    // スライダーの制御スクリプト
    const slider = document.querySelector('.slider');
    const items = document.querySelectorAll('.slider-item');
    let currentIndex = 0;

    document.querySelector('.next').addEventListener('click', () => {
        if (currentIndex < items.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; // ループする場合
        }
        updateSliderPosition();
    });

    document.querySelector('.prev').addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = items.length - 1; // ループする場合
        }
        updateSliderPosition();
    });

    function updateSliderPosition() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
</script>
</body>
</html>
