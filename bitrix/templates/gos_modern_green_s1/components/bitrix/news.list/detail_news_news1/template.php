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


<div class="col col-mb-12 news-other-wrapper">
	<div class="double-header-block clearfix">
		<h2 class="double-header">Другие новости
		</h2>
		<div class="double-header-link">
			<a href="/news/">Все новости</a><i class="icon icon-arrow-right"></i>
		</div>
	</div>
	<div class="col col-dt-12 news-other">
		<div class="regular3 slider content primary-border-box white-box" style="margin: 0; height: 315px;">
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

<script type="text/javascript">
	$(document).on('ready', function() {
		$(".regular3").slick({
			dots: true,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
		});
	});
</script>