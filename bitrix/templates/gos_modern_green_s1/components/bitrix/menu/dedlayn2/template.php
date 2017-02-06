<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$count = -1;
$cnt_column = (int)count($arResult)/2;
?>

<div class="col col-mb-12 white-box normativnye-dokumenty-page">
    <h1> <?=$arParams["GROUP_PROPERTIES1"]?> </h1>

    <ul class="col col-dt-6 col-mb-12">
        <?foreach ($arResult as $arItem){
            $count++;
            if ($count < $cnt_column){
                if ($APPLICATION->GetCurPage() == $arResult[$count]["LINK"])
                {
                    ?><li><a href="#0"><i class="new-sprite-icon two-arrows"></i><?=$arResult[$count]["TEXT"]?></a></li><?
                } else
                {
                    ?><li><a href="<?=$arResult[$count]["LINK"]?>"><i class="new-sprite-icon two-arrows"></i><span><?=$arResult[$count]["TEXT"]?></span></a></li><?
                }
            }
            else
                break;
        }?>
    </ul>
    <?if ($count = $cnt_column-1){?>
        <ul class=" col col-dt-6 col-mb-12">
            <?foreach ($arResult as $arItem){
                $count++;
				if ($arResult[$count]["TEXT"] == '') continue;
                if ($APPLICATION->GetCurPage() == $arResult[$count]["LINK"])
                {
                    ?><li><a href="#0"><i class="new-sprite-icon two-arrows"></i><?=$arResult[$count]["TEXT"]?></a></li><?
                } else
                {
                    ?><li><a href="<?=$arResult[$count]["LINK"]?>"><i class="new-sprite-icon two-arrows"></i><span><?=$arResult[$count]["TEXT"]?></span></a></li><?
                }
				?>
                <? if ($count + 1 == count($arResult)){ break; }
            }?>
        </ul>
    <?}?>

</div>