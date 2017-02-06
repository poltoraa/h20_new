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

<div class="col col-mb-12 vacancies-day">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"include_h3",
		array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc_h3",
			"EDIT_TEMPLATE" => "",
			"COMPONENT_TEMPLATE" => "include_h3",
			"PATH" => "/includes/positionOfTheDay.php"
		),
		false
	);?>

	<div class="left-slider-box">
		<div class="left-slider">

			<?
			$count = 0;
			foreach ($arResult["ITEMS"] as $item) {
				$count++;
				?>

				<div class="left-slider-item" id="slide<?=$count?>" alink="/vakansiya-dnya/<?//=$item["DETAIL_PAGE_URL"]?>">
                    <a href="/vakansiya-dnya/<?//=$item["DETAIL_PAGE_URL"]?>">
                        <p class="name">
                            <?=$item["NAME"]?>
                        </p>
                        <p class="price">
                           <span>з/п</span> <?=$item["PROPERTIES"]["SALARY"]["VALUE"]?> <span class="rub"></span>
                        </p>
                    </a>
				</div>

				<?
			}
			?>

		</div>
	</div>
	<a class="my-button" href="">Узнать сейчас</a>
</div>

<?/*?><pre><?  print_r($arResult["ITEMS"]); ?></pre> <?*/?>

<script>
/*
	$(function () {
		var n = 0;
		var i = 0;
		<?/*var arrayHref = new Array(<?foreach ($arResult["ITEMS"] as $item) {?>"<?=$item["PROPERTIES"]["ATR_LINK"]["VALUE"]?>", <?} ?>0);*/?>
		var arrayHref = [];

        <?/*foreach($arResult["ITEMS"] as $item){?>
            arrayHref[arrayHref.length] = "<?=$item["DETAIL_PAGE_URL"]?>";
        <?}*/?>
        arrayHref[arrayHref.length] = 0;

        console.log(arrayHref);

		var flag = true;
		while (flag) {
			if (arrayHref[i] != 0) {
                i++;
            }else {
                flag = false;
            }
		}
		n = i;
		i = 0;
		// Интервал смены слайдов.
		$(".my-button").attr("href", arrayHref[i++]);
		interval = 4000;
		//setInterval('checkIfToChange()', interval);                    // Запускается функция animation(), выполняющая смену слайдов.

	});

	function checkIfToChange() {
		if (i == n)
			i = 0;
		if ($(".left-slider").hasClass("timeToChange")) {
			$(".my-button").attr("href", arrayHref[i++]);
			$(".left-slider").removeClass("timeToChange");
		}
	}
*/
</script>



