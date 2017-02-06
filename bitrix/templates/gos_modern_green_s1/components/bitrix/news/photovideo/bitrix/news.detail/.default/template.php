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

<div class="col col-mb-12 page gallery-detail-page" >
	<?if(!empty($arResult['IMAGES'])):?>
		<h2>Фото</h2>
		<div class="col col-mb-12" id="wrapper">
			<?foreach($arResult['IMAGES'] as $arImage):?>
				<a class="col col-mb-3 my-photo fancybox" rel="gallery" href="<?=$arImage['BIG']?>" title="<?=$arResult['NAME']?>">
					<img src="<?=$arImage['MEDIUM']?>" alt="" />
				</a>
			<?endforeach;?>
		</div>
	<?endif;?>
	<?if(!empty($arResult['VIDEO'])):?>
		<h2>Видео</h2>


		<div class="col col-mb-12">
			<?foreach($arResult['VIDEO'] as $code):?>
				<div class="col col-mb-4 my-video">
					<div class="small-video">
						<div class="vidwrap" onclick="playSmall(this.id);" id="vidwrap-small-1">
							<img src="https://img.youtube.com/vi/<?=$code?>/hqdefault.jpg">
							<img class="video-button-play" src="<?= SITE_TEMPLATE_PATH ?>/images/video-small-play.png" alt="">
						</div>
					</div>
					<script type="text/javascript">
						function playSmall(id) {
							document.getElementById(id).innerHTML = '<iframe width="300" height="165" src="https://www.youtube.com/embed/<?=$code?>?autoplay=1" allowfullscreen frameborder="0"></iframe>';
						}
					</script>
				</div>
			<?endforeach;?>
		</div>
	<?endif;?>
</div>