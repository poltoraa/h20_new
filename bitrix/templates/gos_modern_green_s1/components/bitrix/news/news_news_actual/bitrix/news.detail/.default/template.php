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
<?
$GLOBALS['myArfilter'] = array('!ID' => $arResult['ID']);
?>
