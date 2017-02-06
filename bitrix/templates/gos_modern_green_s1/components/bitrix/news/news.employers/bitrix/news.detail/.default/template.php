<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
CModule::IncludeModule('iblock');
$this->setFrameMode(true);
?>
<?
function FMbytes($size) {
    $size/=1024;
    $size/=1024;
    return $size;
}?>
<div class="news-detail">

    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
        <img
            class="detail_picture"
            border="0"
            src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
            width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>"
            height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>"
            alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
            title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"
        />
    <? endif ?>
    <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
        <span class="news-date-time"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></span>
    <? endif; ?>
    <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]) { ?>

        <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult["FIELDS"]["PREVIEW_TEXT"]): ?>
            <p><?= $arResult["FIELDS"]["PREVIEW_TEXT"];
                unset($arResult["FIELDS"]["PREVIEW_TEXT"]); ?></p>
        <? endif; ?>
        <? if ($arResult["NAV_RESULT"]): ?>
            <? if ($arParams["DISPLAY_TOP_PAGER"]): ?><?= $arResult["NAV_STRING"] ?><br/><? endif; ?>
            <? echo $arResult["NAV_TEXT"]; ?>
            <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?><br/><?= $arResult["NAV_STRING"] ?><? endif; ?>
        <? elseif (strlen($arResult["DETAIL_TEXT"]) > 0): ?>
            <? echo $arResult["DETAIL_TEXT"]; ?>
        <? else: ?>
            <? echo $arResult["PREVIEW_TEXT"]; ?>
        <? endif ?>
        <p style="text-align: center;"><br>
            <span style="color: #f16522; font-size: 18pt;">Все услуги предоставляются бесплатно!</span>
        </p>
        <?if (!empty($arResult["PROPERTIES"]["ATR_FILES"]["VALUE"])){?>
            <div class="col col-mb-left-1 col-mb-8">
                <h3>Прикреплённые файлы:</h3>
                <table class="table-doc">
                    <tr>
                        <th>Название</th>
                        <th>Размер</th>
                        <th>Файл</th>
                    </tr>

                    <?foreach ($arResult["PROPERTIES"]["ATR_FILES"]["VALUE"] as $i=>$arItem)
                    {
                        if(CModule::IncludeModule('iblock'))
                            $arFile = CFile::GetFileArray($arItem);
                        ?>
                        <tr>
                            <?if ($arResult["PROPERTIES"]["ATR_FILES"]["DESCRIPTION"][$i] != ''){?>
                                <td><?=$arResult["PROPERTIES"]["ATR_FILES"]["DESCRIPTION"][$i]?></td>
                            <?}else{?>
                                <td><?=$arFile["ORIGINAL_NAME"]?></td>
                            <?}?>
                            <td><?=round(FMbytes($arFile["FILE_SIZE"]),2)?> Мб.</td>
                            <td><a href="<?=$arFile["SRC"]?>">Скачать</a></td>
                        </tr>
                    <?}?>
                </table>
            </div>
        <?}?>

        <div style="clear:both"></div>
        <br/>
        <?foreach ($arResult["FIELDS"] as $code => $value):
            if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code) {
                ?><?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?
                if (!empty($value) && is_array($value)) {
                    ?><img border="0" src="<?= $value["SRC"] ?>" width="<?= $value["WIDTH"] ?>"
                           height="<?= $value["HEIGHT"] ?>"><?
                }
            } else {
                ?><?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?><?
            }
            ?><br/>
        <?endforeach;
        if (array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y") {
            ?>
            <div class="news-detail-share">
                <noindex>
                    <?
                    $APPLICATION->IncludeComponent("bitrix:main.share", "", array(
                        "HANDLERS" => $arParams["SHARE_HANDLERS"],
                        "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                        "PAGE_TITLE" => $arResult["~NAME"],
                        "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                        "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                        "HIDE" => $arParams["SHARE_HIDE"],
                    ),
                        $component,
                        array("HIDE_ICONS" => "Y")
                    );
                    ?>
                </noindex>
            </div>
            <?
        }
    } ?>





</div>
