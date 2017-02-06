<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="my-search-block">
	
	<form action="" method="get">
		<?
		if ($arParams["USE_SUGGEST"] === "Y"):
			if (strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"])) {
				$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
				$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
				$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
			}?>

			<? $APPLICATION->IncludeComponent(
			"bitrix:search.suggest.input",
			"",
			array(
				"NAME" => "q",
				"VALUE" => $arResult["REQUEST"]["~QUERY"],
				"INPUT_SIZE" => 40,
				"DROPDOWN_SIZE" => 10,
				"FILTER_MD5" => $arResult["FILTER_MD5"],
			),
			$component, array("HIDE_ICONS" => "Y")
		); ?>
		<? else: ?>

			<div class="col col-dt-10 col-mb-12">
				<input class="col-dt-11 col-mb-12 search-form" type="search" name="q" value="<?= $arResult["REQUEST"]["QUERY"] ?>"  size="40"/>
			</div>

		<? endif; ?>

			<div class="col col-dt-2 col-mb-12">
					<input class="my-search-button" type="submit" value="Найти"/>
			</div>

		<input type="hidden" name="how" value="<? echo $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>"/>


	</form>

	<br/>

</div>
