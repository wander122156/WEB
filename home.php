<?php
require_once('db.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static\styles\home.css">
    <title>Let's do it together</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Oxygen&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-block">
                <div class="header__logo">
                    <a href=""><img src="static\images\Escape(2).svg" alt="header logo name: Escape"></a>
                </div>

                <div class="header__nav">
                    <ul class="header__list">
                        <li class="header__item">
                            <a class="header__link" href="">Home</a>
                        </li>
                        <li class="header__item">
                            <a class="header__link" href="">Categories</a>
                        </li>
                        <li class="header__item">
                            <a class="header__link" href="">About</a>
                        </li>
                        <li class="header__item">
                            <a class="header__link" href="">Contact</a> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="intro">
            <div class="container">
                <h1 class="intro__tittle">
                    Let's do it together
                </h1>
                <p class="intro__sub-tittle">
                    We travel the world in search of stories. Come along for the ride.
                </p>
                <div class="intro__button">
                    View Latest Posts
                </div>
            </div>
        </section>
        <div class="middle">
            <div class="container">
                    <ul class="middle__list">
                        <li class="middle__item">
                            <a class="middle__link" href="">Nature</a>
                        </li>
                        <li class="middle__item">
                            <a class="middle__link" href="">Photography</a>
                        </li>
                        <li class="middle__item">
                            <a class="middle__link" href="">Relaxation</a>
                        </li>
                        <li class="middle__item">
                            <a class="middle__link" href="">Vacation</a> 
                        </li>
                        <li class="middle__item">
                            <a class="middle__link" href="">Travel</a> 
                        </li>
                        <li class="middle__item">
                            <a class="middle__link" href="">Adventure</a> 
                        </li>
                    </ul>
            </div>
        </div>  
        <div class="posters">
            <div class="container">
                <!-- top posters -->
                <div class="posters__wrapper">
                    <div class="posters__title">
                        <h2 class="posters__title-name">Featured Posts</h2>
                        <div class="under-line"></div>
                    </div>
                    <div class="cards">
                         
                    <?php
                        $featured = 1;
                        $conn = createDBConnection();
                        getAndPrintPostsFromDB($conn, $featured);
                        closeDBConnection($conn);
                    ?>

                    </div>

                    
                </div>
                <!-- bottom posters -->
                <div class="posters__bottom">
                    <div class="posters__title">
                        <h2 class="posters__title-name">Most Recent</h2>
                        <div class="under-line"></div>
                    </div>
                    <div class="cards-bottom">
                        
                    <?php
                        $featured = 0;
                        $conn = createDBConnection();
                        getAndPrintPostsFromDB($conn, $featured);
                        closeDBConnection($conn);
                    ?>
                    
                    </div> 
                </div>
            </div>
            </div> 
            <!--bottom header  -->
            <div class="bottom__container">
                <div class="bottom__picture">
                        <div class="container">
                            <div class="bottom-line">
                                <img class="bottom__logo" src="static\images\bottom-escape.svg" alt="bottom loglo name: Escape">
                                <div class="bottom__nav">
                                    <ul class="bottom__list">
                                        <li><a class="bottom__link" href="">home</a></li>
                                        <li><a class="bottom__link" href="">categories</a></li>
                                        <li><a class="bottom__link" href="">about</a></li>
                                        <li><a class="bottom__link" href="">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
            </div> 
        </div><!-- posters end -->        
    </main>
</body>
</html>