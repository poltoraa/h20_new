<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!empty($arResult['ITEMS'])){
	foreach($arResult['ITEMS'] as &$arItem){
		$arItem['PREVIEW_PICTURE'] = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>240, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		
	}
	unset($arItem);
}