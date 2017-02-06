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


$bxajaxid = CAjax::GetComponentID($component->__name, $component->__template->__name);

$this->setFrameMode(true);


$id = 0;



if($_REQUEST["PAGE_NUM"]) {
    $page_num = $_REQUEST["PAGE_NUM"]-1;
    echo "page num = ", $page_num;
    $lengthArray = $page_num;
}else{
    $lengthArray = 0;
}
?>


<div class="events">

    <div class="double-header-block clearfix">

        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "include_h3",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc_h3",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => "include_h3",
                "PATH" => "/includes/index_inc_h3.php"
            ),
            false
        ); ?>

        <br>

        <div class="double-header-link">
            <a href="/events/">
                Все мероприятия
            </a>
            <i class="icon icon-arrow-right"></i>
        </div>

    </div>

    <div id="#comp_<?= $bxajaxid ?>" class="news_box_h2o">
        <?

        foreach ($arResult["ITEMS"] as $arItem) {

            $date = explode(" ", $arItem["PROPERTIES"]["atr_date_time"]["VALUE"]);
            $time = explode(':', $date[1]);
            $date = explode('.',$date[0]);

            $date_end = explode(" ", $arItem["PROPERTIES"]["atr_date_time_end"]["VALUE"]);
            $time_end = explode(':',$date_end[1]);
            $date_end = explode('.',$date_end[0]);

            $lengthArray++;
            if ($lengthArray % 2 == 0) {

                $id++
                ?>

                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"" class="event" id="event-<?= $id  ?>">

                    <div class="col col-12 col-dt-6 event-text white-box card-1">
                        <?if (($date[0] == $date_end[0] && $date[1] == $date_end[1]) || ($date_end[0] == '' && $date_end[1] == '')){?>
                            <h1><?= $date[0].'.'.$date[1].'.'.$date[2] ?></h1>
                    <?} else {?>
                            <h1><?= $date[0].'.'.$date[1].'.'.$date[2]." - ".$date_end[0].'.'.$date_end[1].'.'.$date_end[2] ?></h1>
                    <?}?>

                        <div style="font-weight: bold; font-size: 20px !important;">
                            <i style=" display:inline-block; height:34px; width:25px; vertical-align: middle;"></i>
                            <?= $time[0] . ":" . $time[1] ?>
                            <? if ($time_end[0] != '' and $time_end[1] != '') {
                                echo " - ", $time_end[0] . ":" . $time_end[1];
                            } ?>
                        </div>
                        <h2><?= $arItem["NAME"] ?></h2>
                        <p>
                            <? $text = $arItem["PREVIEW_TEXT"];
                            echo $text ?>
                            <span>телефон:
                                            <span
                                                class="phone"><?= $arItem["PROPERTIES"]["atr_phone"]["VALUE"] ?></span></span>
                        </p>
                    </div>

                    <div class="col col-12 col-dt-6 mb-hide event-image card-2">
                        <div>
                            <?
                            list($width, $height, $type, $attr) = getimagesize('http://www.gczn.nsk.su' . $arImage['SRC']);
                            if ($height > 213) {
                                $file = CFile::ResizeImageGet($arImage["ID"], array('width' => 213, 'height' => 213), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                ?>
                                <img src="<?= $file["src"] ?>" alt="<?= $arItem["NAME"] ?>">
                            <? } else { ?>
                                <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>">
                                <?
                            } ?>
                        </div>
                    </div>

                </a>

                <?
            } else {

                $id++;
                ?>

                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="event" id="event-<?= $id  ?>">

                    <div class="col col-12 col-dt-6 mb-hide event-image card-1">
                        <div>
                            <?
                            list($width, $height, $type, $attr) = getimagesize('http://www.gczn.nsk.su' . $arImage['SRC']);
                            if ($height > 213) {
                                $file = CFile::ResizeImageGet($arImage["ID"], array('width' => 213, 'height' => 213), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                ?>
                                <img src="<?= $file["src"] ?>" alt="<?= $arItem["NAME"] ?>">
                            <? } else { ?>
                                <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>">
                                <?
                            } ?>
                        </div>
                    </div>

                    <div class="col col-12 col-dt-6 event-text white-box card-2">
                        <?if (($date[0] == $date_end[0] && $date[1] == $date_end[1]) || ($date_end[0] == '' && $date_end[1] == '')){?>
                            <h1><?= $date[0].'.'.$date[1].'.'.$date[2] ?></h1>
                        <?} else {?>
                            <h1 style="font-size: 34px;"><?= $date[0].'.'.$date[1].'.'.$date[2]." - ".$date_end[0].'.'.$date_end[1].'.'.$date_end[2] ?></h1>
                        <?}?>
                        <div style="font-weight: bold; font-size: 20px !important;">
                            <i style=" display:inline-block; height:34px; width:25px; vertical-align: middle;"></i>

                            <? echo $time[0] . ":" . $time[1] ?>

                            <? if ($time_end[0] != '' and $time_end[1] != '') {
                                echo " - ", $time_end[0] . ":" . $time_end[1];
                            } ?>
                        </div>
                        <h2><?= $arItem["NAME"] ?></h2>
                        <p>
                            <? $text = $arItem["PREVIEW_TEXT"];
                            //                            if (strlen($text) > 100) {
                            //                                $text = substr($text, 0, 100) . "...";
                            //                            } ?>
                            <? echo $text ?>
                            <span>телефон:
										<span
                                            class="phone"><?= $arItem["PROPERTIES"]["atr_phone"]["VALUE"] ?></span></span>
                        </p>
                    </div>

                </a>

                <?
            }
        } ?>
    </div>

    <? if ($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->nEndPage): ?>
        <div class="button-wrapper" id="btn_<?= $bxajaxid ?>">
            <a class="my-button-2"
               data-ajax-id="<?= $bxajaxid ?>"
               href="javascript:void(0)"
               data-show-more="<?= $arResult["NAV_RESULT"]->NavNum ?>"
               data-next-page="<?= ($arResult["NAV_RESULT"]->NavPageNomer + 1) ?>"
               data-max-page="<?= $arResult["NAV_RESULT"]->nEndPage ?>"
               data-page-count="<?= $arResult["NAV_RESULT"]->NavPageCount ?>">
                Показать ещё события
            </a>
        </div>
    <? endif ?>
</div>


<script>

    var chck = false;
    $(document).on('click', '[data-show-more]', function () {

        var btn = $(this);

        if(chck){
            chck = false;
            return false;
        }
        chck = true;

        var page = btn.attr('data-next-page');
        var id = btn.attr('data-show-more');
        var bx_ajax_id = btn.attr('data-ajax-id');
        var pageCount = btn.attr('data-page-count');

        var block_id = "#comp_" + bx_ajax_id;
        var button_add = $("#btn_" + bx_ajax_id);
        var data = {bxajaxid: bx_ajax_id};
        data['PAGEN_' + id] = page;
        data['PAGE_NUM'] = page;

        if (pageCount == page) {
            $.ajax({
                type: "GET",
                data: data,
                timeout: 3000,
                success: function (data) {
                    $(button_add).remove();
                    data = $("<div />").html(data);
                    var result = data.find(".news_box_h2o").html();
                    var result2 = data.find(".button-wrapper").html();
                    $(".button-wrapper").html(result2);
                    $(".news_box_h2o").append(result);
                }
            });
        }
        else {
            $.ajax({
                type: "GET",
                data: data,
                timeout: 3000,
                success: function (data) {
                    data = $("<div />").html(data);
                    var result = data.find(".news_box_h2o").html();
                    var result2 = data.find(".button-wrapper").html();
                    $(".button-wrapper").html(result2);
                    $(".news_box_h2o").append(result);
                    $(".news_box_h2o").append(button_add);
                }
            });
        }
    });
</script>


