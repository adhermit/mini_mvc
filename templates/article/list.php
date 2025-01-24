<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<h1> Article: <?php
                foreach ($articles as $article) {
                    echo $article->getTitle();
                }
                ?>
</h1>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>