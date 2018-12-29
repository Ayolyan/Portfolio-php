<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="<?= $item["mainImgLink"] ?>" alt="Illustration : <?= $item["name"] ?>" />
    </div>

    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <h2><?= $item["name"] ?></h2>
        <span class="creationDate"><?= $item["creationDate"]?></span>
        <section>
            <h3>Description</h3>
            <p>
                <?= $item["description"] ?>
            </p>
        </section>
        <?php
        if (isset($links) && $links != []) {
        ?>
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
        <?php
        }
        if (isset($medias) && $medias != []) {
        ?>
        <section>
            <h3>Illustrations</h3>
            <div class="imgGallery">
                <button><</button>
                <ul>
                    <?php
                    foreach ($medias as $media) {
                        ?>
                        <li>
                            <?php
                            if ($media['type'] == 'image') {
                                ?>
                                <img src="<?= $media["mediaLink"] ?>" alt="<?= $media["alt"] ?>"/>
                                <?php
                            }
                            if ($media['type'] == 'video') {
                                ?>
                                <div class="vod" data-vodid="<?= $media->getVideoId() ?>"></div>
                                <?php
                            }
                            ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <button>></button>
            </div>
        </section>
            <?php
        }
        ?>
    </div>
</div>
<script src="/js/itemGallery.js"></script>
