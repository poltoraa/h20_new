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
CModule::IncludeModule("iblock");
$this->setFrameMode(true); ?>


<div class="col col-dt-12 bank-resume-page page">

    <? if ($arParams["USE_FILTER"] == "Y"): ?>
        <?
        if (CModule::IncludeModule("iblock")) {
            $arFilter = array(
                "ACTIVE" => "Y",
                "GLOBAL_ACTIVE" => "Y",
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            );
            if (strlen($arResult["VARIABLES"]["SECTION_CODE"]) > 0) {
                $arFilter["CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
            } elseif ($arResult["VARIABLES"]["SECTION_ID"] > 0) {
                $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
            }

            $obCache = new CPHPCache;
            if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog")) {
                $arCurSection = $obCache->GetVars();
            } else {
                $arCurSection = array();
                $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));
                $dbRes = new CIBlockResult($dbRes);

                if (defined("BX_COMP_MANAGED_CACHE")) {
                    global $CACHE_MANAGER;
                    $CACHE_MANAGER->StartTagCache("/iblock/catalog");

                    if ($arCurSection = $dbRes->GetNext()) {
                        $CACHE_MANAGER->RegisterTag("iblock_id_" . $arParams["IBLOCK_ID"]);
                    }
                    $CACHE_MANAGER->EndTagCache();
                } else {
                    if (!$arCurSection = $dbRes->GetNext())
                        $arCurSection = array();
                }

                $obCache->EndDataCache($arCurSection);
            }
            ?>
            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.smart.filter",
                "verybeautifulsmartfiler",
                array(
                    "IBLOCK_TYPE" => "Bank",
                    "IBLOCK_ID" => "31",
                    "SECTION_ID" => $arCurSection["ID"],
                    "FILTER_NAME" => "arrFilter",
                    "PRICE_CODE" => $arParams["PRICE_CODE"],
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_GROUPS" => "Y",
                    "SAVE_IN_SESSION" => "N",
                    "COMPONENT_TEMPLATE" => "verybeautifulsmartfiler",
                    "SECTION_CODE" => "",
                    "TEMPLATE_THEME" => "blue",
                    "FILTER_VIEW_MODE" => "vertical",
                    "POPUP_POSITION" => "left",
                    "DISPLAY_ELEMENT_COUNT" => "Y",
                    "SEF_MODE" => "N",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "XML_EXPORT" => "N",
                    "SECTION_TITLE" => "-",
                    "SECTION_DESCRIPTION" => "-"
                ),
                false
            ); ?>
            <?
        }
        ?>
        <br/>
    <? endif ?>

    <? /*Проверка для блока "Количество резюме"*/ ?>
    <?
    $deadth = 0;
    $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => 31), false, Array(), Array("ACTIVE"));
    while ($ar = $res->GetNext()) {
        $count++;
        if ($ar["ACTIVE"] == 'N') $key = $key + 1;
    }
    if ($key == $count) $deadth = 1;
    ?>
    <? /*Проверка для блока "Количество резюме"*/ ?>

    <? /*Хлебные крошки*/ ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "bread_crumbs_bank_left",
        array(
            "PATH" => "",
            "SITE_ID" => "s1",
            "START_FROM" => "0",
            "COMPONENT_TEMPLATE" => "bread_crumbs_bank_left"
        ),
        false
    ); ?>
    <? /*Хлебные крошки*/ ?>

    <?/* $APPLICATION->AddBufferContent("\\Bitrix\\GosSite\\Layout::printWrapper", "header"); */?>


    <? /* Если мы НЕ находимся на главной */ ?>
    <? if ($APPLICATION->GetCurPage(false) !== '/'):
        ?><h1 class="col col-mb-9 "><?= $APPLICATION->ShowTitle(false); ?></h1><?
    endif; ?>
    <? /* Если мы НЕ находимся на главной */ ?>
    <p style="text-align: center; margin-bottom: 30px;">
        УВАЖАЕМЫЕ РАБОТОДАТЕЛИ! <br>
        Обращаем Ваше внимание на то, что уточнить информацию  (получить доступ к резюме
        кандидатов) Вы можете у  инспектора  отдела содействия занятости населения
        обратившись по телефону: 266-39-40.
    </p>
    <div class="col col-mb-9">
        <? /*Строка поиска*/ ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.search",
            "",
            Array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
                "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
                "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
                "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
                "OFFERS_FIELD_CODE" => $arParams["OFFERS_FIELD_CODE"],
                "OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
                "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                "OFFERS_LIMIT" => $arParams["OFFERS_LIMIT"],
                "SECTION_URL" => $arParams["SECTION_URL"],
                "DETAIL_URL" => $arParams["DETAIL_URL"],
                "BASKET_URL" => $arParams["BASKET_URL"],
                "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "DISPLAY_COMPARE" => $arParams["DISPLAY_COMPARE"],
                "PRICE_CODE" => $arParams["PRICE_CODE"],
                "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
                "USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
                "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
                "CURRENCY_ID" => $arParams["CURRENCY_ID"],
                'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                "FILTER_NAME" => "searchFilter",
                "SECTION_ID" => "",
                "SECTION_CODE" => "",
                "SECTION_USER_FIELDS" => array(),
                "INCLUDE_SUBSECTIONS" => "Y",
                "SHOW_ALL_WO_SECTION" => "Y",
                "META_KEYWORDS" => "",
                "META_DESCRIPTION" => "",
                "BROWSER_TITLE" => "",
                "ADD_SECTIONS_CHAIN" => "N",
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",

                "RESTART" => "N",
                "NO_WORD_LOGIC" => "Y",
                "USE_LANGUAGE_GUESS" => "Y",
                "CHECK_DATES" => "Y",
            ),
            $component
        ); ?>
        <? /*Строка поиска*/ ?>
    </div>

    <? /*форма "Добавить" и количество резюме*/ ?>
    <div class="col col-dt-9">
        <div class="all-resume">
            <? if ($deadth == 1) {
                ?>
                В настоящее время нет резюме. Будь первым!
                <?
            } else {
                ?>
                Опубликовано <?= $count ?> резюме
                <?
            }
            ?>
        </div>

        <div class="add-resume">
            <a href="/bank-resume/add-resume/">Добавить резюме <i class="new-sprite-icon new-arrow-right"></i></a>
        </div>

    </div>
    <? /*форма "Добавить" и количество резюме*/ ?>

    <? /*выборка резюме (catalog.section)*/ ?>
    <div class="ajax_catalog_wrap">
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "catalog",
            Array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
                "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
                "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
                "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
                "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
                "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
                "BASKET_URL" => $arParams["BASKET_URL"],
                "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                "FILTER_NAME" => $arParams["FILTER_NAME"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "SET_TITLE" => $arParams["SET_TITLE"],
                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
                "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
                "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                "PRICE_CODE" => $arParams["PRICE_CODE"],
                "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

                "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
                "QUANTITY_FLOAT" => $arParams["QUANTITY_FLOAT"],
                "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

                "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

                "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
                "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
                "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

                "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
                'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
            ),
            $component
        ); ?>
    </div>
    <? /*выборка резюме (catalog.section)*/ ?>
</div>


<script type="text/javascript">
    $(document).on('submit', 'form.smartfilter', function (e) {
        console.log('submit filter222');
        e.preventDefault();
        $('div.ajax_catalog_wrap').addClass('ajax-loading');
        $(this).bitrixAjax(
            "<?=$arResult['AJAX_ID']?>",
            function (data) {
                //$('div.ajax_catalog_wrap').removeClass('ajax-loading');
                $('div.ajax_catalog_wrap').html(data.find('div.ajax_catalog_wrap').html());
                //$(document).updateStyle();
            },
            {
                get: {
                    set_filter: 'y'
                }
            }
        );
    });

</script>
