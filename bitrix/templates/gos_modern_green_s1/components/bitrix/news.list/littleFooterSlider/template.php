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
$this->setFrameMode(true);

?>

<div  class="col col-8" style="width:815px;  height:45px;">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"include_h3",
		array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc_h3",
			"EDIT_TEMPLATE" => "",
			"COMPONENT_TEMPLATE" => "include_h3",
			"PATH" => "/includes/littleFooterSlider.php"
		),
		false
	);?>
	
	<div style="width: 745px; margin:0 auto; margin-top: 30px; max-height:45px">
		<section class="regular1 slider" style="max-height:45px">

			<?
				foreach($arResult["ITEMS"] as $arItem)
				{
					?>
						<div>
							<a href="<?=$arItem["PROPERTIES"]["ATR_LINK"]["VALUE"]?>" target="_blank"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"></a>
						</div>
					<?
				}
			?>
		</section>
	</div>

	<script type="text/javascript">
		$(document).on('ready', function() {
			$(".regular1").slick({
				dots: true,
				infinite: true,
				speed: 300,
				slidesToShow: 3,
				variableWidth:true,
				centerMode:true,
			});
		});
	</script>
</div>
