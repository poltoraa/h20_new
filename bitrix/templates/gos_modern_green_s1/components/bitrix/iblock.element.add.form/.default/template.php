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

$count = -1;
$this->setFrameMode(false);

if (!empty($arResult["ERRORS"]))
    ShowError(implode("<br />", $arResult["ERRORS"]));

if (strlen($arResult["MESSAGE"]) > 0)
    ShowNote($arResult["MESSAGE"]);

function array_dump($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>

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

<?
global $USER;
if ($USER->IsAdmin()){
  //  array_dump($arResult);
}
?>

<div class="col col-mb-12 page dobavlenie-resume-page">

    <form name="iblock_add" action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">

        <?echo bitrix_sessid_post() ?>

        <? if ($arParams["MAX_FILE_SIZE"] > 0){ ?>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?= $arParams["MAX_FILE_SIZE"] ?>" />
        <? } ?>

        <table class="data-table">
            <thead>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            </thead>

            <? if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])){ ?>
                <tbody>
                <?
                $count = 0;
                $name = 0;

                foreach ($arResult["PROPERTY_LIST"] as $propertyID): ?>
                    <tr>
                        <td>
                            <?if (intval($propertyID) > 0) {
                                if (
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T"
                                    &&
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] == "1"
                                )
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "S";
                                elseif (
                                    ($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S" || $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "N")
                                     &&
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1")
                                {
                                    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";
                                }


                            } elseif (($propertyID == "TAGS") && CModule::IncludeModule('search'))
                                $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";

                            if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y")
                            {
                                $inputNum = ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) ? count($arResult["ELEMENT_PROPERTIES"][$propertyID]) : 0;
                                $inputNum += $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE_CNT"];
                            } else
                            {
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
                            elseif ($propertyID == 86 or $propertyID == 91 or $propertyID == 79 or $propertyID == 90)
                                $INPUT_TYPE = 'radio';
                            elseif($propertyID == 88 or $propertyID == 87)
                                 $INPUT_TYPE = 'checkbox';
                           elseif($propertyID == 92 or $propertyID == 89 or $propertyID == 78)
                                $INPUT_TYPE = 'dropdown';

                            /*весь основной switch, рисующий все основные поля*/
                            include 'switchResolver.php'?>

                       </td>
                    </tr>
                <? endforeach; ?>
                </tbody>
            <? } ?>

            <tfoot>
                <tr>
                    <td colspan="2">
                        <div class="col col-mb-12 my-input my-input-last">
                            <div class="col col-mb-12">
                                <?
                                $arGetParams = parse_url($_SERVER['REQUEST_URI']);
                                $arGetParams = explode('&', $arGetParams['query']);
                                $pos = strripos($arGetParams[1], 'CODE');
                                if ($pos !== false)
                                {
                                    ?><input type="submit" id="a30" name="iblock_submit" value="Сохранить резюме"/><?
                                }
                                else
                                {
                                    ?><input type="submit" id="a30" name="iblock_submit" value="Добавить резюме"/><?
                                }
                                ?>
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


