<?php
switch ($arItem["TEXT"]) {
    case 'ÃÎÑÓÄÀÐÑÒÂÅÍÍÛÅ ÓÑËÓÃÈ ÄËß ÃÐÀÆÄÀÍ': {
        ?>

        <div class="col-mb-12 col-dt-2 w-100 tab">
        <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>">
        <label for="tab-<? echo $cnt ?>"><a href="<? echo $arItem["LINK"] ?>"><? echo $arItem["TEXT"] ?></a></label>
        <div class="content">

        <?php
        break;
    }
case 'ÈÍÔÎÐÌÀÖÈß ÏÎ ÎÁÓ×ÅÍÈÞ': {
    ?>

    <div class="col-mb-12 col-dt-2 w-100 tab">
    <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>">
    <label for="tab-<? echo $cnt ?>"><a href="<? echo $arItem["LINK"] ?>"><? echo $arItem["TEXT"] ?></a></label>
    <div class="content">

    <?php
    break;
}
case 'ÈÍÔÎÐÌÀÖÈß Î ÒÐÓÄÎÓÑÒÐÎÉÑÒÂÅ': {
    ?>

    <div class="col-mb-12 col-dt-2 w-100 tab">
    <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>" checked>
    <label for="tab-<? echo $cnt ?>"><? echo $arItem["TEXT"] ?></label>
    <div class="content">

    <?
    break;
}
case 'ÄÎÊÓÌÅÍÒÛ': {
    ?>

    <div class="col-mb-12 col-dt-2 w-100 tab">
    <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>" checked>
    <label for="tab-<? echo $cnt ?>"><? echo $arItem["TEXT"] ?></label>
    <div class="content">

    <?
    $keys = 1;
    break;
}
    default: {
        ?>

        <div class="col-mb-12 col-dt-2 w-100 tab">
        <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>">
        <label for="tab-<? echo $cnt ?>"><? echo $arItem["TEXT"] ?></label>
        <div class="content">

        <?php
        break;
    }
}