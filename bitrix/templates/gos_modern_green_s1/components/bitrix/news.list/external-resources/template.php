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
<? if (($itemsCount = count($arResult["ITEMS"])) > 0) { ?>
<div class="white-box padding-box">
    <div class="h2 mt0">Сторонние ресурсы</div>
    <div class="link-list-block">
        <ul class="link-list clearfix">
            <? foreach ($arResult["ITEMS"] as $arItem) { ?>
                <?
                $this->AddEditAction($arResult["ITEMS"][$i]['ID'], $arResult["ITEMS"][$i]['EDIT_LINK'], CIBlock::GetArrayByID($arResult["ITEMS"][$i]["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arResult["ITEMS"][$i]['ID'], $arResult["ITEMS"][$i]['DELETE_LINK'], CIBlock::GetArrayByID($arResult["ITEMS"][$i]["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <li class="col-mb-12 col-dt-6 col-ld-4 equal" id="<?=$this->GetEditAreaId($arResult["ITEMS"][$i]['ID']);?>">
                    <a target="_blank" href="<?echo $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>">
                        <? if (is_array($arItem["PREVIEW_PICTURE"])) { ?>
                            <img
                                src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                            />
                        <? } ?>
                        <span class="link-list-text"><?echo $arItem["NAME"]?></span>
                    </a>
                </li>
            <? } ?>
        </ul>
    </div>
</div>
<? } ?>