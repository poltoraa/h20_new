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
<? /*
    <div class="double-header-block clearfix col-margin-bottom" style="margin-left:0px;">
        <h2 class="double-header"><?=GetMessage("NEW_TITLE");?></h2>
        <div class="double-header-link"><a href="<?echo $arResult["ITEMS"][0]["LIST_PAGE_URL"]?>"><?=GetMessage("NEW_LIST");?><i class="icon icon-arrow-right"></i></a></div>
    </div>
*/?>
        <div class="col col-mb-12 col-12 col-dt-<?echo $itemsCount == 1 ? "12" : "12"?>">
            <div class="padding-box col-margin-bottom equal" style="height: 524px;padding: 0px;">
            <? foreach ($arResult['ITEMS'] as $item){?>
                <?
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="news-item news-item-main" id="<?=$this->GetEditAreaId($item['ID']);?>">
                    <div class="news-item-image">
                        <h3 class="h2 mb-block"><a href="<?echo $item["DETAIL_PAGE_URL"]?>"><?echo $item["NAME"]?></a></h3>
                        <? if (is_array($item["DETAIL_PICTURE"])) { ?>
                            <div class="big-image-col">
                                <a href="<?echo $item["DETAIL_PAGE_URL"]?>">
                                    <img
                                        src="<?=$item["DETAIL_PICTURE"]["SRC"]?>"
                                        alt="<?=$item["DETAIL_PICTURE"]["ALT"]?>"
                                        title="<?=$item["DETAIL_PICTURE"]["TITLE"]?>"
                                        style="height:205px;"
                                    />
                                </a>
                            </div>
                        <? } ?>
                    </div> <!-- .news-item-image -->
                    <div class="news-item-date"><?echo $item["DISPLAY_ACTIVE_FROM"]?></div>
                    <div class="news-item-text">
                        <?echo $item["PREVIEW_TEXT"]?>
                    </div> <!-- .news-item-text -->

                </div> <!-- .news-item news-item-main -->
        <? }?>
            </div>
        </div> <!-- .col col-mb-12 col-12 col-dt-6 -->

<? } ?>