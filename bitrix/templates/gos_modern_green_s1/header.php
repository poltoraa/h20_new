<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?

    Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/bottom-main-slider/slick/slick.css");
    Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/bottom-main-slider/slick/slick-theme.css");
    Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/special_version.css");
    Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fancyboxstyles/jquery.fancybox.css?v=2.1.5");
    Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fancyboxstyles/style.css");


    //$APPLICATION->AddHeadScript("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/leftSlider/script.js");
    //Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/-jquery.min.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/js.cookie.min.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.formstyler.min.js");

    /*для ajax в фильтре*/
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.bitrix.ajax.js");
    /*для ajax в фильтре*/

    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.matchHeight-min.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.mobileNav.min.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.tabsToSelect.min.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/owl.carousel.min.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/perfect-scrollbar.jquery.min.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/responsive-tables.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/bottom-main-slider/slick/slick.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/special_version.js");
    //    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/fancybox/query.fancybox.pack.js");
    Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/fancybox/script.js");


    ?>
    <script src="<?= SITE_TEMPLATE_PATH ?>/slider/js/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/slider/css/styles.css"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/slider/css/iview.css"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/slider/css/skin_1/style.css"/>
    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/slider/js/raphael-min.js"></script>
    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/slider/js/jquery.easing.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/slider/js/iview.js"></script>

    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>


    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png"/>
</head>

<? $APPLICATION->ShowHead(); ?>


<body>

<div class="mb-hide"><? $APPLICATION->ShowPanel(); ?></div>

<?
$GLOBALS["IS_HOME"] = $APPLICATION->GetCurPage(true) === SITE_DIR . "index.php";

if (!IsModuleInstalled("bitrix.gossite")) {
    echo "<div class=\"alert alert-error m50\">Для корректной работы сайта необходим модуль \"1С-Битрикс: Официальный сайт государственной организации\"</div>";
}
?>


<div class="col-12 tablet-hide mb-hide" id="popup">
    <div class="content">
        <div>
            <p>Внимание! Запущена новая версия нашего сайта. Сайт работает в тестовом режиме, приносим извинения за
                временные неудобства.</p>
        </div>
        <div>
            <a href="#" id="popup__close">x</a>
        </div>
    </div>
</div>

