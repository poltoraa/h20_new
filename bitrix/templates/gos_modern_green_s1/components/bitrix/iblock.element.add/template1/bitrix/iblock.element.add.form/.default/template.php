<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(false);

if (!empty($arResult["ERRORS"])):?>
    <? ShowError(implode("<br />", $arResult["ERRORS"])) ?>
<?endif;
if (strlen($arResult["MESSAGE"]) > 0):?>
    <? ShowNote($arResult["MESSAGE"]) ?>
<? endif ?>
<?$count = -1;?>

<!--<pre>--><?//print_r($arResult)?><!--</pre>-->
<?/*
<h2>Личные данные</h2>

/*<form action="" method="get">
    <!--
    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <label for="a1">Фамилия Имя Отчество</label>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <input type="text" id="a1">
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <label for="a2">Дата рождения</label>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <input type="text" id="a2">
        </div>
        <div class="col col-mb-3 dt-block ld-block">
            <span> Например, 01.01.1992</span>
        </div>

    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Пол</span>
        </div>
        <div class="col col-mb-6">
            <div class="col col-dt-6 col-mb-12">
                <input type="radio" id="a3"><label class="label-radio" for="a3"><span>Женский</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12">
                <input type="radio" id="a4"><label class="label-radio" for="a4"><span>Мужской</span></label>
            </div>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Семейное положение</span>
        </div>
        <div class="col col-mb-6">
            <div class="col col-dt-6 col-mb-12">
                <input type="radio" id="a5"><label class="label-radio" for="a5"><span>Холост</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12">
                <input type="radio" id="a6"><label class="label-radio"
                                                   for="a6"><span>Замужем/Женат</span></label>
            </div>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <label for="a7">Телефон</label>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <input type="text" id="a7">
        </div>
        <div class="col col-mb-3 dt-block ld-block">
            <span> Например,8-903-900-00-00</span>
        </div>
    </div>

    <h2>Условия работы</h2>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <label for="a8">Желаемая должность</label>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <input type="text" id="a8">
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <label for="a9">Зарплата</label>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <input type="text" id="a9">
        </div>
        <div class="col col-mb-3 dt-block ld-block">
            <span> Желаемая зарплата в рублях</span>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Предпочитаемый график</span>
        </div>
        <div class="col col-mb-6">
            <div class="col col-dt-6 col-mb-12">
                <input type="checkbox" id="a10"><label class="label-checkbox" for="a10"><span>Полный день</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12">
                <input type="checkbox" id="a11"><label class="label-checkbox"
                                                       for="a11"><span>Гибкий график</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12">
                <input type="checkbox" id="a12"><label class="label-checkbox"
                                                       for="a12"><span>Удаленная работа</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12">
                <input type="checkbox" id="a13"><label class="label-checkbox"
                                                       for="a13"><span>Сменый график</span></label>
            </div>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Тип занятости</span>
        </div>
        <div class="col col-mb-6">
            <div class="col col-dt-6 col-mb-12">
                <input type="checkbox" id="a14"><label class="label-checkbox"
                                                       for="a14"><span>Полная занятость</span></label></div>
            <div class="col col-dt-6 col-mb-12"><input type="checkbox" id="a15"><label class="label-checkbox"
                                                                                       for="a15"><span>Частичная занятость</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12"><input type="checkbox" id="a16"><label class="label-checkbox"
                                                                                       for="a16"><span>Проектная работа</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12"><input type="checkbox" id="a17"><label class="label-checkbox"
                                                                                       for="a17"><span>Стажировка</span></label>
            </div>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Отдельные условия</span>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <textarea id="a18" cols="73" rows="5"></textarea>
        </div>
        <div class="col col-mb-3 dt-block ld-block">
            <span> Соц. паекет, отдельный кабинет и т.д.</span>
        </div>
    </div>

    <h2>Профессиональные данные</h2>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Предпочитаемый график</span>
        </div>
        <div class="col col-mb-6">
            <div class="col col-dt-6 col-mb-12">
                <input type="radio" id="a19"><label class="label-radio"
                                                    for="a19"><span>Полный день</span></label></div>
            <div class="col col-dt-6 col-mb-12"><input type="radio" id="a20"><label class="label-radio" for="a20"><span>Гибкий график</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12"><input type="radio" id="a21"><label class="label-radio"
                                                                                    for="a21"><span>Удаленная работа</span></label>
            </div>
            <div class="col col-dt-6 col-mb-12"><input type="radio" id="a22"><label class="label-radio" for="a22"><span>Сменый график</span></label>
            </div>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Предыдущие места работы</span>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <textarea id="a23" cols="73" rows="5"></textarea>
        </div>
        <div class="col col-mb-3 dt-block ld-block">
            <span> Перечислите места работы через запятую.</span>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Профессиональная область</span>
        </div>
        <div class="col col-mb-6">
            <select id="a24">
                <option value="">Все</option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>
    </div>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <label for="a25">Образование</label>
        </div>
        <div class="col col-mb-12 col-dt-6">
            <input type="text" id="a25">
        </div>
        <div class="col col-mb-3 dt-block ld-block">
            <span> Напишите одно учебное заведение</span>
        </div>
    </div>

    <h2>Дополнительная информация</h2>

    <div class="col col-mb-12 my-input">
        <div class="col col-mb-12 col-dt-3">
            <span>Инвалидность</span>
        </div>
        <div class="col col-mb-6">
            <div class="col col-dt-6 col-mb-12">
                <input type="radio" id="a26"><label class="label-radio" for="a26"><span>Да</span></label></div>
            <div class="col col-dt-6 col-mb-12"><input type="radio" id="a27"><label class="label-radio" for="a27"><span>Нет</span></label>
            </div>
        </div>
    </div>

    <div class="col col-mb-12 my-input my-input-last">
        <div class="col col-mb-12">
            <input type="submit" id="a28" value="Добавить резюме"></div>
        <div class="col col-mb-12">
            <input type="reset" id="a29" value="Отмена"></div>
    </div>
</form>--> */?>

