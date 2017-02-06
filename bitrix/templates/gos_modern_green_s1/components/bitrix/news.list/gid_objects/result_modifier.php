<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$rsCats = CIBlockSection::GetList(array('NAME'=>'ASC'),array('IBLOCK_ID'=>$arParams['IBLOCK_ID']),false,array('ID','NAME','CODE'));
$arResult['SECTIONS'] = array();
while($arCat = $rsCats->GetNext()) {
	$arResult['SECTIONS']['s'.$arCat['ID']] = array(
		'name'=>$arCat['NAME'],
		'pos' => intval($arCat['CODE']),
	);
}
?>