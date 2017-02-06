<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/*variables section*/
$cnt = 0;
$flag = true;
$keys = 0;
$level = 'DEPTH_LEVEL';
/*variables section*/


foreach ($arResult as $index => $arItem) {
if ($flag == false) {
$flag = true;
continue;
}
if ($arItem[ $level ] == 1) {
    $cnt++;

    switch ($arItem["TEXT"]) {
        case 'ГОСУДАРСТВЕННЫЕ УСЛУГИ ДЛЯ ГРАЖДАН': /*эти 2 пункта меню являются ссылками*/
        case 'ИНФОРМАЦИЯ ПО ОБУЧЕНИЮ': {
            ?>
                <div class="col-mb-12 col-dt-2 w-100 tab">
                <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>">
                <label for="tab-<? echo $cnt ?>"><a href="<? echo $arItem["LINK"] ?>"><? echo $arItem["TEXT"] ?></a></label>
                <div class="content">
            <?php
            break;
        }
        default: {
            if ($arItem["TEXT"] == 'ДОКУМЕНТЫ')
                $keys = 1;
            ?>
                <div class="col-mb-12 col-dt-2 w-100 tab">

                <?if ($arItem["TEXT"] == 'ИНФОРМАЦИЯ О ТРУДОУСТРОЙСТВЕ'){?>
                    <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>" checked>
                <?} else {?>
                    <input type="radio" name="tabgroup" id="tab-<? echo $cnt ?>">
                <?}?>

                <label for="tab-<? echo $cnt ?>"><? echo $arItem["TEXT"] ?></label>
                <div class="content">
            <?php
            break;
        }
    }

}
elseif ($arItem[ $level ] == 2)
{
    $flag = true;
    if ($arResult[$index + 1][ $level ] == 2)
    {
        if ($keys == 1) /*если первый уровень - документы*/
        {
            if ($arResult[$index + 1]["TEXT"] == "О максимальной удалённости подходящей работы" or $arResult[$index + 1]["TEXT"] == 'Переезд, переселение')
            {
                ?>

                <div class="col col-dt-4 col-mb-12 w-100">
                    <a href="<? echo $arResult[$index]["LINK"] ?>">
                        <i class="new-sprite-icon two-arrows"></i>
                        <span>
                            <? echo $arResult[$index]["TEXT"] ?>
                        </span>
                    </a>
                </div>
                <div class="col col-dt-4 col-mb-12 w-100">
                    <a href="<? echo $arResult[$index + 1]["LINK"] ?>">
                        <i class="new-sprite-icon two-arrows"></i>
                        <span><? echo $arResult[$index + 1]["TEXT"] ?>
                        </span>
                    </a>
                </div>

                <?php
                $flag = false;
                if (($arResult[$index + 2][ $level ] == 1) or ($index + 1) > count($arResult))
                {
                    ?>
                        </div>
                        </div>
                    <?
                }
            }
            else
            {
                ?>

                <div class="col col-dt-4 col-mb-12 w-100">
                    <a href="<? echo $arResult[$index]["LINK"] ?>">
                        <i class="new-sprite-icon two-arrows"></i>
                        <span>
                            <? echo $arResult[$index]["TEXT"] ?>
                        </span>
                    </a>
                    <a href="<? echo $arResult[$index + 1]["LINK"] ?>">
                        <i class="new-sprite-icon two-arrows"></i>
                        <span>
                            <? echo $arResult[$index + 1]["TEXT"] ?>
                        </span>
                    </a>
                </div>

                <?php
                $flag = false;
                if (($arResult[$index + 2][ $level ] == 1) or ($index + 1) > count($arResult))
                {
                    ?>
                        </div>
                        </div>
                    <?
                }
            }
        }
        else /*обычные блоки - по 2 ссылке в блоке*/
        {
            ?>
            <div class="col col-dt-4 col-mb-12 w-100">

                <a href="<? echo $arResult[$index]["LINK"] ?>">
                    <i class="new-sprite-icon two-arrows"></i>
                    <span>
                        <? echo $arResult[$index]["TEXT"] ?>
                    </span>
                </a>

                <a href="<? echo $arResult[$index + 1]["LINK"] ?>">
                    <i class="new-sprite-icon two-arrows"></i>
                    <span>
                        <? echo $arResult[$index + 1]["TEXT"] ?>
                    </span>
                </a>

            </div>

            <?php
            $flag = false;
            if (
                ($arResult[$index + 2][ $level ] == 1) /*если элемент массива + 2 -> это первый уровень меню*/
                or
                ($index + 1) > count($arResult) /*или если выход за границы массива*/
            ) /*тогда закрываем текущие блоки*/
            {
                ?>
                    </div>
                    </div>
                <?
            }
        }
    }
    else {
        ?>

        <div class="col col-dt-4 col-mb-12 w-100">
            <a href="<? echo $arResult[$index]["LINK"] ?>">
                <i class="new-sprite-icon two-arrows"></i>
                <span>
                    <? echo $arResult[$index]["TEXT"] ?>
                </span>
            </a>
        </div>

        <?php
    }
}

if (($arResult[$index + 1][ $level ] == 1) or ($index + 1) > count($arResult))
{
    ?>
        </div>
        </div>
    <?
}
}?>




