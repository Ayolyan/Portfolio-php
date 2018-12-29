<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="images/gallery.jpg" alt="Galerie d'images" />
    </div>

    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <ul class="catSelector">
            <li class="catSelected">Tous</li>
            <?php
            foreach ($cats as $cat) {
                ?>
                <li data-slug="<?= $cat["slug"] ?>"><?= $cat["name"] ?></li>
                <?php
            }
            ?>
        </ul>
        <div class="itemsGallery">
            <?php
            foreach ($mixedItems as $item) {
                ?>
                <a href="/gallery/item-<?= $item["id"] ?>" data-cat="<?= mb_strtolower($item["cats"]) ?>">
                    <div>
                        <div class="imgContainer <?= strtolower($item["cats"]) ?>">
                            <img src="<?= $item["miniatureImgLink"] ?>" alt="Miniature de : <?= $item["name"]?>" />
                        </div>
                        <h4><?= $item["name"] ?></h4>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script src="/js/gallery.js"></script>