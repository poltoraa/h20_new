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

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/colors.css',
	'TEMPLATE_CLASS' => 'bx-' . $arParams['TEMPLATE_THEME']
);

if (isset($templateData['TEMPLATE_THEME'])) {
	$this->addExternalCss($templateData['TEMPLATE_THEME']);
}
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
?>

<?/*
<!--<div class="col col-dt-3 col-mb-12 left-filter">-->
<!--	<div class="white-box primary-border-box">-->
<!--		<ul class="left-filter-ul">-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Заработная плата</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="checkbox" name="a" id="a1" value="a1">-->
<!--						<div><label for="a1"><span>Указана</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="a" id="a2" value="a2">-->
<!--						<div><label for="a2"><span>От 30 000 рублей</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="a" id="a3" value="a3">-->
<!--						<div><label for="a3"><span>От 60 000 рублей</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="a" id="a4" value="a4">-->
<!--						<div><label for="a4"><span>От 100 000 рублей</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Опыт работы</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="radio" name="b" id="b1" value="b1">-->
<!--						<div><label for="b1"><span>От 1 года до 3 лет</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="radio" name="b" id="b2" value="b2">-->
<!--						<div><label for="b2"><span>От 3 до 6 лет</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="radio" name="b" id="b3" value="b3">-->
<!--						<div><label for="b3"><span>Нет опыта</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="radio" name="b" id="b4" value="b4">-->
<!--						<div><label for="b4"><span>Более 6 лет</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Возраст</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="radio" name="c" id="c1" value="c1">-->
<!--						<div><label for="c1"><span>До 25 лет</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="radio" name="c" id="c2" value="c2">-->
<!--						<div><label for="c2"><span>От 25 лет до 50 лет</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="radio" name="c" id="c3" value="c3">-->
<!--						<div><label for="c3"><span>От 50 лет</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Тип занятости</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="checkbox" name="d" id="d1" value="d1">-->
<!--						<div><label for="d1"><span>Полная занятость</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="d" id="d2" value="d2">-->
<!--						<div><label for="d2"><span>Частичная занятость</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="d" id="d3" value="d3">-->
<!--						<div><label for="d3"><span>Проектная работа</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="d" id="d4" value="d4">-->
<!--						<div><label for="d4"><span>Стажировка</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>График работы</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="checkbox" name="e" id="e1" value="e1">-->
<!--						<div><label for="e1"><span>Полный день</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="e" id="e2" value="e2">-->
<!--						<div><label for="e2"><span>Гибкий график</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="e" id="e3" value="e3">-->
<!--						<div><label for="e3"><span>Удалённая работа</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="checkbox" name="e" id="e4" value="e4">-->
<!--						<div><label for="e4"><span>Сменный график</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Пол</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="radio" name="f" id="f1" value="f1">-->
<!--						<div><label for="f1"><span>Мужской</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="radio" name="f" id="f2" value="f2">-->
<!--						<div><label for="f2"><span>Женский</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Образование</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<select name="g" id="g1">-->
<!--							<option selected value="g11">Все</option>-->
<!--							<option value="g12">Я</option>-->
<!--							<option value="g13">не</option>-->
<!--							<option value="g14">знаю</option>-->
<!--							<option value="g15">что</option>-->
<!--							<option value="g16">здесь</option>-->
<!--							<option value="g17">должно</option>-->
<!--							<option value="g18">быть.</option>-->
<!--							<option value="g19">Ведь</option>-->
<!--							<option value="g20">я</option>-->
<!--							<option value="g21">верстальщик,</option>-->
<!--							<option value="g22">а</option>-->
<!--							<option value="g23">не</option>-->
<!--							<option value="g24">экстрасенс.</option>-->
<!--						</select>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Ограничение по здоровью</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="radio" name="h" id="h1" value="h1">-->
<!--						<div><label for="h1"><span>Инвалидность</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Семейное положение</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<input type="radio" name="i" id="i1" value="i1">-->
<!--						<div><label for="i1"><span>Замужем / Женат</span></label></div>-->
<!--					</li>-->
<!--					<li>-->
<!--						<input type="radio" name="i" id="i2" value="i2">-->
<!--						<div><label for="i2"><span>Холост</span></label></div>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--			<li>-->
<!--				<h3>Профессиональная область</h3>-->
<!--				<ul>-->
<!--					<li>-->
<!--						<select name="j" id="j1">-->
<!--							<option selected value="j11">Все</option>-->
<!--							<option value="j12">IT, Телеком</option>-->
<!--							<option value="j13">Начало карьеры</option>-->
<!--							<option value="j14">Производство</option>-->
<!--							<option value="j15">Наука, образование</option>-->
<!--							<option value="j16">Продажа</option>-->
<!--							<option value="j17">Бухгалтерия</option>-->
<!--							<option value="j18">Топ-менеджмент</option>-->
<!--							<option value="j19">Искусство, медиа</option>-->
<!--						</select>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!---->
<!---->
<!--		</ul>-->
<!--	</div>-->
<!--</div>-->
<!---->
<!---->
<!---->
*/?>
<!--<pre>--><?//print_r($arResult)?><!--</pre>-->

