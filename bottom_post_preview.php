<!-- card bottom -->
<div class="posters__cards-bottom">
    <div class="posters__bottom-wrapper" >
        <img class="posters__bottom-img" src="<?= $post['image_url'] ?>" alt="">
        <!-- post block picture доб alt -->
        <div class="card__bottom-wrapper" >
            <div class="card-title__bottom" >
                <div><?= $post['title'] ?></div>
            </div>
            <div class="card-subtitle__bottom">
                <a class="card-subtitle__bottom_text" href='/post?id=<?= $post['post_id'] ?>'>
                    <?= $post['subtitle'] ?>
                </a>
            </div>
    </div>
        
        <div class="bottom-space"></div>
        
        <div class="card-info__bottom">
            <div class="card-user">
                <img src="<?= $post['author_url']?>" alt="author image">
                <div class="card-user-name">
                    <?= $post['author'] ?>
                </div>
            </div>
            <div class="card-date">
                <?php
                    $date_from_db = strtotime($post['publish_date']);
                    $date = date("m/d/Y", $date_from_db);
                    echo $date;
                ?>
            </div>
        </div>   
        
    </div>
</div>