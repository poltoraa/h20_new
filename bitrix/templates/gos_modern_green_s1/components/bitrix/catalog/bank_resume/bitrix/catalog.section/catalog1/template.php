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
$this->setFrameMode(true);?>


<div class="col col-mb-12 white-box">
	<h3>Последние опубликованные резюме</h3>
	<table>
		<?
		foreach ($arResult["ITEMS"] as $arItem)
		{
			$year = explode('.',$arItem["PROPERTIES"]["ATR_YEARBORN"]["VALUE"]);
			$date = date('Y');
			?>

			<tr>
				<?

					if (($arItem["DETAIL_PICTURE"]["SRC"])=='')
					{
						$arItem["DETAIL_PICTURE"]["SRC"] = "/images/no-image.png";
						?><td><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt=""></a></td><?

					}
					else
					{
						?><td><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="" width="<?=$arElement["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arElement["DETAIL_PICTURE"]["HEIGHT"]?>"></a></td><?
					}
				?>
					<td>
						<a style="width: inherit; height: inherit;" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
							<h2>
								<?= $arItem["PROPERTIES"]["ATR_DOLJ"]["VALUE"] ?>
							</h2>
							<p>
								Опыт работы <br>
								<?= $arItem["PROPERTIES"]["ATR_OPYT"]["VALUE"] ?> <br>
								Последнее место работы: <br>
								<?= $arItem["PROPERTIES"]["ATR_LASTWORK"]["VALUE"]["TEXT"] ?><br>
								Сфера деятельности: <?= $arItem["PROPERTIES"]["ATR_PROF"]["VALUE"] ?><br>
								<span>Обновлено <?= $arItem["TIMESTAMP_X"] ?></span>
							</p>
						</a>
					</td>
					<td>
						<a style="width: inherit; height: inherit;" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"></a>
						<?//кол-во лет?>
					</td>
					<td>
						<a style="width: inherit; height: inherit;" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
						Возраст: <?=$date - (integer)$year[2]?>
						</a>
					</td>

			</tr>
			<?
		}
		?>

	</table>
</div>

