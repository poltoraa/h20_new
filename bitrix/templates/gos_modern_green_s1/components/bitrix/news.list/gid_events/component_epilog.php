<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$GLOBALS["APPLICATION"]->AddHeadString('<script src="https://maps.google.com/maps/api/js?sensor=false&language=ru"></script>');
$GLOBALS["APPLICATION"]->AddHeadString('<script src="/bitrix/js/gossite/gid/markerclusterer.js"></script>');
$GLOBALS["APPLICATION"]->AddHeadString('<script src="/bitrix/js/gossite/gid/iscroll.js"></script>');
$GLOBALS["APPLICATION"]->AddHeadString('<script src="/bitrix/js/gossite/gid/map.js"></script>');

$DIR = __DIR__;
$DIR = str_replace('\\','/',$DIR);

$templatePath = substr($DIR,strrpos($DIR,'/bitrix/templates/'));

$GLOBALS["APPLICATION"]->AddHeadString('<!--[if lt IE 9]><link href="'.$templatePath.'/ie_map.css" rel="stylesheet" /><![endif]-->');

?>
<?if (isset($_REQUEST['ID']) && intval($_REQUEST['ID'])>0):?>
	<script>
		$(document).ready(function(){
			var point = $('[data\-id~="i<?=intval($_REQUEST['ID'])?>"]');
			if (point != undefined) {
				var catID = point.parent().data('id');
				$('[data\-id~="'+catID+'"]').filter('.map-category-item').click();
				point.find('[data\-action~="geo"]').click();
			}
		});
	</script>
<?endif;?>