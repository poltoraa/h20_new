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


<div class="col col-dt-12 bank-resume-main-page page">
    <h1 style="text-align: center;">Уважаемые посетители сайта!</h1>
    <br>
    <p style="text-align: center;">
        Наверное, каждого соискателя волнует вопрос, а какой же способ поиска работы является эффективным? <br>
        <br>
        На этот вопрос нет однозначного ответа, многое зависит от индивидуальной ситуации кандидата, его
        специальности, умений навыков. Если у Вас есть четкая цель найти себе новую работу, есть один очень
        эффективный способ, который предлагает Центр занятости населения города Новосибирска – «Банк резюме
        высококвалифицированных специалистов».<br>
        <br>
        «Банк резюме» — это специализированая единая база высококвалифицированных специалистов, которая формируется
        после тщательного отбора кандидатов. Регистрируйтесь на нашем сайте, оставляйте свое резюме, ведь это
        значимый шаг на пути поиска работы. <br>
        <br>
        <br>
    </p>
    <h3 style="text-align: center;">Уважаемые работодатели!</h3>
    <br>
    <p style="text-align: center;">
        Обращаем Ваше внимание на то, что уточнить информацию о кандидате Вы можете по телефону отдела содействия
        занятости населения по телефону: 266-39-40.
    </p>
    <br>
    <br>
    <b>
        <p style="text-align: center;">
            Услуги ГКУ НСО Центр занятости населения города Новосибирска оказываются бесплатно.
        </p>
    </b>
    <p>
    </p>


    <?
    $deadth = 0;
    $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => 31), false, Array(), Array("ACTIVE"));
    while ($ar = $res->GetNext()) {
        $count++;
        if ($ar["ACTIVE"] == 'N') $key = $key + 1;
    }
    if ($key == $count) $deadth = 1;
    ?>
    <div class="all-resume">
        <? if ($deadth == 1) {
            ?> В настоящее время нет резюме. Будь первым! <?
        } else {
            ?> Опубликовано <?= $count ?> резюме <?
        }
        ?>
    </div>


    <div class="col col-dt-10 col-dt-left-1 col-mb-12 two-buttons">
        <a href="/bank-resume/search-resumes/" class="fl-l button-resume" target="_blank">Найти резюме</a> <a
            href="/bank-resume/add-resume/" class="fl-r button-resume" target="_blank">Добавить резюме</a><br>
    </div>

    <? /*выборка резюме (catalog.section)*/ ?>
    <div class="ajax_catalog_wrap">
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "catalog1",
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
