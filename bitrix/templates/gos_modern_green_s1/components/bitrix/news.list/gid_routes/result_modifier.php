<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php

$iblock = COption::GetOptionString("bitrix.gossite", "routes_types_ib", 0, SITE_ID);
$arResult['ROUTE_TYPES'] = array();
if (intval($iblock)>0) {
	$rsCats = CIBlockElement::GetList(array('NAME'=>'ASC'),array('IBLOCK_ID'=>intval($iblock)),false,false,array('ID','NAME','CODE'));
	while($arCat = $rsCats->GetNext()) {
		$arResult['ROUTE_TYPES']['c'.$arCat['ID']] = array(
			'name'=>$arCat['NAME'],
			'pos' => intval($arCat['CODE']),
		);
	}
}

$rsCats = CIBlockSection::GetList(array('NAME'=>'ASC'),array('ACTIVE'=>'Y','IBLOCK_ID'=>$arParams['IBLOCK_ID']),false,array('ID','NAME','UF_ROUTE_TYPE','UF_CLOSED'));
$arResult['SECTIONS'] = array();
while($arCat = $rsCats->GetNext()) {
	$arResult['SECTIONS'][$arCat['ID']][] = array(
		'NAME' => $arCat['NAME'],
		'TID' => array_shift($arCat['UF_ROUTE_TYPE']),
		'CLOSED' => $arCat['UF_CLOSED'],
	);
}
?>