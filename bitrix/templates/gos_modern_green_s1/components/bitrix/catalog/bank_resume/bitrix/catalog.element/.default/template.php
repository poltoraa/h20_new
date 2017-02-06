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

<p style="text-align: center; margin-bottom: 30px; width: 1100px; margin: 0 auto;">
	УВАЖАЕМЫЕ РАБОТОДАТЕЛИ! <br>
	Обращаем Ваше внимание на то, что уточнить информацию (получить доступ к резюме кандидатов) Вы можете у инспектора отдела содействия занятости населения обратившись по телефону: 266-39-40.
</p>
<div class="col col-mb-12 detail-resume-page page">
	<div class="col col-dt-3 col-mb-12">
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="" >
	</div>
	<?
		if ($arResult["PROPERTIES"]["ATR_SEX"]["VALUE"] == "Мужской") $sex = "Мужчина"; else $sex = "Женщина";
		$date = date('Y');
		$year = explode('.',$arResult["PROPERTIES"]["ATR_YEARBORN"]["VALUE"]);
		if ($arResult["PROPERTIES"]["ATR_VOZR"]["VALUE"])
	?>
	<p class="col col-dt-8 col-mb-12"><?=$sex?>,  лет: <?=$date - (integer)$year[2]?></p>
	<table class="detail-resume-table col col-dt-8 col-mb-12">
		<tr>
			<th>ID</th>
			<td colspan="2"><?=$arResult["ID"]?></td>
		</tr>

		<tr>
			<th>ФИО</th>
			<th>Желаемая зарплата</th>
			<th>Опыт работы</th>
		</tr>

		<tr>
			<td><?=$arResult["NAME"]?></td>
			<td><?=$arResult["PROPERTIES"]["ATR_ZARP"]["VALUE"][0]?> тысяч рублей</td>
			<td><?=$arResult["PROPERTIES"]["ATR_OPYT"]["VALUE"]?></td>
		</tr>

		<tr>
			<th>Предыдущие места работы:</th>
			<td colspan="2"><?=$arResult["PROPERTIES"]["ATR_LASTWORK"]["VALUE"]["TEXT"]?></td>
		</tr>

		<tr>
			<th>Желаемая должность</th>
			<td colspan="2"><?=$arResult["PROPERTIES"]["ATR_DOLJ"]["VALUE"]?></td>
		</tr>

		<tr>
			<th>Предпочитаемый график</th>
			<td colspan="2"><?=$arResult["PROPERTIES"]["ATR_GRAPH"]["VALUE"]?></td>
		</tr>

		<tr>
			<th>Тип занятости</th>
			<td colspan="2"><?=$arResult["PROPERTIES"]["ATR_TIP"]["VALUE"]?></td>
		</tr>

		<tr>
			<th>Отдельные условия</th>
			<td colspan="2"><?=$arResult["PROPERTIES"]["ATR_USLOV"]["VALUE"]["TEXT"]?></td>
		</tr>

		<tr>
			<th>Профессиональная область</th>
			<td colspan="2"><?=$arResult["PROPERTIES"]["ATR_PROF"]["VALUE"]?></td>
		</tr>

		<tr>
			<th>Образование</th>
			<td colspan="2"><?=$arResult["PROPERTIES"]["ATR_EDUCAT"]["VALUE"]?></td>
		</tr>

	</table>



</div>



