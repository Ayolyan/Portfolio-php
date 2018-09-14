<div class="contentSection">
    <div>
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
    </div>
    <div>
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
    </div>
</div>

<div class="contentSection">
    <div>

    </div>
    <div>
        <h2>Mes Compétences</h2>
        <?php
        foreach ($listSkills as $name => $skills) {
            if (!empty($skills)) {
                echo '<section><h3>' . $name . '</h3>';
                foreach ($skills as $skill) {
                    ?>
                    <section>
                        <h4><?= $skill['name'] ?></h4>
                        <div>
                            <progress value="<?=$skill['progress']?>" max="100"><?=$skill['progress']?>%</progress>
                            <span class="indicatorProgress"><?=$skill['progress']?>%</span>
                        </div>
                    </section>
        <?php
                }
                echo '</section>';
            }
        }
        ?>
    </div>
</div>

<div class="contentSection">
    <div>

    </div>
    <div>
        <h2>Mon Portrait Chinois</h2>
    <?php
    foreach ($listCPItems as $CPItem) {
    ?>
        <div class="chinesePortraitElement">
            <?php
                if (file_exists(__DIR__ . '/../../../../../Web' . $CPItem["svgLink"])) {

                    include(__DIR__ . '/../../../../../Web' . $CPItem["svgLink"]);
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