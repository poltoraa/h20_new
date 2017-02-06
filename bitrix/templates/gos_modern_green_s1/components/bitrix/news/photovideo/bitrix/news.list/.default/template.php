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

<div class="col col-mb-12 page gallery">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="gallery-item col col-mb-12 col-dt-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
				<img src="<?=$arItem['PREVIEW_PICTURE']['src']?>" alt="">
			</a>
			<div>
				<span class="news-item-date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
				<p><?=$arItem['NAME']?></p>
			</div>
		</div>
	<?endforeach;?>
</div>
