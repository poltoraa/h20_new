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
$this->setFrameMode(true);
$key = 0;
$keys = 0;
?>

<!--    <pre>--><?// print_r($arResult)?><!--</pre>-->

<script xmlns:data-iview="http://www.w3.org/1999/xhtml" xmlns:data-iview="http://www.w3.org/1999/xhtml">
    $(document).ready(function () {
        $('#iview').iView({
            pauseTime: 8000,
            directionNav: true,
            tooltipY: -15,
            controlNavNextPrev: true,
            directionNav: true, // Вперед и Наза
            nextLabel: "",
            pauseOnHover: true,
            previousLabel: ""
        });
    });
</script>

<link media="screen" href="<?= SITE_TEMPLATE_PATH ?>/slider/demo/styles/demo.css" type="text/css"
      rel="stylesheet"/>


<div id="cont" class="mb-hide main-slider">
    <div class="container-1">
        <div id="iview">
<!--            <a href="#0" id="remove" class="d-n">111</a>-->
            <?
            foreach ($arResult["ITEMS"] as $keys => $arItem)
            {
                if ($arItem["PROPERTIES"]["ATR_LINK"]["VALUE"] != '')
                {
                    $key = 1;
                    break;
                }
            }
            if ($key == 1)
            {
                $arrId = array();
                $arrId = explode('/', $arResult["ITEMS"][$keys]["PROPERTIES"]["ATR_LINK"]["VALUE"]);
                ?>
                <?/*Работает*/
                /*<div data-iview:image="https://placeholdit.imgix.net/~text?txtsize=89&txt=1&w=300&h=200" data-iview:type="video" data-iview:transition="strip-right-fade,strip-left-fade" class="iview-video">
<!--                        <iframe width="900" height="500" src="https://www.youtube.com/embed/--><?//echo $arrId[3]?><!--?autoplay=1" frameborder="0"-->
<!--                                allowfullscreen></iframe>-->
<!--                        <div class="iview-caption blackcaption" data-x="410" data-y="240" data-transition="wipeLeft"-->
<!--                             data-easing="easeInOutElastic">--><?//=$arItem["PROPERTIES"]["ATR_SUBSCRIBE"]["VALUE"] ?>
<!--                        </div>-->
                     <iframe width="900" height="500" src="https://www.youtube.com/embed/<?echo $arrId[3]?>" frameborder="0"
                             allowfullscreen></iframe>
                 </div>*/?>

                <div data-iview:image="https://placeholdit.imgix.net/~text?txtsize=89&txt=1&w=1&h=1" data-iview:type="video" data-iview:transition="strip-right-fade,strip-left-fade" class="iview-video">
                    <iframe width="918" height="450" src="https://www.youtube.com/embed/<?echo $arrId[3]?>?autoplay=1&rel=0" frameborder="0"
                            allowfullscreen></iframe>
                    <a href="<?echo $arResult["ITEMS"][$keys]["PROPERTIES"]["ATR_MAIN_LINK"]["VALUE"]?>" style="    height: 50px;
                    position: relative;
                    top: 90%;
                    z-index: 9999;
                    color: #ffffff;
                    text-align: center;
                    padding-top: 5px;
                    display: block;
                    background-color: #2d9890;">
                        <?=$arItem["NAME"]?>
                    </a>
                </div>
                <?
                unset($arResult["ITEMS"][$keys]);
            }



            foreach ($arResult["ITEMS"] as $arItem)
            {
                if ($arItem["PROPERTIES"]["ATR_MAIN_LINK"]["VALUE"] == '') $link = '#0'; else $link = $arItem["PROPERTIES"]["ATR_MAIN_LINK"]["VALUE"];
                /*первый тип - без списка*/
                if ($arItem["PROPERTIES"]["ATR_TYPE"]["VALUE"] != 0 and $arItem["PROPERTIES"]["ATR_WHEN"]["VALUE"] != '' and $arItem["PROPERTIES"]["ATR_TIME"]["VALUE"] and $arItem["PROPERTIES"]["ATR_EVENT"]["VALUE"] != '' and $arItem["PROPERTIES"]["ATR_WHERE"]["VALUE"] != '')
                {
                    $buffer = explode(" ", $arItem["PROPERTIES"]["ATR_WHEN"]["VALUE"]);
                    ?>
                    <a href="<?= $link ?>" data-iview:image="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                       data-iview:transition="slice-top-fade,slice-right-fade">
                        <div class="iview-caption caption1" data-x="60" data-y="-70"></div>
                        <div class="iview-caption caption2" data-x="80" data-y="5" data-transition="wipeRight">
                            <span><?= $buffer[0] ?></span> <?= $buffer[1] ?>
                        </div>
                        <div class="iview-caption caption3" data-x="360" data-y="140" data-transition="wipeLeft"><span
                                class="span-time"><b>В <?= $arItem["PROPERTIES"]["ATR_TIME"]["VALUE"] ?> </b><br> состоится</span>
                        </div>
                        <div class="iview-caption caption4" data-x="130" data-y="265" data-transition="wipeLeft"><span
                                class="span-name">"<?= $arItem["PROPERTIES"]["ATR_EVENT"]["VALUE"] ?>"</span></div>
                        <div class="iview-caption caption5" data-x="180" data-y="430" data-transition="wipeLeft"><span
                                class="span-place">По адресу: <?= $arItem["PROPERTIES"]["ATR_WHERE"]["VALUE"] ?></span>
                        </div>
                    </a>
                    <?
                }
                else
                    switch ($arItem["PROPERTIES"]["ATR_TYPE"]["VALUE"])
                    {
                        case 1: {
                            ?>
                            <a href="<?= $link ?>" data-iview:image="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                               data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">
                                <div class="iview-caption caption15" data-x="30" data-y="10"
                                     data-transition="expandTop"></div>
                                <div class="iview-caption caption16" data-x="260" data-y="100"
                                     data-transition="expandBottom">
                                </div>
                                <div class="iview-caption caption17" data-x="182" data-y="107"></div>
                                <div class="iview-caption caption19" data-x="42" data-y="104" data-transition="fade">
                                    <?= $arItem["PROPERTIES"]["ATR_HEADER"]["VALUE"] ?>
                                </div>
                                <div class="iview-caption caption18" data-x="42" data-y="170"
                                     data-transition="wipeLeft">
                                    <ul style=" list-style-type: disc;">
                                        <?
                                        if ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] == '') {
                                            ?>
                                            <li>
                                                <i class="new-sprite-icon two-arrows"></i><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span>
                                            </li>
                                        <? } elseif ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] == '') { ?>
                                            <li>
                                                <i class="new-sprite-icon two-arrows"></i><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span>
                                            </li>
                                            <li style="padding-left: 30px"><i
                                                    class="new-sprite-icon two-arrows"></i><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span>
                                            </li>
                                        <?
                                        } else {
                                            ?>
                                            <li>
                                                <i class="new-sprite-icon two-arrows"></i><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span>
                                            </li>
                                            <li style="padding-left: 30px"><i
                                                    class="new-sprite-icon two-arrows"></i><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span>
                                            </li>
                                            <li style="padding-left: 60px"><i
                                                    class="new-sprite-icon two-arrows"></i><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] ?></span>
                                            </li>
                                        <?
                                        } ?>
                                    </ul>
                                </div>
                                <div class="iview-caption caption20" data-x="65" data-y="70"
                                     data-transition="wipeBottom">
                                <span>
                                    <?= $arItem["PROPERTIES"]["ATR_FOOTNOTE"]["VALUE"] ?>
                                </span>
                                </div>
                                <div class="iview-caption caption21" data-x="560" data-y="235"
                                     data-transition="fade"></div>
                            </a>
                            <?
                            break;
                        }
                        case 2: {
                            if ($arItem["PROPERTIES"]["ATR_FOOTNOTE"]["VALUE"] == '') {
                                ?>
                                <a href="<?= $link ?>" data-iview:image="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                                   data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">
                                    <div class="iview-caption caption8" data-x="60" data-y="280"
                                         data-transition="wipeUp">
                                        <?= $arItem["PROPERTIES"]["ATR_HEADER"]["VALUE"] ?>
                                    </div>
                                    <div class="iview-caption caption7" data-x="60" data-y="320"
                                         data-transition="wipeDown">
                                        <ul style="list-style: circle outside;">
                                            <?
                                            if ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] == '') {
                                                ?>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></li>
                                            <? } elseif ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] == '') { ?>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></li>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></li>
                                                <?
                                            } else {
                                                ?>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></li>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></li>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] ?></li>
                                                <?
                                            } ?>

                                        </ul>

                                    </div>
                                </a>
                                <?
                            } else {
                                ?>
                                <a href="<?= $link ?>" data-iview:image="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                                   data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">
                                    <div class="iview-caption caption8" data-x="60" data-y="280"
                                         data-transition="wipeUp">
                                        <?= $arItem["PROPERTIES"]["ATR_HEADER"]["VALUE"] ?>
                                    </div>
                                    <div class="iview-caption caption7" data-x="60" data-y="320"
                                         data-transition="wipeDown">
                                        <ul style="list-style: circle outside;">
                                            <?
                                            if ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] == '') {
                                                ?>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></li>
                                            <? } elseif ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] == '') { ?>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></li>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></li>
                                                <?
                                            } else {
                                                ?>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></li>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></li>
                                                <li><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] ?></li>
                                                <?
                                            } ?>
                                        </ul>

                                    </div>
                                    <div class="iview-caption caption9" data-x="120" data-y="440"
                                         data-transition="wipeUp">
                                    <span>
                                        <?= $arItem["PROPERTIES"]["ATR_FOOTNOTE"]["VALUE"] ?>
                                    </span>
                                    </div>
                                </a>
                                <?
                            }
                            break;
                        }
                        case 3: {
                            ?>
                            <a href="<?= $link ?>" data-iview:image="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                               data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">
                                <div class="iview-caption caption10" data-x="440" data-y="0" data-transition="wipeUp">
                                    <?= $arItem["PROPERTIES"]["ATR_HEADER"]["VALUE"] ?>
                                </div>
                                <div class="iview-caption caption11" data-x="440" data-y="70"
                                     data-transition="wipeDown">
                                    <ul style="list-style: circle outside;">
                                        <?
                                        if ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] == '') {
                                            ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                        <? } elseif ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] == '') { ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span></li>
                                            <?
                                        } else {
                                            ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] ?></span></li>
                                            <?
                                        } ?>
                                    </ul>

                            <span>
								<?= $arItem["PROPERTIES"]["ATR_FOOTNOTE"]["VALUE"] ?>
							</span>
                                </div>
                            </a>
                            <?
                            break;
                        }
                        case 4: {
                            ?>
                            <a href="<?= $link ?>" data-iview:image="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                               data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">
                                <div class="iview-caption caption8" data-x="60"
                                     data-y="280"><?= $arItem["PROPERTIES"]["ATR_HEADER"]["VALUE"] ?></div>
                                <div class="iview-caption caption7" data-x="60" data-y="320">
                                    <ul style="list-style: circle outside;">
                                        <?
                                        if ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] == '') {
                                            ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                        <? } elseif ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] == '') { ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span></li>
                                            <?
                                        } else {
                                            ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] ?></span></li>
                                            <?
                                        } ?>

                                    </ul>
                                </div>
                                <div class="iview-caption caption9" data-x="120" data-y="460" data-transition="wipeUp">
							<span>
								<?= $arItem["PROPERTIES"]["ATR_FOOTNOTE"]["VALUE"] ?>
							</span>
                                </div>
                            </a>
                            <?
                            break;
                        }
                        case 5: {
                            ?>
                            <a href="<?= $link ?>" data-iview:image="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                               data-iview:transition="zigzag-drop-top,zigzag-drop-bottom">
                                <div class="iview-caption caption12" data-x="0"
                                     data-y="250"><?= $arItem["PROPERTIES"]["ATR_HEADER"]["VALUE"] ?></div>
                                <div class="iview-caption caption13" data-x="0" data-y="320">
                                    <ul style="list-style: circle outside;">
                                        <?
                                        if ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] == '') {
                                            ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                        <? } elseif ($arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] == '') { ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span></li>
                                            <?
                                        } else {
                                            ?>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][0] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][1] ?></span></li>
                                            <li><span><?= $arItem["PROPERTIES"]["ATR_LIST"]["VALUE"][2] ?></span></li>
                                            <?
                                        } ?>
                                    </ul>
                                </div>
                                <div class="iview-caption caption14" data-x="0" data-y="460" data-transition="wipeUp">
							<span>
								<?= $arItem["PROPERTIES"]["ATR_FOOTNOTE"]["VALUE"] ?>
							</span>
                                </div>
                            </a>
                            <?
                            break;
                        }
                    }
            }
            ?>

        </div>
    </div>
    <center>
</div>