<div class="body-wrapper clearfix">

    <div class="special-settings">
        <div class="container special-panel-container">
            <div class="content">
                <div class="aa-block aaFontsize">
                    <div class="fl-l">Размер:</div>
                    <a class="aaFontsize-small" data-aa-fontsize="small" href="#"
                       title="Уменьшенный размер шрифта">A</a>
                    <a class="aaFontsize-normal a-current" href="#" data-aa-fontsize="normal"
                       title="Нормальный размер шрифта">A</a>
                    <a class="aaFontsize-big" data-aa-fontsize="big" href="#" title="Увеличенный размер шрифта">A</a>
                </div>
                <div class="aa-block aaColor">
                    Цвет:
                    <a class="aaColor-black a-current" data-aa-color="black" href="#"
                       title="Черным по белому"><span>C</span></a>
                    <a class="aaColor-yellow" data-aa-color="yellow" href="#"
                       title="Желтым по черному"><span>C</span></a>
                    <a class="aaColor-blue" data-aa-color="blue" href="#" title="Синим по голубому"><span>C</span></a>
                </div>

                <div class="aa-block aaImage">
                    Изображения
				<span class="aaImage-wrapper">
					<a class="aaImage-on a-current" data-aa-image="on" href="#">Вкл.</a>
					 <a class="aaImage-off" data-aa-image="off" href="#">Выкл.</a>
				</span>
                </div>
                <span class="aa-block"><a href="/?set-aa=normal" data-aa-off><i class="icon icon-special-version"></i>
                        Обычная версия сайта</a></span>
            </div>
        </div> <!-- .container special-panel-container -->
    </div> <!-- .special-settings -->

    <script>
        function showHam() {
            if ($(".top-menu").hasClass("show"))
                $(".top-menu").removeClass("show");
            else
                $(".top-menu").addClass("show");
        }
    </script>

    <script>
        $("#popup__close").click(function () {
            $("#popup").hide(500, function () {
            });
        });

    </script>

    <script data-skip-moving="true">
        function loadFont(t, e, n, o) {
            function a() {
                if (!window.FontFace)return !1;
                var t = new FontFace("t", 'url("data:application/font-woff2,") format("woff2")', {}), e = t.load();
                try {
                    e.then(null, function () {
                    })
                } catch (n) {
                }
                return "loading" === t.status
            }

            var r = navigator.userAgent, s = !window.addEventListener || r.match(/(Android (2|3|4.0|4.1|4.2|4.3))|(Opera (Mini|Mobi))/) && !r.match(/Chrome/);
            if (!s) {
                var i = {};
                try {
                    i = localStorage || {}
                } catch (c) {
                }
                var d = "x-font-" + t, l = d + "url", u = d + "css", f = i[l], h = i[u], p = document.createElement("style");
                if (p.rel = "stylesheet", document.head.appendChild(p), !h || f !== e && f !== n) {
                    var w = n && a() ? n : e, m = new XMLHttpRequest;
                    m.open("GET", w), m.onload = function () {
                        m.status >= 200 && m.status < 400 && (i[l] = w, i[u] = m.responseText, o || (p.textContent = m.responseText))
                    }, m.send()
                } else p.textContent = h
            }
        }

        loadFont('OpenSans', '<?=SITE_TEMPLATE_PATH?>/opensans.css', '<?=SITE_TEMPLATE_PATH?>/opensans-woff2.css');
    </script>

    <header>

        <div class="container container-white">
            <div class="content">
                <div class="col col-mb-12 col-8 logo-wrapper">

                    <a href="/" class="logotip">
                        <div class="col col-mb-12 col-6">
                            <img class="logo-image" src="<?= SITE_TEMPLATE_PATH ?>/images/logo.png"
                                 alt="Государственная служба занятости"/>
                        </div>
                        <div class="col mb-hide col-mb-12 col-6 logo-text-wrapper">
                            <img class="logo-text" src="<?= SITE_TEMPLATE_PATH ?>/images/logo-name.png">
                        </div>
                    </a>
                    <a href="/" class="logotip mb-block">
                        <div class="col col-mb-12 col-6">
                            <img class="logo-text" src="<?= SITE_TEMPLATE_PATH ?>/images/logo-name.png">
                        </div>
                    </a>

                </div>

                <div class="col col-mb-1 mb-block my-hamburger"
                     style=" width: 30px; height: 30px; background-color: #0d3e26; z-index: 1;padding: 2px 5px;"
                     onclick="showHam()">
                    <span class="icon-hamburger"></span>
                </div>

                <div class="col col-mb-11 col-4 right-header-wrapper">
                    <div class="search-block fl-r col-mb-4 col-12">
                        <div class="search-button"><i class="icon icon-search"></i> <span
                                class="search-text">ПОИСК</span></div>

                        <? $APPLICATION->IncludeComponent("bitrix:search.title", "modern_search", Array(
                            "SHOW_INPUT" => "Y",
                            "INPUT_ID" => "title-search-input",
                            "CONTAINER_ID" => "searchTitle",
                            "PAGE" => "/search/index.php",
                            "NUM_CATEGORIES" => "1",
                            "TOP_COUNT" => "5",
                            "ORDER" => "date",
                            "USE_LANGUAGE_GUESS" => "Y",
                            "CHECK_DATES" => "N",
                            "SHOW_OTHERS" => "N",
                            "CATEGORY_0_TITLE" => "Результаты:",
                            "CATEGORY_0" => array(
                                0 => "no",
                            )
                        ),
                            false
                        ); ?>

                    </div>

                    <div class="col-mb-8 col-12 fl-r version-visuality">
                        <a href="/?set-aa=special" data-aa-on><span
                                class="green-text">Версия для слабовидящих</span></a>
                    </div>

                    <div class="adress-text col-dt-12 green-text col-mb-hide">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/includes/top-phone-desc.php"
                            ),
                            false
                        ); ?>

                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/includes/top-phone.php"
                            ),
                            false
                        ); ?>
                    </div>

                </div>
            </div>

            <div class="container container-top-navigation">
                <div class="content">
                    <div class="col col-12">
                        <div class="top-nav-block">

                            <? $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "header_top_menu",
                                array(
                                    "COMPONENT_TEMPLATE" => "header_top_menu",
                                    "ROOT_MENU_TYPE" => "top",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_USE_GROUPS" => "N",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MAX_LEVEL" => "2",
                                    "CHILD_MENU_TYPE" => "about",
                                    "USE_EXT" => "N",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "N"
                                ),
                                false
                            ); ?>

                        </div>
                    </div>
                </div>
            </div>


    </header>

    <div class="col col-mb-1 tablet-block my-hamburger"
         style=" width: 30px; height: 30px; background-color: #0d3e26; z-index: 4;padding: 2px 5px;"
         onclick="showHam()">
        <span class="icon-hamburger"></span>
    </div>

    <div class="container container-main">

        <div class="content white-box">
            <div class="clearfix">
                <?
                global $APPLICATION;
                $dir = $APPLICATION->GetCurDir();
                $pieces = explode("/", $dir);
                ?>

                <? if ($pieces[1] == 'bank-resume') {

                if ($APPLICATION->GetCurPage(false) === '/bank-resume/search-resumes/')
                {
                ?>
                <div class="col col-mb-12 col-dt-12 col-12 m-c" style="padding-top: 7px;">
                    <?
                    }
                    else
                    {
                    ?>
                    <div class="col col-mb-12 col-dt-12 col-12 m-c" style="padding-top: 18px;">

                        <? /*Хлебные крошки*/ ?>

                        <? $APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "bread_crumbs_bank_1",
                            array(
                                "PATH" => "",
                                "SITE_ID" => "s1",
                                "START_FROM" => "0",
                                "COMPONENT_TEMPLATE" => "bread_crumbs_bank_1"
                            ),
                            false
                        ); ?>

                        <? /*Хлебные крошки*/ ?>

<!--                        --><?// $APPLICATION->AddBufferContent("\\Bitrix\\GosSite\\Layout::printWrapper", "header"); ?>

                        <?
                        } ?>


                        <?
                        }

                        else
                        {
                        ?>
                        <? if ($APPLICATION->GetCurPage(false) === '/gosudarstvennye-uslugi/')
                        {
                        ?>

                        <div class="col col-mb-12 col-2 col-margin-bottom left-side-bar">

                            <? /*Левое меню*/ ?>
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "header_left_menu",
                                array(
                                    "COMPONENT_TEMPLATE" => "header_left_menu",
                                    "ROOT_MENU_TYPE" => "left",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_USE_GROUPS" => "N",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MAX_LEVEL" => "2",
                                    "CHILD_MENU_TYPE" => "left",
                                    "USE_EXT" => "Y",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "N"
                                ),
                                false
                            ); ?>
                            <? /*Левое меню*/ ?>


                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "COMPOSITE_FRAME_MODE" => "A",
                                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/includes/left_inc_podmenu.php"
                                )
                            );?>

                            <div class="mb-hide tablet-hide" style="margin-left: 10px;">
                                <div class="col col-mb-12 ">
                                    <a href="/bank-resume/" class="bank-resume"></a>
                                </div>

                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/includes/left_inc_bank.php"
                                    )
                                );?>

                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:news.list",
                                    "header_vacancies_slider",
                                    array(
                                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                        "ADD_SECTIONS_CHAIN" => "N",
                                        "AJAX_MODE" => "N",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "Y",
                                        "CACHE_FILTER" => "N",
                                        "CACHE_GROUPS" => "Y",
                                        "CACHE_TIME" => "36000000",
                                        "CACHE_TYPE" => "A",
                                        "CHECK_DATES" => "Y",
                                        "DETAIL_URL" => "/about/vacancies/job/#ELEMENT_ID#",
                                        "DISPLAY_BOTTOM_PAGER" => "Y",
                                        "DISPLAY_DATE" => "Y",
                                        "DISPLAY_NAME" => "Y",
                                        "DISPLAY_PICTURE" => "Y",
                                        "DISPLAY_PREVIEW_TEXT" => "Y",
                                        "DISPLAY_TOP_PAGER" => "N",
                                        "FIELD_CODE" => array(
                                            0 => "",
                                            1 => "",
                                        ),
                                        "FILTER_NAME" => "",
                                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                        "IBLOCK_ID" => "18",
                                        "IBLOCK_TYPE" => "vacancies",
                                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                        "INCLUDE_SUBSECTIONS" => "Y",
                                        "MESSAGE_404" => "",
                                        "NEWS_COUNT" => "20",
                                        "PAGER_BASE_LINK_ENABLE" => "N",
                                        "PAGER_DESC_NUMBERING" => "N",
                                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                        "PAGER_SHOW_ALL" => "N",
                                        "PAGER_SHOW_ALWAYS" => "N",
                                        "PAGER_TEMPLATE" => ".default",
                                        "PAGER_TITLE" => "Новости",
                                        "PARENT_SECTION" => "",
                                        "PARENT_SECTION_CODE" => "",
                                        "PREVIEW_TRUNCATE_LEN" => "",
                                        "PROPERTY_CODE" => array(
                                            0 => "",
                                            1 => "ATR_SALARY",
                                            2 => "",
                                        ),
                                        "SET_BROWSER_TITLE" => "N",
                                        "SET_LAST_MODIFIED" => "N",
                                        "SET_META_DESCRIPTION" => "N",
                                        "SET_META_KEYWORDS" => "N",
                                        "SET_STATUS_404" => "N",
                                        "SET_TITLE" => "N",
                                        "SHOW_404" => "N",
                                        "SORT_BY1" => "ACTIVE_FROM",
                                        "SORT_BY2" => "SORT",
                                        "SORT_ORDER1" => "DESC",
                                        "SORT_ORDER2" => "ASC",
                                        "COMPONENT_TEMPLATE" => "header_vacancies_slider"
                                    ),
                                    false
                                ); ?>

                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/includes/left_inc_vacancies.php"
                                    )
                                );?>

                                <div class="col col-mb-12">
                                    <a href="/gallery/" class="galery"></a>
                                </div>

                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/includes/left_inc_gallery.php"
                                    )
                                );?>

                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:voting.current",
                                    "main_page_voiting",
                                    array(
                                        "AJAX_MODE" => "N",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "Y",
                                        "CACHE_TIME" => "3600",
                                        "CACHE_TYPE" => "A",
                                        "CHANNEL_SID" => "VOTE_S1",
                                        "VOTE_ALL_RESULTS" => "N",
                                        "VOTE_ID" => "",
                                        "COMPONENT_TEMPLATE" => "main_page_voiting"
                                    ),
                                    false
                                ); ?>

                                <div>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "COMPOSITE_FRAME_MODE" => "A",
                                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/includes/left_inc_voiting.php"
                                        )
                                    );?>
                                </div>

                                <div class="col col-mb-12"> 
                                    <div class="vk" style="margin: 30px 0">
                                        <script type="text/javascript" src="//vk.com/js/api/openapi.js?136"></script>

                                        <!-- VK Widget -->
                                        <div id="vk_groups"></div>
                                        <script type="text/javascript">
                                            VK.Widgets.Group("vk_groups", {
                                                mode: 3,
                                                width: "232"
                                            }, 86694270/*71483652*/);
                                        </script>
                                    </div>
                                </div>

                                <div>
                                    <? $APPLICATION->IncludeComponent("bitrix:main.include", ".default",
                                        Array("AREA_FILE_SHOW" => "file",
                                            "PATH" => "/includes/left_inc.php",
                                            "EDIT_TEMPLATE" => ""));
                                    ?>
                                </div>

                            </div>

                        </div>

                        <div class="col col-mb-12 col-dt-9 col-12 m-c" style="padding-top: 18px;">

                            <? function MyShowRow($text)
                            {
                                global $APPLICATION;
                                $APPLICATION->AddChainItem($APPLICATION->GetTitle(), "");

                            }

                            ?>

                            <? /*Хлебные крошки*/ ?>

                            <? $APPLICATION->IncludeComponent(
                                "bitrix:breadcrumb",
                                "bread_crumbs_bank",
                                array(
                                    "PATH" => "",
                                    "SITE_ID" => "s1",
                                    "START_FROM" => "0",
                                    "COMPONENT_TEMPLATE" => "bread_crumbs_bank"
                                ),
                                false
                            ); ?>


                            <? /*Хлебные крошки*/ ?>
