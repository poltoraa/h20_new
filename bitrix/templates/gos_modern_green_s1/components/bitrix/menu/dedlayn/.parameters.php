<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (!CModule::IncludeModule("iblock"))
    return;
/*
$arProperty_LNSF = array(
    "NAME" => GetMessage("IBLOCK_ADD_NAME"),
    "TAGS" => GetMessage("IBLOCK_ADD_TAGS"),
    "DATE_ACTIVE_FROM" => GetMessage("IBLOCK_ADD_ACTIVE_FROM"),
    "DATE_ACTIVE_TO" => GetMessage("IBLOCK_ADD_ACTIVE_TO"),
    "IBLOCK_SECTION" => GetMessage("IBLOCK_ADD_IBLOCK_SECTION"),
    "PREVIEW_TEXT" => GetMessage("IBLOCK_ADD_PREVIEW_TEXT"),
    "PREVIEW_PICTURE" => GetMessage("IBLOCK_ADD_PREVIEW_PICTURE"),
    "DETAIL_TEXT" => GetMessage("IBLOCK_ADD_DETAIL_TEXT"),
    "DETAIL_PICTURE" => GetMessage("IBLOCK_ADD_DETAIL_PICTURE"),
);
$arVirtualProperties = $arProperty_LNSF;
if(intval($arCurrentValues["IBLOCK_ID"]) > 0) {
    $rsProp = CIBlockProperty::GetList(Array("sort" => "asc", "name" => "asc"), Array("ACTIVE" => "Y", "IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"]));
    while ($arr = $rsProp->Fetch()) {
        $arProperty[$arr["ID"]] = "[" . $arr["CODE"] . "] " . $arr["NAME"];
        if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S", "F"))) {
            $arProperty_LNSF[$arr["ID"]] = "[" . $arr["CODE"] . "] " . $arr["NAME"];
        }
    }
}
*/

$arTemplateParameters = array(
    "GROUP_PROPERTIES1" => array(
        "NAME" =>   "Заголовок",
        "TYPE" => "TEXT",
        "MULTIPLE" => "N"
    )
);
?>