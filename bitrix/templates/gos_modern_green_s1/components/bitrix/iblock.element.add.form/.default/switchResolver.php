<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 31.01.17
 * Time: 15:34
 */

switch ($INPUT_TYPE):

    case "F":
    { $count++;

        ?>
        <?if($propertyID=="DETAIL_PICTURE"){?>
        <div class="col col-mb-12 my-input">
            <div class="col col-mb-12 col-dt-3">
                <?

                if (!empty($arResult["ELEMENT_FILES"][ $arResult["ELEMENT"]["DETAIL_PICTURE"] ])) {
                    ?><label for="a<?= $count ?>"><?echo $arResult["ELEMENT_FILES"]["DETAIL_PICTURE"]["ORIGINAL_NAME"]?> <b>Изменить</b> фотографию </label><?
                } else {
                    ?><label for="a<?= $count ?>"><?=$arResult["ELEMENT_PROPERTIES"][$propertyID][0]["NAME"]?> Загрузите фотографию</label><?
                } ?>
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
    <?}else{ // если не картинка   ?>

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
        if (is_numeric($propertyID) == true && isset($arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE"]))
        {
            $values = $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE"];
            if (isset($values["TEXT"]) && is_array($values))
            {
                $buffer = $values["TEXT"];
            }
            else
            {
                $buffer = $values;
            }
        }
        else
        {
            $buffer = $arResult["ELEMENT"][$propertyID];
        }
        $count++;

        ?>
        <div class="col col-mb-12 my-input">
            <div class="col col-mb-12 col-dt-3">
                <span><?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?></span>
            </div>
            <div class="col col-mb-12 col-dt-6">
                <?
                switch ($propertyID)
                {
                    case 105: //Отдельные условия
                    {
                        if (is_array($_REQUEST["PROPERTY"][105])) $buffer = $_REQUEST["PROPERTY"][105][0];
                        break;
                    }
                    case 106: //Предыдущие места работы
                    {
                        if (is_array($_REQUEST["PROPERTY"][106][0])) $buffer = $_REQUEST["PROPERTY"][106][0];
                        break;
                    }
                }?>

                <textarea id="a<?=$count?>" cols="73"
                          rows="5"
                          autofocus required
                          name="PROPERTY[<?= $propertyID ?>][0]"><?=$buffer?></textarea>
            </div>
            <?if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] == "Отдельные условия") $buffer_ = "Соц. пакет, отдельный кабинет и т.д."; else $buffer_ = "Перечислите места работы через запятую.";?>
            <div class="col col-mb-3 dt-block ld-block">
                <span><?=$buffer_?></span>
            </div>
        </div>
        <?
        $buffer = '';
        break;
    }

    case "S": {
        $count++;

        if(is_numeric($propertyID) && isset($arResult['ELEMENT_PROPERTIES'][$propertyID][0]['VALUE'])){
            $buffer = $arResult['ELEMENT_PROPERTIES'][$propertyID][0]['VALUE'];
        }elseif (isset($arResult['ELEMENT'][$propertyID])){
            $buffer = $arResult['ELEMENT'][$propertyID];
        }
        else
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
                    break;
                }
                case 103:
                {
                    if (is_array($_REQUEST["PROPERTY"][103][0]))
                        $buffer = $_REQUEST["PROPERTY"][103][0];
                    $buffer_span = "Например,8-903-900-00-00";
                    break;
                }
                case 89:
                {
                    if (is_array($_REQUEST["PROPERTY"][89])and $_REQUEST["PROPERTY"]["NAME"][0] != '') $buffer = $_REQUEST["PROPERTY"][89][0];
                    $buffer_span = "Напишите одно учебное заведение";
                    break;
                }
                case 78:
                {
                    if (is_array($_REQUEST["PROPERTY"][78])and $_REQUEST["PROPERTY"]["NAME"][0] != '') $buffer = $_REQUEST["PROPERTY"][78][0];
                    $buffer_span = "Желаемая зарплата в рублях";
                    break;
                }
                case 99:
                {
                    if (is_array($_REQUEST["PROPERTY"][99])and $_REQUEST["PROPERTY"]["NAME"][0] != '') $buffer = $_REQUEST["PROPERTY"][99][0];
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

    case "radio": {
        if (is_numeric($propertyID) && isset($arResult["ELEMENT_PROPERTIES"][$propertyID])) {
                $buffer = $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE"];
        } else {
            $buffer = '';
        }

        if ($propertyID == 79) {
            ?>
            <h2>Профессиональные данные</h2>
            <?
        } elseif ($propertyID == 90) {
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
                foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $enum) {
                    $count++;
                    if ($buffer == $key)
                    {
                        ?>
                        <div class="col col-dt-6 col-mb-12">
                            <?
                                ?><input type="radio" name="PROPERTY[<?= $propertyID ?>]" id="a<?= $count ?>"
                                         value="<?= $key ?>" checked><?
                            ?>
                            <label class="label-radio" for="a<?= $count ?>">
                                                    <span>
                                                        <?= $enum["VALUE"] ?>
                                                    </span>
                            </label>
                        </div>
                        <?
                        $id = -1;
                        $buffer = '';
                    }
                    else
                    {
                        ?>
                        <div class="col col-dt-6 col-mb-12">
                            <?
                            if (!empty($_REQUEST["PROPERTY"][$propertyID])) {
                                if ($key != $_REQUEST["PROPERTY"][$propertyID]) {
                                    ?><input type="radio" name="PROPERTY[<?= $propertyID ?>]" id="a<?= $count ?>"
                                             value="<?= $key ?>"><?
                                } elseif ($key == $_REQUEST["PROPERTY"][$propertyID]) {
                                    ?><input type="radio" name="PROPERTY[<?= $propertyID ?>]" id="a<?= $count ?>"
                                             value="<?= $key ?>" checked><?
                                }
                            } else {
                                ?><input type="radio" name="PROPERTY[<?= $propertyID ?>]" id="a<?= $count ?>"
                                         value="<?= $key ?>"><?
                            }
                            ?>
                            <label class="label-radio" for="a<?= $count ?>">
                                                    <span>
                                                        <?= $enum["VALUE"] ?>
                                                    </span>
                            </label>
                        </div>
                        <?
                    }
                }?>
            </div>

        </div>
        <?
        break;
    }

    case "checkbox":
    {
        ?>
        <div class="col col-mb-12 my-input">
            <div class="col col-mb-12 col-dt-3">
                <span><?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?></span>
            </div>
            <div class="col col-mb-6">

                <?foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key=>$enum){
                    $count++;
                        $flag = 0;
                        if (!empty($arResult["ELEMENT_PROPERTIES"][$propertyID]))
                        {
                            ?>
                            <div class="col col-dt-6 col-mb-12">
                                <?foreach ($arResult["ELEMENT_PROPERTIES"][$propertyID] as $req){
                                    if ($key == $req["VALUE"]){
                                        ?>
                                        <input type="checkbox" name ="PROPERTY[<?echo $propertyID?>][<?echo $key?>]" id="a<?echo $count?>" value="<?echo $key ?>" checked>
                                        <?
                                    }
                                    else {
                                        $flag++;
                                    }
                                }
                                if ($flag == count($arResult["ELEMENT_PROPERTIES"][$propertyID])){
                                    ?>
                                        <input type="checkbox" name ="PROPERTY[<?=$propertyID?>][<?=$key?>]" id="a<?=$count?>" value="<?= $key ?>">
                                    <?
                                }
                                ?>
                                <label class="label-checkbox" for="a<?=$count?>">
                                    <span>
                                        <?=$enum["VALUE"]?>
                                    </span>
                                </label>
                            </div>
                            <?
                        } /*while editing an element of an array ELEMENT_PROPERTIES*/
                        elseif (!empty($_REQUEST["PROPERTY"][$propertyID])) /*when an update error*/
                        {
                            ?>
                            <div class="col col-dt-6 col-mb-12">
                                <?foreach ($_REQUEST["PROPERTY"][$propertyID] as $req)
                                {
                                    if ($key == $req)
                                    {
                                        ?>
                                            <input type="checkbox" name ="PROPERTY[<?=$propertyID?>][<?=$key?>]" id="a<?=$count?>" value="<?= $key ?>" checked>
                                        <?
                                    }
                                }?>
                                <label class="label-checkbox" for="a<?=$count?>">
                                    <span>
                                        <?=$enum["VALUE"]?>
                                    </span>
                                </label>
                            </div>
                            <?
                        }
                        else /*The first generation of fields */
                        {
                            ?>
                            <div class="col col-dt-6 col-mb-12">
                                <input type="checkbox" name ="PROPERTY[<?=$propertyID?>][<?=$key?>]" id="a<?=$count?>" value="<?= $key ?>">
                                <label class="label-checkbox" for="a<?=$count?>">
                                    <span>
                                        <?=$enum["VALUE"]?>
                                    </span>
                                </label>
                            </div>
                            <?
                        }
                    }?>
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
                        if (!empty($arResult["ELEMENT_PROPERTIES"][$propertyID])){
                            if ($key == $arResult["ELEMENT_PROPERTIES"][$propertyID][0]["VALUE"]){
                                ?><option value="<?= $key ?>" selected><?=$enum["VALUE"]?></option><?
                            }
                            elseif ($key != $_REQUEST["PROPERTY"][$propertyID])
                            {
                                ?><option value="<?= $key ?>"><?=$enum["VALUE"]?></option><?
                            }
                        } /*while editing an element of an array ELEMENT_PROPERTIES*/
                        elseif (!empty($_REQUEST["PROPERTY"][$propertyID]))
                        {
                            if ($key != $_REQUEST["PROPERTY"][$propertyID])
                            {
                                ?><option value="<?= $key ?>"><?=$enum["VALUE"]?></option><?
                            }
                            elseif ($key == $_REQUEST["PROPERTY"][$propertyID])
                            {
                                ?><option value="<?= $key ?>" selected><?=$enum["VALUE"]?></option><?
                            }
                        } /*when an update error*/
                        else
                        {
                            ?><option value="<?= $key ?>"><?=$enum["VALUE"]?></option><?
                        } /*The first generation of fields */
                    }
                    ?>
                </select>
            </div>
        </div>
        <?
        break;
    }

endswitch; ?>


