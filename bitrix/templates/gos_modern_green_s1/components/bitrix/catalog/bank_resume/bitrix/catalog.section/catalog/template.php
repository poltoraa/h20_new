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

<div class="col col-dt-9 white-box">
	<table>
		<?
		foreach ($arResult["ITEMS"] as $arItem)
		{
			?>
			<tr>
				<td><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt=""></a></td>
				<td>
					<h2><?=$arItem["NAME"]?></h2>
					<p>
						Опыт работы<br>
						<?=$arItem["PROPERTIES"]["ATR_OPYT"]["VALUE"]?> <br>
						Последнее место работы: <br>
						<?=$arItem["PROPERTIES"]["ATR_DOLJ"]["VALUE"]?>, <span> <?=$arItem["PROPERTIES"]["ATR_SROC"]["VALUE"]?></span> <br>
						<?=$arItem["PROPERTIES"]["ATR_LAST_WORK"]["VALUE"]?> <br>
						<span>Обновлено <?=$arItem["TIMESTAMP_X"]?></span>
					</p>
				</td>
				<td>
					<?=$arItem["PROPERTIES"]["ATR_ZARP"]["VALUE"][0]?>
				</td>
				<td><?=$arItem["PROPERTIES"]["ATR_VOZR"]["VALUE"]?></td>
			</tr>
			<?
		}
		?>

	</table>
</div>
<div style="text-align: center;margin-top: 25px;">
    <a style="display: inline-block;margin-top: 20px;" href="/bank-resume/">Назад</a>
</div>