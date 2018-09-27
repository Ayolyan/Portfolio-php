<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
    </div>

    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <h2><?= $catName ?></h2>
        <?php
        foreach ($catItems as $catItem) {
            ?>
            <div class="galleryItem">
                <img src="" />
                <span>Réalisé le :</span>
            </div>
        <?php
        }
        ?>
    </div>
</div>