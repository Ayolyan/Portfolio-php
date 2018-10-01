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
            <ul class="itemUl">
                <?php
                foreach ($links as $link) {
                ?>
                    <li>
                        <?php
                        if ($link["iconLink"] != null && file_exists(__DIR__ . '/../../../../../Web/' . $skill["svgLink"])) {
                            include(__DIR__ . '/../../../../../Web/' . $skill["svgLink"]);
                        } else {
                            include(__DIR__ . '/../../../../../Web/images/svgs/linkIcon.svg');
                        }
                        ?>
                        <a href="<?= $link["link"] ?>"><?= $link["name"]?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </section>
        <section>
            <h3>Illustrations</h3>
            <ul class="imgGallery">
<!--                --><?php
//                foreach ($imgs as $img) {
//                    ?>
                    <li><img src="<?= $imgs[0]["imgLink"] ?>" /></li>
<!--                --><?php
//                }
//                ?>
            </ul>
        </section>
    </div>
</div>
