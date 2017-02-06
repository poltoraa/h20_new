<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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


<!--<pre>--><?//print_r($arResult);?><!--</pre>-->
<div class=" col col-mb-12 col-12 col-dt-6">
	<div class="news">

		<div class="double-header-block clearfix">
			<h2 class="double-header">Советы специалистов</h2>
			<div class="double-header-link">
				<a href="/sovety-spetsialistov">Все советы</a><i class="icon icon-arrow-right"></i>
			</div>
		</div>

		<div class="content white-box primary-border-box">
			<div class=" col col-mb-12 col-12 col-dt-12" style="padding-bottom: 55px;">

				<?
				foreach ($arResult["ITEMS"] as $arItem)
				{
					$temp = $arItem["ACTIVE_FROM"];
					$temp = explode(" ", $temp);
					?>
					<div class="padding-box">

						<div class="news-item news-item-main">
							<div class="news-item-image mb-hide">
								<h3 class="h2 mb-block">
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
								<div class="big-image-col">
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
										<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?= $arItem["NAME"]?>">
									</a>
								</div>
							</div>

							<!-- .news-item-image -->
							<div class="news-item-date">
								<?=$temp[0]?>
							</div>

							<div class="news-item-text">
								<a
									href="<?=$arItem["DETAIL_PAGE_URL"]?>">
									<?=$arItem["NAME"]?><br>
									<p>
										<?$text = $arItem["PREVIEW_TEXT"];
										if (strlen($text)>100)
										{
											$text = substr ($text, 0, strpos ($text, " ", 25));
										}?>
										<?=$text?>
									</p>
								</a>
							</div>
							<!-- .news-item-text -->
						</div>
						<!-- .news-item news-item-main -->

					</div>
					<?
				}
				?>

			</div>
		</div>
	</div>
</div>
