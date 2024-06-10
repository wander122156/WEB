<div class="posters__cards">
    <div class="posters__top-bg">
        <img class="posters__top-bg-image" src="<?= $post['image_url']?>" alt="image">
        <div class="posters__top-wrapper">
            <div class="card-title">
                <?= $post['title'] ?>
            </div>
            <div class="card-subtitle">
                <a class="card-subtitle-text" title='<?= $post['title'] ?>' href='/post?id=<?= $post['post_id'] ?>'> 
                    <?= $post['subtitle'] ?>
                </a>
            </div>
            <div class="card-info">
                <div class="card-user">
                    <img src= "<?= $post['author_url']?>" alt="author image">
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
</div>