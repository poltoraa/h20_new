<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetTitle("Работодатели");
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
echo $arResult['DESCRIPTION'];
?>
<div class="col col-mb-12 page normativnye-dokumenty-page">
	<div class="col col-mb-12 white-box">
		<h1><?=$arResult["NAME"]?></h1>

        <?
        $num_of_items = count($arResult["ITEMS"]);
        $num_half = ceil($num_of_items/2);
        $count = 0;?>
        <ul class="col col-dt-6 col-mb-12">
        <?foreach($arResult["ITEMS"] as $arItem){
            $count++;
        if ($arItem["NAME"] == "Мероприятия службы занятости")
        {
            ?>
            <li><a href="/employers/meropriyatiya-sluzhby-zanyatosti/"><i class="new-sprite-icon two-arrows"></i><span>Мероприятия службы занятости</span></a></li>
            <?if($count==$num_half){?>
                </ul>
                <ul class="col col-dt-6 col-mb-12">
            <?}?>
            <?
            continue;
        }elseif ($arItem["NAME"] == "Программы содействия в трудоустройстве")
            {
            ?>
                <li><a href="/employers/programmy-sodeystviya/"><i class="new-sprite-icon two-arrows"></i><span>Программы содействия в трудоустройстве</span></a></li>
                <?if($count==$num_half){?>
                    </ul>
                    <ul class="col col-dt-6 col-mb-12">
                <?}?>
            <?
            continue;
            }
        ?>
            <li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><i class="new-sprite-icon two-arrows"></i><span><?=$arItem["NAME"]?></span></a></li>
            <?if($count==$num_half){?>
                </ul>
                <ul class="col col-dt-6 col-mb-12">
            <?}?>
        <?}?>
        </ul>


	</div>
</div>