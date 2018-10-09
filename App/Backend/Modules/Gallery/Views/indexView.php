<div>
    <h2>GalleryItem</h2>

    <p>Il y a actuellement <?= $nbCPItems ?> items dans le portrait chinois.</p>

    <a href="galleryItem/insert">Ajouter un item</a>

    <table>
        <tr>
            <th>Image</th>
            <th>Debut</th>
            <th>Fin</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($listItem as $Item) {
            ?>
            <tr>
                <td><?= $Item['svgLink'] ?></td>
                <td><?= $Item['leftText'] ?></td>
                <td><?= $Item['rightText'] ?></td>
                <td>
                    <a href="chinesePortraitItem/modify/<?= $CPItem['id']?>">Modifier</a>
                    <a href="chinesePortraitItem/delete/<?= $CPItem['id']?>">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
<div>