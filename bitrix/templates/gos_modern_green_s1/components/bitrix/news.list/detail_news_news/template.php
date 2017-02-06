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


<div class="news-other-wrapper">
	<div class="double-header-block clearfix">
		<h2 class="double-header">Другие новости
		</h2>
		<br>
		<div class="double-header-link">
			<a href="/news/">Все новости</a><i class="icon icon-arrow-right"></i>
		</div>
	</div>
	<div class="col col-dt-12 news-other">
		<div class="content primary-border-box white-box" style="margin: 0">
			<?
			foreach ($arResult["ITEMS"] as $arItem)
			{
				?>
					<div class="fl-l col-dt-4 news-other-item">
						<div class="news-other-image">
							<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="Картинка">
						</div>
						<div class="news-other-item-date"><?=$arItem["ACTIVE_FROM"]?></div>
						<div class="news-other-text"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
					</div>
				<?
			}
			?>
		</div>
	</div>
</div>