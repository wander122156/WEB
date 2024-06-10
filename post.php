<?php
$PId = $_GET['id'];
require_once('db.php');

$conn = createDBConnection();

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
$postId = $_GET['id'];
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM post WHERE post_id = ?");
$stmt->bind_param("i", $postId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Проверяем, если есть хотя бы одна запись с таким ID
if ($row['count'] > 0) {
    GetPostsFromDB($conn); // Получаем данные поста
} else {
    header("Location: /error.php");
}

closeDBConnection($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static\styles\style.css">
    <title>
        <?= $row['title'];?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Oxygen&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-line">
                <div class="header__logo">
                    <img src="static\images\Escape.svg" alt="">
                </div>

                <div class="header__nav">
                    <ul class="header__list ">
                        <li><a class="header__link" href="">Home</a></li>
                        <li><a class="header__link" href="">Categories</a></li>
                        <li><a class="header__link" href="">About</a></li>
                        <li><a class="header__link" href="">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="header__down">
                <div class="h1">
                    <?= $row['title']; 
                ?>
                </div>
                <div class="h2">
                    <?= $row['subtitle'];
                ?></div>
            </div>
        </div>
    </header>
    <main>
        <div class="box">
            <div class="big-picture">
                <img src="<?= $row['image_url']?>" alt="">
            </div>
            <div class="text-block">
                <!-- Сделай одним параграфом -->
                <div class="p">
                    <?= $row['content']?>
                </div>
            </div>
            <div class="bottom__container">
                <div class="bottom__picture">
                    <div class="bottom-line">
                        <div class="bottom__logo">
                            <img src="static\images\bottom_escape.svg" alt="">
                        </div>
                        <div class="bottom__nav">
                            <ul class="bottom__list">
                                <li></li><a class="bottom__link" href="">home</a>
                                <li></li><a class="bottom__link" href="">categories</a>
                                <li></li><a class="bottom__link" href="">about</a>
                                <li></li><a class="bottom__link" href="">Contact</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html