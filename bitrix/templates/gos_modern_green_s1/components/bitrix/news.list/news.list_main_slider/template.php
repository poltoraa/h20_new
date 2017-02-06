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

<div class="col col-mb-12 mb-hide main-slider">
	<div style="display:none;" class="html5gallery" data-skin="light" data-width="918.5" data-height="465">

		<?
		foreach ($arResult["ITEMS"] as $arItem)
		{
			?>
				<a href="<?=$arItem["PROPERTIES"]["ATR_LINK"]["VALUE"]?>">
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PROPERTIES"]["ATR_DESC"]["VALUE"]?>">
				</a>
			<?
		}
		?>

	</div>
</div>
