<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$DIR = __DIR__;
$DIR = str_replace('\\','/',$DIR);

$month = array
(
	1  => GetMessage('CALENDAR_MONTH_1'),
	2  => GetMessage('CALENDAR_MONTH_2'),
	3  => GetMessage('CALENDAR_MONTH_3'),
	4  => GetMessage('CALENDAR_MONTH_4'),
	5  => GetMessage('CALENDAR_MONTH_5'),
	6  => GetMessage('CALENDAR_MONTH_6'),
	7  => GetMessage('CALENDAR_MONTH_7'),
	8  => GetMessage('CALENDAR_MONTH_8'),
	9  => GetMessage('CALENDAR_MONTH_9'),
	10 => GetMessage('CALENDAR_MONTH_10'),
	11 => GetMessage('CALENDAR_MONTH_11'),
	12 => GetMessage('CALENDAR_MONTH_12')
);

$templatePath = substr($DIR,strrpos($DIR,'/bitrix/templates/'));
$jsObject = array(
	'cats' => array(
		'NOW' => array(
			'name' => GetMessage('GID_NOW_EVENTS'),
			'pos' => 30,
		),
		'FUTURE' => array(
			'name' => GetMessage('GID_FEATURE_EVENTS'),
			'pos' => 60,
		),
		'OLD' => array(
			'name' => GetMessage('GID_OLD_EVENTS'),
			'pos' => 0,
		),
	),
	'events' => array(),
	'icon' => array(
		'address' =>$templatePath.'/images/events.png',
		'width' => 30,//Ширина иконки маркера
		'height' => 30,//Высота иконки маркера
		'offset' => 0//Смещение маркера вверх по вертикали
	),
	'cluster' => array(
		'grid' => 25,
		'color' => '#fff',
		'icon' =>$templatePath.'/images/cluster.png',
		'sizes' => array(50, 60, 74, 90),
	),
);

//$item = current($arResult["ITEMS"]);
//$init = array('lat'=>$item['PROPERTIES']['LAT']['VALUE'],'lng'=>$item['PROPERTIES']['LNG']['VALUE']);
$now = date('Y-m-d');

foreach($arResult["ITEMS"] as $arItem){
	if (empty ($arItem['PROPERTIES']['LAT']['VALUE']))
		continue;
	if (empty($arItem['DATE_ACTIVE_FROM']))
		$FROM=date('Y-m-d');
	else
		$FROM = date('Y-m-d',strtotime($arItem['DATE_ACTIVE_FROM']));

	if (empty($arItem['DATE_ACTIVE_TO']))
		$TO=date('Y-m-d');
	else
		$TO = date('Y-m-d',strtotime($arItem['DATE_ACTIVE_TO']));
	$category="OLD";
	if ($FROM>$now) {
		$category = 'FUTURE';
	}
	elseif ($FROM<=$now && $TO >= $now) {
		$category = 'NOW';
	}
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
	$fromArr = explode('-',$FROM);
	$fromArr[1] = intval($fromArr[1]);
	$fromArr[2] = intval($fromArr[2]);
	$toArr = explode('-',$TO);
	$toArr[1] = intval($toArr[1]);
	$toArr[2] = intval($toArr[2]);
	if ($fromArr[0]!=$toArr[0]) {
		$dateString = $fromArr[2].' '.$month[$fromArr[1]].' '.$fromArr[0].' - '.$toArr[2].' '.$month[$toArr[1]].' '.$toArr[0];
	}
	elseif ($fromArr[1]!=$toArr[1]) {
		$dateString = $fromArr[2].' '.$month[$fromArr[1]].' - '.$toArr[2].' '.$month[$toArr[1]].' '.$toArr[0];
	}
	elseif ($fromArr[2]!=$toArr[2]) {
		$dateString = $fromArr[2].' - '.$toArr[2].' '.$month[$toArr[1]].' '.$toArr[0];
	} else {
		$dateString = $fromArr[2].' '.$month[$fromArr[1]].' '.$fromArr[0];
	}
    
    $link = $arItem['PROPERTIES']['LINK']['VALUE'];
    $link = !empty($link) && strpos($link, "http")===false ? "http://".$link : $link;    

	$jsObject['events'][$category]['i'.$arItem['ID']] = array(
		'name' => $arItem['NAME'],
		'description' => $arItem['PREVIEW_TEXT'],
		'address' => $arItem['PROPERTIES']['ADDRESS']['VALUE'],
		'link' => $link,
		'url' => empty($arItem['DETAIL_TEXT'])?'':'detail_events.php?ID='.$arItem['ID'],
		'opening' => $arItem['PROPERTIES']['OPENING']['VALUE'],
		'date' => $dateString,
		'lat' => $arItem['PROPERTIES']['LAT']['VALUE'],
		'lng' => $arItem['PROPERTIES']['LNG']['VALUE'],
		'photo' => '',
	);
	if (!empty($arItem['PREVIEW_PICTURE']))
		$jsObject['events'][$category]['i'.$arItem['ID']]['photo'] = $arItem['PREVIEW_PICTURE']['SRC'];
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
		type: 'events',//При инициализации указываем тип (объекты objects, маршруты routes, события events)
		replaceRules: true, //Нужно или нет заменять прокрутку на кастомизированную
		height: 550
	});
</script>