<!--                            --><?// $APPLICATION->AddBufferContent("\\Bitrix\\GosSite\\Layout::printWrapper", "header"); ?>

                            <?
                            }



                            else
                            {
                            ?>

                            <div class="col col-mb-12 col-2 col-margin-bottom left-side-bar">

                                <? /*Левое меню*/ ?>
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "market_menu",
                                    array(
                                        "COMPONENT_TEMPLATE" => "market_menu",
                                        "ROOT_MENU_TYPE" => "left",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_USE_GROUPS" => "N",
                                        "MENU_CACHE_GET_VARS" => array(),
                                        "MAX_LEVEL" => "2",
                                        "CHILD_MENU_TYPE" => "market",
                                        "USE_EXT" => "N",
                                        "DELAY" => "N",
                                        "ALLOW_MULTI_SELECT" => "N"
                                    ),
                                    false
                                ); ?>
                                <? /*Левое меню*/ ?>


                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/includes/left_inc_podmenu.php"
                                    )
                                );?>

                                <div class="mb-hide tablet-hide" style="margin-left: 10px;">
                                    <div class="col col-mb-12 ">
                                        <a href="/bank-resume/" class="bank-resume"></a>
                                    </div>

                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "COMPOSITE_FRAME_MODE" => "A",
                                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/includes/left_inc_bank.php"
                                        )
                                    );?>

                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:news.list",
                                        "header_vacancies_slider",
                                        array(
                                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                            "ADD_SECTIONS_CHAIN" => "N",
                                            "AJAX_MODE" => "N",
                                            "AJAX_OPTION_ADDITIONAL" => "",
                                            "AJAX_OPTION_HISTORY" => "N",
                                            "AJAX_OPTION_JUMP" => "N",
                                            "AJAX_OPTION_STYLE" => "Y",
                                            "CACHE_FILTER" => "N",
                                            "CACHE_GROUPS" => "Y",
                                            "CACHE_TIME" => "36000000",
                                            "CACHE_TYPE" => "A",
                                            "CHECK_DATES" => "Y",
                                            "DETAIL_URL" => "/about/vacancies/job/#ELEMENT_ID#",
                                            "DISPLAY_BOTTOM_PAGER" => "Y",
                                            "DISPLAY_DATE" => "Y",
                                            "DISPLAY_NAME" => "Y",
                                            "DISPLAY_PICTURE" => "Y",
                                            "DISPLAY_PREVIEW_TEXT" => "Y",
                                            "DISPLAY_TOP_PAGER" => "N",
                                            "FIELD_CODE" => array(
                                                0 => "",
                                                1 => "",
                                            ),
                                            "FILTER_NAME" => "",
                                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                            "IBLOCK_ID" => "18",
                                            "IBLOCK_TYPE" => "vacancies",
                                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                            "INCLUDE_SUBSECTIONS" => "Y",
                                            "MESSAGE_404" => "",
                                            "NEWS_COUNT" => "20",
                                            "PAGER_BASE_LINK_ENABLE" => "N",
                                            "PAGER_DESC_NUMBERING" => "N",
                                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                            "PAGER_SHOW_ALL" => "N",
                                            "PAGER_SHOW_ALWAYS" => "N",
                                            "PAGER_TEMPLATE" => ".default",
                                            "PAGER_TITLE" => "Новости",
                                            "PARENT_SECTION" => "",
                                            "PARENT_SECTION_CODE" => "",
                                            "PREVIEW_TRUNCATE_LEN" => "",
                                            "PROPERTY_CODE" => array(
                                                0 => "",
                                                1 => "ATR_SALARY",
                                                2 => "",
                                            ),
                                            "SET_BROWSER_TITLE" => "N",
                                            "SET_LAST_MODIFIED" => "N",
                                            "SET_META_DESCRIPTION" => "N",
                                            "SET_META_KEYWORDS" => "N",
                                            "SET_STATUS_404" => "N",
                                            "SET_TITLE" => "N",
                                            "SHOW_404" => "N",
                                            "SORT_BY1" => "ACTIVE_FROM",
                                            "SORT_BY2" => "SORT",
                                            "SORT_ORDER1" => "DESC",
                                            "SORT_ORDER2" => "ASC",
                                            "COMPONENT_TEMPLATE" => "header_vacancies_slider"
                                        ),
                                        false
                                    ); ?>

                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "COMPOSITE_FRAME_MODE" => "A",
                                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/includes/left_inc_vacancies.php"
                                        )
                                    );?>

                                    <div class="col col-mb-12">
                                        <a href="/gallery/" class="galery"></a>
                                    </div>

                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "COMPOSITE_FRAME_MODE" => "A",
                                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/includes/left_inc_gallery.php"
                                        )
                                    );?>

                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:voting.current",
                                        "main_page_voiting",
                                        array(
                                            "AJAX_MODE" => "N",
                                            "AJAX_OPTION_ADDITIONAL" => "",
                                            "AJAX_OPTION_HISTORY" => "N",
                                            "AJAX_OPTION_JUMP" => "N",
                                            "AJAX_OPTION_STYLE" => "Y",
                                            "CACHE_TIME" => "3600",
                                            "CACHE_TYPE" => "A",
                                            "CHANNEL_SID" => "VOTE_S1",
                                            "VOTE_ALL_RESULTS" => "N",
                                            "VOTE_ID" => "",
                                            "COMPONENT_TEMPLATE" => "main_page_voiting"
                                        ),
                                        false
                                    ); ?>

                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "COMPOSITE_FRAME_MODE" => "A",
                                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/includes/left_inc_voiting.php"
                                        )
                                    );?>

                                    <div class="col col-mb-12">
                                        <div class="vk" style="margin-top: 30px;">
                                            <script type="text/javascript"
                                                    src="//vk.com/js/api/openapi.js?136"></script>

                                            <!-- VK Widget -->
                                            <div id="vk_groups"></div>
                                            <script type="text/javascript">
                                                VK.Widgets.Group("vk_groups", {
                                                    mode: 3,
                                                    width: "232"
                                                }, 86694270/*71483652*/);
                                            </script>
                                        </div>
                                    </div>

                                    <div>
                                        <? $APPLICATION->IncludeComponent("bitrix:main.include", ".default",
                                            Array("AREA_FILE_SHOW" => "file",
                                                "PATH" => "/includes/left_inc.php",
                                                "EDIT_TEMPLATE" => ""));
                                        ?>
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="col col-mb-12 col-dt-9 col-12 m-c" style="padding-top: 18px;">

                                <? function MyShowRow($text)
                                {
                                    global $APPLICATION;
                                    $APPLICATION->AddChainItem($APPLICATION->GetTitle(), "");
                                }

                                ?>

                                <? /*Хлебные крошки*/ ?>
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:breadcrumb",
                                    "bread_crumbs_bank",
                                    array(
                                        "PATH" => "",
                                        "SITE_ID" => "s1",
                                        "START_FROM" => "0",
                                        "COMPONENT_TEMPLATE" => "bread_crumbs_bank"
                                    ),
                                    false
                                ); ?>
                                <? /*Хлебные крошки*/ ?>
                                <?/* $APPLICATION->AddBufferContent("\\Bitrix\\GosSite\\Layout::printWrapper", "header"); */?>

                                <? /* Если мы НЕ находимся на главной */ ?>
                                <? /* Если мы НЕ находимся на главной */ ?>
                                <? if ($APPLICATION->GetCurPage(false) !== '/'):
                                    ?><h1><?= $APPLICATION->ShowTitle(false); ?></h1><?
                                endif; ?>

                                <? } ?>

                                <? } ?>

