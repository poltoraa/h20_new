<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$DIR = __DIR__;
$DIR = str_replace('\\','/',$DIR);

$templatePath = substr($DIR,strrpos($DIR,'/bitrix/templates/'));
$jsObject = array(
	'cats' => $arResult['ROUTE_TYPES'],
	'routes' => array(),
	'icon' => array(
		'address' =>$templatePath.'/images/routes.png',
		'width' => 30,//Ширина иконки маркера
		'height' => 38,//Высота иконки маркера
		'offset' => 0//Смещение маркера вверх по вертикали
	),
	'cluster' => array(
		'grid' => 25,
		'color' => '#fff',
		'icon' =>$templatePath.'/images/cluster.png',
		'sizes' => array(50, 60, 74, 90),
	),
	'path' => array(
		'width' => 4,//Ширина линии
		'color' => '#4f84b0',//Цвет линии
		'opacity' => '0.7',//Непрозрачность линии
		'colorActive' => '#ec473b',
		'opacityHover' => 1,
	),

);
foreach($arResult["ITEMS"] as $arItem){
	$typeArray = $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']];
	$rootID = 's'.$arItem['IBLOCK_SECTION_ID'];
	if (is_array($arItem["PREVIEW_PICTURE"])) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
			$arItem['PREVIEW_PICTURE'],
			array("width" => 300, "height" => 400),
			BX_RESIZE_IMAGE_PROPORTIONAL,
			true, $arFilter
		);
		$arItem['PREVIEW_PICTURE']['WIDTH'] = $arFileTmp["width"];
		$arItem['PREVIEW_PICTURE']['HEIGHT'] = $arFileTmp["height"];
		$arItem['PREVIEW_PICTURE']['SRC'] = $arFileTmp["src"];
	}
	foreach ($typeArray as $cat) {
		$tid = $cat['TID'];
		if (is_array($jsObject['routes']['c'.$tid]) && array_key_exists($rootID,$jsObject['routes']['c'.$tid])) {
			$jsObject['routes']['c'.$tid][$rootID]['subitems'][] = array(
				'name' => $arItem['NAME'],
				'description' => empty($arItem['PREVIEW_TEXT'])?' ':$arItem['PREVIEW_TEXT'],
				'address' => $arItem['PROPERTIES']['ADDRESS']['VALUE'],
				'lat' => $arItem['PROPERTIES']['LAT']['VALUE'],
				'lng' => $arItem['PROPERTIES']['LNG']['VALUE'],
				'link' => '',
				'url' => empty($arItem['DETAIL_TEXT'])?'':'detail_routes.php?ID='.$arItem['ID'],
				'photo' => !empty($arItem['PREVIEW_PICTURE'])?$arItem['PREVIEW_PICTURE']['SRC']:'',
			);
		}
		else {
			$jsObject['routes']['c'.$tid][$rootID] = array(
				'name' => $cat['NAME'],
				'description' => $arItem['NAME'].'<br>'.$arItem['PREVIEW_TEXT'],
				'address' => $arItem['PROPERTIES']['ADDRESS']['VALUE'],
				'lat' => $arItem['PROPERTIES']['LAT']['VALUE'],
				'link' => '',
				'url' => '',
				'lng' => $arItem['PROPERTIES']['LNG']['VALUE'],
				'photo' => !empty($arItem['PREVIEW_PICTURE'])?$arItem['PREVIEW_PICTURE']['SRC']:'',
				'closed' => (boolean)$cat['CLOSED'],
				'subitems' => array(
				),
			);
		}
	}
}
?>

<!--Блок с картой и 2-мя панелями-->
<div class="map-container" data-container="list">
	<div class="map-canvas"></div>

	<!--Левая панель с категориями и фильтром-->
	<dl class="map-section map-filter" data-container="collapse">

		<!--Шапка левой панели-->
		<dt class="map-section-head">
			<span class="map-section-title map-hide" data-action="collapse" data-type="hide">&#x2190; <?=GetMessage('GID_FILTER_COLLAPSE')?></span>
			<span class="map-section-title map-show" data-action="collapse" data-type="show"><?=GetMessage('GID_FILTER_CATEGORY')?></span>
		</dt>

		<!--Тело левой панели-->
		<dd class="map-section-body" data-target="collapse" data-container="select">

			<!--Фильтр-->
			<form class="map-filter-form" data-container="refresh">
				<input type="text" class="map-filter-input" data-action="select" placeholder="Поиск. Например, Арбат">
				<div class="map-filter-field">
					<button type="button" class="map-filter-clear" data-action="clear"><?=GetMessage('GID_FILTER_CLEAR_FIELD')?></button>
					<button type="submit" class="map-filter-refresh" data-action="refresh"><?=GetMessage('GID_FILTER_UPDATE_MARKERS')?></button>
				</div>
			</form>

			<!--Конструкция для кастомизации прокрутки-->
			<div class="map-scroll-wrapper" data-container="scroll" data-target="select">
				<div class="map-scroll-container" data-target="scroll">
					<div class="map-scroll" data-info="scroll"></div>
				</div>
			</div>

			<!--Выезжающая кнопка отмены выбора-->
			<div class="map-list-clear" data-container="clear">
				<button type="button" class="map-clear-button" data-action="clear"><?=GetMessage('GID_FILTER_CANCEL_SELECTION')?></button>
			</div>
		</dd>
	</dl>

	<!--Правая панель с элементами категорий-->
	<dl class="map-section map-list" data-container="collapse">

		<!--Шапка правой панели-->
		<dt class="map-section-head">
			<span class="map-section-title map-hide" data-action="collapse" data-type="hide"><?=GetMessage('GID_FILTER_CLOSE')?></span>
			<span class="map-section-title map-show" data-action="collapse" data-type="show"><?=GetMessage('GID_FILTER_BY_LIST')?></span>
		</dt>

		<!--Тело правой панели-->
		<dd class="map-section-body" data-target="collapse">

			<!--Конструкция для кастомизации прокрутки-->
			<div class="map-scroll-wrapper" data-container="scroll variable">
				<div class="map-scroll-container" data-target="scroll">
					<div class="map-scroll" data-info="scroll" data-target="list"></div>
				</div>
			</div>
		</dd>
	</dl>
</div>

<!--Скрипт с данными и вызовом построения-->

<script>
$GeoMapp.data = <?echo CGovernment::PhpToJsObject($jsObject)?>;

$GeoMapp.init({
	type: 'objects',//При инициализации указываем тип (объекты objects, маршруты routes, события events)
	replaceRules: true, //Нужно или нет заменять прокрутку на кастомизированную
	height: 550
});
</script>