<div class="col col-dt-3 col-mb-12 left-filter">
	<div class="white-box primary-border-box">

		<form
			name="<?=$arResult["FILTER_NAME"]."_form"?>"
			action="<?=$arResult["FORM_ACTION"] ?>"
		    method="get" class="smartfilter">

			<? foreach ($arResult["HIDDEN"] as $arItem): ?>
				<input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>"
				       value="<? echo $arItem["HTML_VALUE"] ?>"/>
			<? endforeach; ?>

			<ul class="left-filter-ul">

				<? foreach ($arResult["ITEMS"] as $key => $arItem)
				{
					if (empty($arItem["VALUES"])) continue;
					$arCur = current($arItem["VALUES"]); /*вернули текущий элемент массива*/

					switch ($arItem["DISPLAY_TYPE"])
					{
						//DROPDOWN
						case "P":
							$checkedItemExist = false;
							?>
							<li>
								<h3><?= $arItem["NAME"] ?></h3>
								<ul>
									<select name="<?= $ar["CONTROL_ID"] ?>" id="label_<?= $ar["CONTROL_ID"] ?>">


										<? foreach ($arItem["VALUES"] as $val => $ar):
											$class = "";
											if ($ar["CHECKED"])
												$class .= " selected";
											if ($ar["DISABLED"])
												$class .= " disabled";
											?>
											<label for="<?= $ar["CONTROL_ID"] ?>"
											       class="bx-filter-param-label<?= $class ?>"
											       data-role="label_<?= $ar["CONTROL_ID"] ?>"
											       onclick="false">
												<option value="" data_id="<?=$ar["CONTROL_ID"]?>"><?= $ar["VALUE"] ?></option>
											</label>

											</li>
										<?endforeach ?>


									</select>

									<?foreach ($arItem["VALUES"] as $val => $ar):?>
										<input
											style="display: none"
											type="radio"
											name="<?=$ar["CONTROL_NAME_ALT"]?>"
											id="<?=$ar["CONTROL_ID"]?>"
											value="<? echo $ar["HTML_VALUE_ALT"] ?>"
											<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
										/>
									<?endforeach?>


								</ul>
							</li>

							<?
							break;

						//RADIO_BUTTONS
						case "K"://RADIO_BUTTONS
							?>

							<? foreach ($arItem["VALUES"] as $val => $ar):?>
							<li>
								<h3><?= $arItem["NAME"] ?></h3>
								<ul>

									<li>
										<input
											type="radio"
											value=""
											name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
											id="<? echo "all_" . $arCur["CONTROL_ID"] ?>"
											onclick="smartFilter.click(this)"
										/>
										<div>
											<label class="bx-filter-param-label"
											       for="<? echo "all_" . $arCur["CONTROL_ID"] ?>">
												<span><?= $ar["VALUE"] ?></span>
											</label>
										</div>
									</li>
								</ul>
							</li>
						<?endforeach; ?>
							<? break; ?>
							<?

						//CHECKBOX
						default:
							?>
							<li>
								<h3><?= $arItem["NAME"] ?></h3>
								<ul>
									<? foreach ($arItem["VALUES"] as $val => $ar) {
										?>
										<!--										<pre>--><? //print_r($ar)
										?><!--</pre>-->
										<li>
											<input type="checkbox"
											       value="<? echo $ar["HTML_VALUE"] ?>"
											       name="<? echo $ar["CONTROL_NAME"] ?>"
											       id="<? echo $ar["CONTROL_ID"] ?>"
												<? echo $ar["CHECKED"] ? 'checked="checked"' : '' ?>
											/>
											<div>
												<label data-role="label_<?= $ar["CONTROL_ID"] ?>"
												       class="bx-filter-param-label <? echo $ar["DISABLED"] ? 'disabled' : '' ?>"
												       for="<? echo $ar["CONTROL_ID"] ?>">
													<span><?= $ar["VALUE"] ?></span>
												</label>
											</div>
											<? /*											<label data-role="label_--><?=$ar["CONTROL_ID"]?><!--" class="bx-filter-param-label --><? echo $ar["DISABLED"] ? 'disabled': '' ?><!--" for="--><? echo $ar["CONTROL_ID"] ?><!--">
																		<span class="bx-filter-input-checkbox">
																			<input
																				type="checkbox"
																				value="<? echo $ar["HTML_VALUE"] ?>"
																				name="<? echo $ar["CONTROL_NAME"] ?>"
																				id="<? echo $ar["CONTROL_ID"] ?>"
																				<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
																				onclick="smartFilter.click(this)"
																			/>
																			<span class="bx-filter-param-text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
																				if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
																					?>&nbsp;(<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
																				endif;?></span>
																		</span>
													</label>*/
											?>
										</li>
									<? } ?>

								</ul>
							</li>
							<? break; ?>
						<?
					}
				}?>

			</ul>

		</form>

	</div>
</div>

<script>
	$(document).on('change','form.smartfilter input',function(){
		$(this).closest('form.smartfilter').submit();
	});
	$(document).on('change','form.smartfilter select',function(){
		var sel_id = $(this).attr("id");
		var data_id = $("#"+sel_id+" option:selected").attr("data_id");
		$("#"+data_id).prop('checked', true);
		$(this).closest('form.smartfilter').submit();
	});
	$(document).on('click', '.reset', function(e){
		e.preventDefault();
		$(this).closest('form').find('#del_filter').click();
		return false;
	});



</script>
