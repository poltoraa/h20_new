<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<ul class="col col-dt-9 map tablet-hide mb-hide">';
$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if ($index > 0)
	{
		$strReturn .= ' - ';
	}

	if($arResult[$index]["LINK"] <> "")
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
	else
		$strReturn .= '<li><a href="" title="'.$title.'">'.$title.'</a></li>';
}

$strReturn .= '</ul>';

return $strReturn;
?>

