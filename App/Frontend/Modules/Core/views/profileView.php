<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="images/profil.jpg" />
    </div>
    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <h2>Présentation</h2>
        <p>
            Enchanté !
        </p>
        <p>
            Je m'appelle Yoan Bidet, j'ai 20 ans et je suis étudiant en deuxième année de DUT Métiers du Multimédia et de l'Internet (MMI) à l'IUT de Laval.
        </p>
        <p>
            Passionné par le développement informatique, j'accrois mes compétences dans ce domaine, à travers des projets personnels ou liés à mes études.
        </p>
        <p>
            Un peu touche-à-tout, je m'intéresse également à la gestion de projet, au domaine de l'audiovisuel et plus particulièrement au domaine du son.
        </p>
        <p>
            Vous pouvez d'ailleurs retrouver mes réalisations dans <a href="/gallery">ma galerie</a>.
        </p>
        <div class="precision">
            <a href="/pdf/yoan_bidet_cv.pdf" class="skewSide">Consulter mon CV (PDF)</a>
            <h3>En savoir plus sur moi ?</h3>
            <div class="buttonRack">
                <a href="#skills">
                    <button class="skewSide">
                        Mes compétences
                        <svg width="100%" height="100%" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                            <g>
                                <path d="M192,326.343l-20.947,0l0,185.657l-122,0l0,-185.657l-21.053,0l0,-190l164,0l0,190Z"/><circle cx="110" cy="63" r="40"/><circle cx="444" cy="40" r="40"/><circle cx="444" cy="184" r="40"/><circle cx="444" cy="328" r="40"/><circle cx="444" cy="472" r="40"/><path d="M315.5,455l45,0l0,34l-45,0l0,-34Zm0,-432l0,466l-35,0l0,-216l-45,0l0,-34l45,0l0,-216l35,0Zm0,288l45,0l0,34l-45,0l0,-34Zm0,-144l45,0l0,34l-45,0l0,-34Zm0,-144l45,0l0,34l-45,0l0,-34Z"/>
                            </g>
                        </svg>
                    </button>
                </a>
                <a href="#chinesePortrait">
                    <button class="skewSide">
                        Mon portrait chinois
                        <svg width="100%" height="100%" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                            <g>
                                <path d="M255.048,242.252c0.315,-0.022 0.632,-0.032 0.952,-0.032c66.78,0 121.11,-54.33 121.11,-121.108c0,-66.781 -54.33,-121.111 -121.11,-121.111c-141.16,0 -256,114.842 -256,256c0,99.68 57.272,186.228 140.634,228.489c-20.788,-25.573 -33.268,-58.156 -33.268,-93.604c0,-81.638 66.164,-148.115 147.682,-148.634Zm4.833,-157.766c21.016,0 38.054,17.036 38.054,38.054c0,21.016 -17.039,38.054 -38.054,38.054c-21.016,0 -38.054,-17.037 -38.054,-38.054c0.001,-21.018 17.038,-38.054 38.054,-38.054Z" style="fill-rule:nonzero;"/><path d="M371.376,27.518c20.784,25.572 33.26,58.15 33.26,93.593c0,81.637 -66.165,148.113 -147.683,148.631c-0.315,0.022 -0.632,0.032 -0.952,0.032c-66.78,0 -121.108,54.331 -121.108,121.111c0,66.78 54.329,121.108 121.107,121.108c0.036,0 0.07,0.006 0.106,0.006c141.11,-0.058 255.894,-114.875 255.894,-255.999c0,-99.675 -57.268,-186.219 -140.624,-228.482Zm-111.495,402.237c-21.016,0 -38.054,-17.037 -38.054,-38.054c0,-21.017 17.037,-38.052 38.054,-38.052c21.016,0 38.054,17.036 38.054,38.052c0,21.016 -17.038,38.054 -38.054,38.054Z" style="fill-rule:nonzero;"/>
                            </g>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
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