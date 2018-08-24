<div class="contentSection">
    <div>

    </div>
    <div>

    </div>
</div>

<div class="contentSection">
    <div>

    </div>
    <div>
    <?php
    foreach ($listCPItems as $CPItem) {
    ?>
        <div class="chinesePortraitElement">
            <?php
                if (file_exists($CPItem["svgLink"])) {
                    file_get_contents($CPItem["svgLink"]);
                }
            ?>
            <div>
                <span><?= $CPItem["leftText"] ?></span>
                <span><?= $CPItem["rightText"] ?></span>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>