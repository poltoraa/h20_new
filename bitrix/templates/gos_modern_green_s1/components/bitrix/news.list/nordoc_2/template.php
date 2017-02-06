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
<?$count = -1;?>

<div class="col col-mb-12 white-box normativnye-dokumenty-page">
	<h3>Нормативные документы</h3>
		<ul class="col col-dt-6 col-mb-12">
			<?foreach ($arResult["ITEMS"] as $arItem){
				$count++;
				if ($count <= 3){?>
					<li><a href="<?=$arResult["ITEMS"][$count]["DETAIL_PAGE_URL"]?>"><i class="new-sprite-icon two-arrows"></i><?=$arResult["ITEMS"][$count]["NAME"]?></a></li>
				<?}else break;
			}?>
		</ul>
		<?if ($count == 3){?>
			<ul class="col col-dt-6 col-mb-12">
				<?foreach ($arResult["ITEMS"] as $arItem){
					$count++;?>
					<li><a href="<?=$arResult["ITEMS"][$count]["DETAIL_PAGE_URL"]?>"><i class="new-sprite-icon two-arrows"></i><?=$arResult["ITEMS"][$count]["NAME"]?></a></li>
					<? if ($count+1 == 6){ break; }
				}?>
			</ul>
		<?}?>

</div>