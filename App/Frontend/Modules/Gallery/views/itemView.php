<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="<?= $item["mainImgLink"] ?>"/>
    </div>

    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <h2><?= $item["name"] ?></h2>
        <span><?= $item["creationDate"]?></span>
        <section>
            <h3>Description</h3>
            <p>
                <?= $item["description"] ?>
            </p>
        </section>
        <section>
            <h3>Liens</h3>
        </section>
        <section>
            <h3>Illustrations</h3>
            <div class="imgGallery">

            </div>
        </section>
    </div>
</div>
