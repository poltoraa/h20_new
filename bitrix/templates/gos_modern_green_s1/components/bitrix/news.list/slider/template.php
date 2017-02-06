<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<? if (count($arResult["ITEMS"]) > 0) { ?>
    <div class="container">
        <div class="big-slider" data-owl-loop="y" data-owl-autoplay="y" data-owl-autoplay-timeout="8">
        <? foreach($arResult["ITEMS"] as $arItem) { ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="slider-item" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="content">
                    <div class="col col-mb-12 col-7 col-dt-5">
                        <div class="slider-item-text">
                            <div class="h1"><?echo $arItem["NAME"]?></div>
                            <div class="mb-hide slider-item-description"><?echo $arItem["PREVIEW_TEXT"]?></div>
                            <div class="big-slider-nav mb-hide"></div>
                        </div>
                    </div>
                </div>
            </div>
        <? } ?>

        </div>
    </div>
<? } ?>