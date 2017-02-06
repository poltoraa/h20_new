<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arImage = array();
$arVideo = array();
if(!empty($arResult['PROPERTIES']['IMAGES']['VALUE'])){
	foreach($arResult['PROPERTIES']['IMAGES']['VALUE'] as $image){
		//$arItem['PREVIEW_PICTURE'] = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>240, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$medium = CFile::ResizeImageGet($image, array('width'=>220, 'height'=>145), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$big = CFile::ResizeImageGet($image, array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$arImage[] = array(
			'MEDIUM' => $medium['src'],
			'BIG' => $big['src']
		);
	}
}
if(!empty($arResult['PROPERTIES']['VIDEO']['VALUE'])){
	foreach($arResult['PROPERTIES']['VIDEO']['VALUE'] as $video){
		if(strpos($video, 'http://youtu.be/') !== false){
			$code = explode('/youtu.be/', $video);
			$code = $code[1];
		}
		elseif(strpos($video, 'iframe') !== false){
			$code = explode('/embed/', $video);
			$code = explode('"', html_entity_decode($code[1]));
			$code = $code[0];
		}
		elseif(strpos($video, 'watch?v=') !== false){
			$code = explode('watch?v=', $video);
			$code = $code[1];
		}
		else{
			$code = $video;
		}
		$arVideo[] = $code;
	}
}
$arResult['IMAGES'] = $arImage;
$arResult['VIDEO'] = $arVideo;