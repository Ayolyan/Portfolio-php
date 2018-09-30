<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="images/accueil.jpg" />
    </div>
    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <p>
            Enchanté ! Je m'appelle Yoan Bidet, j'ai 20 ans et je suis en deuxième année d'un DUT Métiers du Multimédia et de l'Internet (MMI) à l'IUT de Laval.
        </p>
        <a href="#skills"><button>Compétences</button></a>
        <a href="#chinesePortrait"><button>Portrait Chinois</button></a>
    </div>
</div>

<div class="contentSection" id="skills">
    <div>
        <img src="images/competences.jpg" />
    </div>
    <div class="">
        <h2>Mes Compétences</h2>
        <?php
        foreach ($listSkills as $name => $skills) {
            if (!empty($skills)) {
                echo '<section class="skillsSection"><h3>' . $name . '</h3>';
                foreach ($skills as $skill) {
                    ?>
                    <section>
                        <?php
                        if ($skill['progress'] != null && $skill['svgLink'] == null) {
                            ?>
                            <h4><?= $skill['name'] ?></h4>
                            <div class="progressBox">
                                <progress value="<?= $skill['progress'] ?>" max="100"><?= $skill['progress'] ?>%
                                </progress>
                                <span class="indicatorProgress"><?= $skill['progress'] ?>%</span>
                            </div>
                            <?php
                        } else if ($skill['svgLink'] != null){
                            ?>
                            <div class="skillItem">
                                <?php
                                if (file_exists(__DIR__ . '/../../../../../Web/' . $skill["svgLink"])) {
                                    include(__DIR__ . '/../../../../../Web/' . $skill["svgLink"]);
                                }
                                ?>
                                <h4><?= $skill['name'] ?></h4>
                            </div>
                                <?php
                        }
                        ?>
                    </section>
        <?php
                }
                echo '</section>';
            }
        }
        ?>
    </div>
</div>

<div class="contentSection" id="chinesePortrait">
    <div>
        <img src="images/pagodeChinoise.jpg" />
    </div>
    <div>
        <h2>Mon Portrait Chinois</h2>
    <?php
    foreach ($listCPItems as $CPItem) {
    ?>
        <div class="chinesePortraitElement">
            <?php
            if (file_exists(__DIR__ . '/../../../../../Web/' . $CPItem["svgLink"])) {
                include(__DIR__ . '/../../../../../Web/' . $CPItem["svgLink"]);
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