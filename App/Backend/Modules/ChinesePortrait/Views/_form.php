<form action="" method="post">
    <label>SvgLink</label>
    <input type="text" name="svgLink" value="<?= isset($cpItem) ? $cpItem['svgLink'] : '' ?>"/>

    <label for="leftText">Début</label>
    <input type="text" name="leftText" value="<?= isset($cpItem) ? $cpItem['leftText'] : '' ?>"/>

    <label for="rightText">Fin</label>
    <input type="text" name="rightText" value="<?= isset($cpItem) ? $cpItem['rightText'] : '' ?>"/>
    <?php
    if (isset($cpItem) && !$cpItem->isNew()) {
        ?>
        <input type="hidden" name="id" value="<?= $cpItem['id'] ?>"/>
        <input type="submit" value="Modifier" name="modify">
    <?php
    } else {
        ?>
        <input type="submit" value="Ajouter"/>
    <?php
    }
    ?>
</form>