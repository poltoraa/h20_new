<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
CModule::IncludeModule('iblock');
$this->setFrameMode(true);?>

<?
function FMbytes($size) {
	$size/=1024;
	$size/=1024;
	return $size;
}?>


<div class="col col-dt-12 novost-page page">
	<div class="content">

		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img
				class="fl-l"
				border="0"
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
		<?endif?>

		<?if($arResult["PROPERTIES"]["ATR_PODZAG"]["VALUE"][0]){?>
		<h2><?=$arResult["PROPERTIES"]["ATR_PODZAG"]["VALUE"][0]?></h2>
		<?}?>

		<div class="detail_text">
			<?=$arResult["DETAIL_TEXT"]?>
		</div>

		<?if (!empty($arResult["PROPERTIES"]["ATR_FILES"]["VALUE"])){?>
			<div class="col col-mb-left-1 col-mb-8">
				<h3>Прикреплённые файлы:</h3>
				<table class="table-doc">
					<tr>
						<th>Название</th>
						<th>Размер</th>
						<th>Файл</th>
					</tr>

					<?foreach ($arResult["PROPERTIES"]["ATR_FILES"]["VALUE"] as $i=>$arItem)
					{
						if(CModule::IncludeModule('iblock'))
							$arFile = CFile::GetFileArray($arItem);
						?>
						<tr>
							<?if ($arResult["PROPERTIES"]["ATR_FILES"]["DESCRIPTION"][$i] != ''){?>
								<td><?=$arResult["PROPERTIES"]["ATR_FILES"]["DESCRIPTION"][$i]?></td>
							<?}else{?>
								<td><?=$arFile["ORIGINAL_NAME"]?></td>
							<?}?>
							<td><?=round(FMbytes($arFile["FILE_SIZE"]),2)?> Мб.</td>
							<td><a href="<?=$arFile["SRC"]?>">Скачать</a></td>
						</tr>
					<?}?>

				</table>
			</div>
		<?}?>


	</div>

<!--	--><?//$APPLICATION->IncludeComponent(
//		"bitrix:main.share",
//		"main.share1",
//		Array(
//			"HANDLERS" => array(0=>"delicious",1=>"twitter",2=>"facebook",3=>"mailru",4=>"vk",5=>"lj",),
//			"HIDE" => "N",
//			"PAGE_TITLE" => "",
//			"PAGE_URL" => "",
//			"SHORTEN_URL_KEY" => "",
//			"SHORTEN_URL_LOGIN" => ""
//		)
//	);?>

<!--	<table class="social-buttons fl-r">-->
<!--		<tr>-->
<!--			<td class="icon mail"><a href="#0"></a></td>-->
<!--			<td class="icon facebook"><a href="#0"></a></td>-->
<!--			<td class="icon instagram"><a href="#0"></a></td>-->
<!--			<td class="icon odnoklassniki"><a href="#0"></a></td>-->
<!--			<td class="icon vkontakte"><a href="#0"></a></td>-->
<!--			<td class="icon twitter"><a href="#0"></a></td>-->
<!--		</tr>-->
<!--	</table>-->

	<div class="fl-r" style="margin-right: 120px;">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.share",
			"main.share1",
			Array(
				"HANDLERS" => array(0=>"delicious",1=>"twitter",2=>"facebook",3=>"mailru",4=>"vk",5=>"lj",),
				"HIDE" => "N",
				"PAGE_TITLE" => "",
				"PAGE_URL" => "",
				"SHORTEN_URL_KEY" => "",
				"SHORTEN_URL_LOGIN" => ""
			)
		);?>
	</div>

</div>

</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"detail_sovet", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "detail_sovet",
		"DETAIL_URL" => "/news/#ELEMENT_ID#/",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "26",
		"IBLOCK_TYPE" => "advice",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
	false
);?>
