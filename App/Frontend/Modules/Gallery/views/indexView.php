<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="images/gallery.jpg" alt="Galerie d'image" />
    </div>

    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <ul class="catSelector">
            <li class="catSelected">Tous</li>
            <li>Audio</li>
            <li>Vidéo</li>
            <li>Infographie</li>
            <li>Programmation</li>
        </ul>
        <div class="itemsGallery">
            <?php
            foreach ($mixedItems as $item) {
                ?>
                <a href="/gallery/item-<?= $item["id"] ?>" data-cat="<?= strtolower($item["cats"]) ?>">
                    <div>
                        <div class="imgContainer <?= strtolower($item["cats"]) ?>">
                            <img src="<?= $item["miniatureImgLink"] ?>"/>
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