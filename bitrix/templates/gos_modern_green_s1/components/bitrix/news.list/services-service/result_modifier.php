<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true);

if (!CModule::IncludeModule("iblock")) {
    return;
}

$_REQUEST["MODE"]       = htmlspecialcharsbx($_REQUEST["MODE"]);
$_REQUEST["FOR"]        = (int)$_REQUEST["FOR"];
$_REQUEST["SECTION_ID"] = (int)$_REQUEST["SECTION_ID"];

if ($_REQUEST["MODE"] !== "vedomstva" && $_REQUEST["MODE"] !== "allservice") {
    $_REQUEST["MODE"] = "category";
}

$arResult["SECTION_NAME"] = "";
if ($_REQUEST["SECTION_ID"] > 0) {
    if ($_REQUEST["MODE"] === "category") {
        $rsSection = CIBlockElement::GetByID($_REQUEST["SECTION_ID"]);
        if ($section = $rsSection->GetNext()) {
            $arResult["SECTION_NAME"] = $section["NAME"];
        }
    }
    if ($_REQUEST["MODE"] === "vedomstva") {
        $rsSection = CIBlockSection::GetByID($_REQUEST["SECTION_ID"]);
        if ($section = $rsSection->GetNext()) {
            $arResult["SECTION_NAME"] = $section["NAME"];
        }
    }
}
$cp = $this->__component;
if (is_object($cp))
{
    $cp->arResult["SECTION_NAME"] = $arResult["SECTION_NAME"];

    $cp->SetResultCacheKeys(array("SECTION_NAME"));
}