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

<div class="bottom-slider mb-hide tablet-hide">
	<div class="col col-12" style="margin-bottom: 34px; margin-top:17px;">
		<div style="height:76px; width:1165px;">
			<section class="regular slider">

				<?
					foreach($arResult["ITEMS"] as $arItem)
					{
						?>
							<div>
								<a href="<?=$arItem["PROPERTIES"]["ATR_LINK"]["VALUE"]?>" target="_blank"><img src="<?=$arItem["MY_PICTURE"]["src"]?>"></a>
							</div>
						<?
					}
				?>
			</section>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on('ready', function () {
		$(".regular").slick({
			dots: true,
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 1
		});

	});
</script>