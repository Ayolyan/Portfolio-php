<p>Il y a actuellement <?= $nbCPItems ?> items dans le portrait chinois.</p>

<a href="chinesePortraitItem/insert">Ajouter un item</a>

<table>
    <tr>
        <th>Image</th>
        <th>Debut</th>
        <th>Fin</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($listCPItems as $CPItem) {
        ?>
            <tr>
                <td><?= $CPItem['svgLink'] ?></td>
                <td><?= $CPItem['leftText'] ?></td>
                <td><?= $CPItem['rightText'] ?></td>
                <td>
                    <a href="chinesePortraitItem/modify/<?= $CPItem['id']?>">Modifier</a>
                    <a href="chinesePortraitItem/delete/<?= $CPItem['id']?>">Supprimer</a>
                </td>
            </tr>
        <?php
    }
    ?>
</table>