<div class="col col-mb-12 page dobavlenie-resume-page">

    <form name="iblock_add" action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">

        <?= bitrix_sessid_post() ?>
        <? if ($arParams["MAX_FILE_SIZE"] > 0): ?>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?= $arParams["MAX_FILE_SIZE"] ?>" /><? endif ?>
        <table class="data-table">
            <thead>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            </thead>


            <? if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])): ?>

                <tbody>
                <?
                $count = 0;
                $name = 0;

                foreach ($arResult["PROPERTY_LIST"] as $propertyID): ?><tr>
                    <td>
                        <?
                        if (intval($propertyID) > 0) {
                            if (
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T"
                                &&
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] == "1"
                            )
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "S";

                            elseif (
                                (
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S"
                                    ||
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "N"
                                )
                                &&
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1"
                            )
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";

                        } elseif (($propertyID == "TAGS") && CModule::IncludeModule('search'))
                            $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";

                        if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y") {
                            $inputNum = ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) ? count($arResult["ELEMENT_PROPERTIES"][$propertyID]) : 0;
                            $inputNum += $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE_CNT"];
                        } else {
                            $inputNum = 1;
                        }

                        if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"])

                            $INPUT_TYPE = "USER_TYPE";
                        else
                            $INPUT_TYPE = $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"];

                        $count++;

                        if($INPUT_TYPE == 'USER_TYPE')
                        {
                            $INPUT_TYPE = 'T';
                        }
                        else
                            if ($propertyID == 86 or $propertyID == 91 or $propertyID == 79 or $propertyID == 90)
                            {
                                $INPUT_TYPE = 'radio';
                            }
                        else
                            if($propertyID == 88 or $propertyID == 87)
                            {
                                $INPUT_TYPE = 'checkbox';
                            }
                        else
                            if($propertyID == 92 or $propertyID == 89 or $propertyID == 78)
                            {
                                $INPUT_TYPE = 'dropdown';
                            }

                        switch ($INPUT_TYPE):

                            case "F":
                            { $count++;

                            ?>
                                <?if($propertyID=="DETAIL_PICTURE"){?>
                                <div class="col col-mb-12 my-input">
                                     <div class="col col-mb-12 col-dt-3">
                                           <label for="a<?= $count ?>"><?=$arResult["ELEMENT_PROPERTIES"][$propertyID][0]["NAME"]?> Загрузите фотографию</label>
                                     </div>
                                <?
                                    $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                    ?>
                                    <input type="hidden"
                                           name="PROPERTY[<?= $propertyID ?>][<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE_ID"] : 0 ?>]"
                                           value="<?= $value ?>"/>
                                    <input type="file"
                                           size="<?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"] ?>"
                                           name="PROPERTY_FILE_<?= $propertyID ?>_<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE_ID"] : 0 ?>"/>
                                    <br/>
                                    <?
                                ?>
                                </div>
                                <?}else{  // если не картинка?>


                                <div class="col col-mb-12 my-input">
                                     <div class="col col-mb-12 col-dt-3">
                                           <label for="a<?= $count ?>"><?=$arResult["ELEMENT_PROPERTIES"][$propertyID][0]["NAME"]?> прикрепить резюме</label>
                                     </div>

                                    <?for ($i = 0; $i < $inputNum; $i++) {
                                        $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                        ?>
                                        <input type="hidden"
                                               name="PROPERTY[<?= $propertyID ?>][<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i ?>]"
                                               value="<?= $value ?>"/>
                                        <input type="file"
                                               size="<?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"] ?>"
                                               name="PROPERTY_FILE_<?= $propertyID ?>_<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i ?>"/>
                                        <br/>
                                        <?

                                        if (!empty($value) && is_array($arResult["ELEMENT_FILES"][$value])) {
                                            ?>
                                            <input type="checkbox"
                                                   name="DELETE_FILE[<?= $propertyID ?>][<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i ?>]"
                                                   id="file_delete_<?= $propertyID ?>_<?= $i ?>" value="Y"/><label
                                                for="file_delete_<?= $propertyID ?>_<?= $i ?>"><?= GetMessage("IBLOCK_FORM_FILE_DELETE") ?></label>
                                            <br/>
                                            <?

                                            if ($arResult["ELEMENT_FILES"][$value]["IS_IMAGE"]) {
                                                ?>
                                                <img src="<?= $arResult["ELEMENT_FILES"][$value]["SRC"] ?>"
                                                     height="<?= $arResult["ELEMENT_FILES"][$value]["HEIGHT"] ?>"
                                                     width="<?= $arResult["ELEMENT_FILES"][$value]["WIDTH"] ?>" border="0"/>
                                                <br/>
                                                <?
                                            } else {
                                                ?>
                                                <?= GetMessage("IBLOCK_FORM_FILE_NAME") ?>: <?= $arResult["ELEMENT_FILES"][$value]["ORIGINAL_NAME"] ?>
                                                <br/>
                                                <?= GetMessage("IBLOCK_FORM_FILE_SIZE") ?>: <?= $arResult["ELEMENT_FILES"][$value]["FILE_SIZE"] ?> b
                                                <br/>
                                                [
                                                <a href="<?= $arResult["ELEMENT_FILES"][$value]["SRC"] ?>"><?= GetMessage("IBLOCK_FORM_FILE_DOWNLOAD") ?></a>]
                                                <br/>
                                                <?
                                            }
                                        }
                                    }?>

                                </div>

                                <?}?>
                            <?
                                break;
                            }

                            case "T":
                            {
                            $count++;
                                ?>
                                    <div class="col col-mb-12 my-input">
                                        <div class="col col-mb-12 col-dt-3">
                                            <span><?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?></span>
                                        </div>
                                        <div class="col col-mb-12 col-dt-6">
                                            <textarea id="a<?=$count?>" cols="73"
                                                      rows="5"
                                                      autofocus required
                                                      name="PROPERTY[<?= $propertyID ?>][0]"><?$arResult["PROPERTY_LIST_FULL"][$propertyID]["VALUE"]?></textarea>
                                        </div>
                                        <?if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] == "Отдельные условия") $buffer = "Соц. пакет, отдельный кабинет и т.д."; else $buffer = "Перечислите места работы через запятую.";?>
                                        <div class="col col-mb-3 dt-block ld-block">
                                            <span><?=$buffer?></span>
                                        </div>
                                    </div>
                                <?
                                break;
                            }

                            case "S": {
                                $count++;
                                $buffer = '';
                                $buffer_span = '';
                                if ($propertyID == "NAME")
                                {
                                    if (is_array($_REQUEST["PROPERTY"]["NAME"]) and $_REQUEST["PROPERTY"]["NAME"][0] != '')
                                    {
                                        $buffer = $_REQUEST["PROPERTY"]["NAME"][0];
                                        echo $buffer;
                                    }
                                        ?>

                                        <h2>Личные данные</h2>

                                        <div class="col col-mb-12 my-input">
                                        <div class="col col-mb-12 col-dt-3">
                                            <label for="a<?= $count ?>">Фамилия Имя Отчество</label>
                                        </div>
                                        <div class="col col-mb-12 col-dt-6">
                                            <input name="PROPERTY[<?=$propertyID?>][0]" type="text" id="a<?= $count ?>" value="<?=$buffer?>">
                                        </div>
                                        </div>
                                        <?
                                }
                                else
                                {
                                    switch ($propertyID)
                                    {
                                        case 107:
                                        {
                                            ?>
                                                <h2>Условия работы</h2>
                                            <?
                                            if (is_array($_REQUEST["PROPERTY"][107]) and $_REQUEST["PROPERTY"]["NAME"][0] != '') $buffer = $_REQUEST["PROPERTY"][107][0];
                                            else $buffer = '';
                                            break;
                                        }
                                        case 103:
                                        {
                                            if (is_array($_REQUEST["PROPERTY"][103][0]))
                                                $buffer = $_REQUEST["PROPERTY"][103][0];
                                            else $buffer = '';
                                            $buffer_span = "Например,8-903-900-00-00";
                                            break;
                                        }
                                        case 89:
                                        {
                                            if (is_array($_REQUEST["PROPERTY"][89])and $_REQUEST["PROPERTY"]["NAME"][0] != '') $buffer = $_REQUEST["PROPERTY"][89][0];
                                            else $buffer = '';
                                            $buffer_span = "Напишите одно учебное заведение";
                                            break;
                                        }
                                        case 78:
                                        {
                                            if (is_array($_REQUEST["PROPERTY"][78])and $_REQUEST["PROPERTY"]["NAME"][0] != '') $buffer = $_REQUEST["PROPERTY"][78][0];
                                            else $buffer = '';
                                            $buffer_span = "Желаемая зарплата в рублях";
                                            break;
                                        }
                                        case 99:
                                        {
                                            if (is_array($_REQUEST["PROPERTY"][99])and $_REQUEST["PROPERTY"]["NAME"][0] != '') $buffer = $_REQUEST["PROPERTY"][99][0];
                                            else $buffer = '';
                                            $buffer_span = "Например, 01.01.1990";
                                            break;
                                        }
                                    }?>

                                    <div class="col col-mb-12 my-input">
                                        <div class="col col-mb-12 col-dt-3">
                                            <label for="a<?= $count ?>"><?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?>
                                            </label>
                                        </div>
                                        <div class="col col-mb-12 col-dt-6">
                                             <input name="PROPERTY[<?=$propertyID?>][0]" type="text" id="a<?= $count ?>" value="<?=$buffer?>">
                                        </div>
                                        <div class="col col-mb-3 dt-block ld-block">
                                              <span> <?=$buffer_span?></span>
                                        </div>
                                    </div>
                              <?}
                                break;
                            }

                            case "radio":
                            {
                            if ($propertyID  == 79)
                            {
                                ?>
                                    <h2>Профессиональные данные</h2>
                                <?
                            }
                            elseif($propertyID  == 90)
                            {
                                ?>
                                     <h2>Дополнительная информация</h2>
                                <?
                            }
                                   ?>
                                    <div class="col col-mb-12 my-input">
                                        <div class="col col-mb-12 col-dt-3">
                                            <span><?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?></span>
                                        </div>
                                        <div class="col col-mb-6">

                                            <?
                                                $flag = false;
                                                foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key=>$enum){
                                                $count++;
                                            ?>
                                            <div class="col col-dt-6 col-mb-12">
                                                <?
                                                if (!empty($_REQUEST["PROPERTY"][$propertyID]))
                                                    {
                                                        if ($key != $_REQUEST["PROPERTY"][$propertyID])
                                                        {
                                                            ?><input type="radio" name ="PROPERTY[<?=$propertyID?>]" id="a<?=$count?>" value="<?=$key?>"><?
                                                        }
                                                        elseif ($key == $_REQUEST["PROPERTY"][$propertyID])
                                                        {
                                                            ?><input type="radio" name ="PROPERTY[<?=$propertyID?>]" id="a<?=$count?>" value="<?=$key?>" checked><?
                                                        }
                                                    }
                                                else
                                                {
                                                    ?><input type="radio" name ="PROPERTY[<?=$propertyID?>]" id="a<?=$count?>" value="<?=$key?>"><?
                                                }
                                                ?>
                                                <label class="label-radio" for="a<?=$count?>">
                                                    <span>
                                                        <?=$enum["VALUE"]?>
                                                    </span>
                                                </label>
                                            </div>
                                            <?
                                        }?>
                                        </div>
                                    </div>
                                    <?
                                break;
                            }

                            case "checkbox":
                            {
                            $name++;
                                ?>
                                <div class="col col-mb-12 my-input">
                                    <div class="col col-mb-12 col-dt-3">
                                        <span><?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?></span>
                                    </div>
                                    <div class="col col-mb-6">

                                        <?foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key=>$enum){
                                        $count++;
                                        ?>
                                            <div class="col col-dt-6 col-mb-12">
                                                <?
                                                if (!empty($_REQUEST["PROPERTY"][$propertyID]))
                                                    {
                                                        foreach ($_REQUEST["PROPERTY"][$propertyID] as $req)
                                                        {
                                                            if ($key != $req)
                                                            {
                                                                ?><input type="checkbox" name ="PROPERTY[<?=$propertyID?>][<?=$key?>]" id="a<?=$count?>" value="<?= $key ?>"><?
                                                            }
                                                            elseif ($key == $req)
                                                            {
                                                                ?><input type="checkbox" name ="PROPERTY[<?=$propertyID?>][<?=$key?>]" id="a<?=$count?>" value="<?= $key ?>" checked><?
                                                            }
                                                        }
                                                    }
                                                else
                                                {
                                                    ?><input type="checkbox" name ="PROPERTY[<?=$propertyID?>][<?=$key?>]" id="a<?=$count?>" value="<?= $key ?>"><?
                                                }
                                                ?>
                                                <label class="label-checkbox" for="a<?=$count?>">
                                                    <span>
                                                        <?=$enum["VALUE"]?>
                                                    </span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                    </div>
                                </div>
                                <?
                                break;
                            }

                            case "dropdown":
                            {
                            $type = "dropdown";
                                ?>
                                <div class="col col-mb-12 my-input">
                                    <div class="col col-mb-12 col-dt-3">
                                        <span><?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?></span>
                                    </div>
                                    <div class="col col-mb-6">
                                        <select
                                         id="a<?=$count?>"
                                         name="PROPERTY[<?= $propertyID ?>]<?= $type == "multiselect" ? "[]\" size=\"" . $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] . "\" multiple=\"multiple" : "" ?>">
                                        <?foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key=>$enum)
                                        {
                                            $count++;
                                            if (!empty($_REQUEST["PROPERTY"][$propertyID]))
                                                {
                                                    if ($key != $_REQUEST["PROPERTY"][$propertyID])
                                                    {
                                                        ?><option value="<?= $key ?>"><?=$enum["VALUE"]?></option><?
                                                    }
                                                    elseif ($key == $_REQUEST["PROPERTY"][$propertyID])
                                                    {
                                                        ?><option value="<?= $key ?>" selected><?=$enum["VALUE"]?></option><?
                                                    }
                                                }
                                            else
                                            {
                                                ?><option value="<?= $key ?>"><?=$enum["VALUE"]?></option><?
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <?
                                break;
                            }

                        endswitch; ?>
                    </td>
                    </tr>
                <? endforeach; ?>
                </tbody>


            <? endif ?>
            <tfoot>

                <tr>
                    <td colspan="2">
                        <div class="col col-mb-12 my-input my-input-last">
                            <div class="col col-mb-12">
                                <input type="submit" id="a30" name="iblock_submit" value="Добавить резюме"/>

                            </div>
                            <div class="col col-mb-12">
                                <a href="/bank-resume/">Назад</a>
                                <?/*<input type="reset" id="a31" value="Отмена">*/?>
                            </div>
                        </div>
                    </td>
                </tr>


            </tfoot>

        </table>

    </form>
</div>


