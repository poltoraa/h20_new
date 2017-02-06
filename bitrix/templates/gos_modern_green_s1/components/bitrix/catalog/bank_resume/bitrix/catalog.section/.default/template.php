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
			<tr><a href="#0">
				<td><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></td>
				<td>
					<h2><?=$arItem["NAME"]?></h2>
					<p>
						Опыт работы1111 <br>
						<?=$arItem["PROPERTIES"]["ATR_OPYT"]["VALUE"]?> <br>
						Последнее место работы: <br>
						<?=$arItem["PROPERTIES"]["ATR_DOLJ"]["VALUE"]?>, <span> <?=$arItem["PROPERTIES"]["ATR_SROC"]["VALUE"]?></span> <br>
						<?=$arItem["PROPERTIES"]["ATR_LAST_WORK"]["VALUE"]?> <br>
						<span>Обновлено <?=$arItem["TIMESTAMP_X"]?></span>
					</p>
				</td>
				<td>
					<?=$arItem["PROPERTIES"]["ATR_ZARP"]["VALUE"]?>
				</td>
				<td><?=$arItem["PROPERTIES"]["ATR_VOZR"]["VALUE"]?> лет</td></a>
			</tr>
			<?
		}
		?>

	</table>
</div>

