<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$fsize = 0;
?>

<div class="col col-mb-left-1 col-mb-8">
	<h3>Прикреплённые файлы:</h3>
	<table class="table-doc">
		<tr>
			<th>Название</th>
			<th>Размер</th>
			<th>Файл</th>
		</tr>

		<?foreach ($arResult as $arItem)
		{
			if (strripos($arItem['LINK'],'http') == true)
			{
				$arItem["LINK"] = 'http://www.gczn.nsk.su'.$arItem["LINK"];
			}

			$fh = fopen($arItem["LINK"], "r");
			while(($str = fread($fh, 1024)) != null) $fsize += strlen($str);
			$fsize = round($fsize/1024/1024, 2);
			?>
			<tr>
				<td><?echo $arItem["TEXT"]?></td>
				<td><?echo $fsize?> Мб.</td>
				<td><a style="font-size: 12px;" href="<?echo $arItem["LINK"]?>" download>Скачать</a></td>
			</tr>
		<?}?>

	</table>
</div>

