<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("");
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CModule::IncludeModule("iblock");


$arSelect = Array("ID", "NAME", "DETAIL_TEXT");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID" => IntVal(33));
$res = CIBlockElement::GetList(Array(), $arFilter, false, false/*Array('nPageSize' => 200, 'iNumPage' => $_REQUEST['page'])*/, $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    // Этап 1
    $txt = str_replace('font-family: verdana, geneva;', '', $arFields['DETAIL_TEXT']);
    $txt = str_replace('font-family: verdana,geneva;', '', $txt);
    $txt = str_replace('font-size: 10pt;', '', $txt);
    $txt = str_replace($arFields['NAME'], '', $txt);
    $txt = str_replace('<p>&nbsp;</p>', '', $txt);
    $txt = str_replace('<p><span style=" ">&nbsp;</span>&nbsp;</p>', '', $txt);
    $txt = str_replace('<h3></h3>', '', $txt);
    $txt = str_replace('<p><span style=" ">&nbsp;</span></p>', '', $txt);
    $txt = str_replace('<p><span style="">&nbsp;</span></p>', '', $txt);
    $txt = str_replace('<p style="text-align: left;" align="center"><span style=" ">&nbsp;</span></p>', '', $txt);

    /*
    $txt = str_replace('<p><span style=" ">           </span></p>', '', $arFields['DETAIL_TEXT']);
    $txt = str_replace('<p><span style=" ">            </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">          </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">         </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">        </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">       </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">      </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">     </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">    </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">   </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" ">  </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" "> </span></p>', '', $txt);
    $txt = str_replace('<p><span style=" "></span></p>', '', $txt);
    $txt = str_replace('<p align="center"> </p>', '', $txt);
    $txt = str_replace('<p style="text-align: justify;"><span style=" "><br/></span></p>', '', $txt);
    $txt = str_replace('<p style="text-align: justify;"><span style=" "><b><br/></b></span></p>', '', $txt);
    $txt = str_replace('<p style="text-align: center;"><span style=" "><br/></span></p>', '', $txt);
    $txt = str_replace('<p style="text-align: center;"><span style=" "><b><br/></b></span></p>', '', $txt);
    $txt = str_replace('<p align="center"> </p>', '', $txt);
    $txt = str_replace('<p><span style=" "><strong> </strong></span></p>', '', $txt);
    */

   // echo $txt;

    $el = new CIBlockElement;
    $arLoadProductArray = Array("DETAIL_TEXT" => $txt);
    $res_upd = $el->Update($arFields['ID'], $arLoadProductArray);
}
?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>