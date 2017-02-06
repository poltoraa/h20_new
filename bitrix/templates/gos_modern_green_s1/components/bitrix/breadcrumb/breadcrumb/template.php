<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
    return "";

$strReturn = '<div class="col col-12"><div class="breadcrumb"><ul>';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($index > 0)
    {
        $strReturn .= '<li><span class="crumb_marker">&rsaquo;</span></li>';
    }

    if($arResult[$index]["LINK"] <> "")
        $strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
    else
        $strReturn .= '<li><span>'.$title.'</span></li>';
}

$strReturn .= '</ul></div></div>';

return $strReturn;
?>