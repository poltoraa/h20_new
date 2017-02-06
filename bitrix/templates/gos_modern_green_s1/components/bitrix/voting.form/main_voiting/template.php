<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>



<?
if (!empty($arResult["ERROR_MESSAGE"])):
    ?>
    <div class="vote-note-box vote-note-error">
        <div class="vote-note-box-text"><?= ShowError($arResult["ERROR_MESSAGE"]) ?></div>
    </div>
    <?
endif;

if (!empty($arResult["OK_MESSAGE"])):
    ?>
    <div class="vote-note-box vote-note-note">
        <div class="vote-note-box-text"><?= ShowNote($arResult["OK_MESSAGE"]) ?></div>
    </div>
    <?
endif;

if (empty($arResult["VOTE"])):
    return false;
elseif (empty($arResult["QUESTIONS"])):
    return true;
endif;

?>

<div class="col col-mb-12 white-box interview-wrap">
    <div class="interview">


        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "include_h3",
            array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc_h3",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => "include_h3",
                "PATH" => "/includes/current.php"
            ),
            false
        );?>

        <p><?= $arResult["VOTE"]["~TITLE"] ?></p>
        <div class="grey-line"></div>

        <form action="<?= POST_FORM_ACTION_URI ?>" method="post" class="vote-form">
            <input type="hidden" name="vote" value="Y">
            <input type="hidden" name="PUBLIC_VOTE_ID" value="<?= $arResult["VOTE"]["ID"] ?>">
            <input type="hidden" name="VOTE_ID" value="<?= $arResult["VOTE"]["ID"] ?>">
            <?= bitrix_sessid_post() ?>

            <?
            $iCount = 0;
            foreach ($arResult["QUESTIONS"] as $arQuestion):
                $iCount++;

                ?>
                <?
                $iCountAnswers = 0;
                foreach ($arQuestion["ANSWERS"] as $arAnswer):
                    $iCountAnswers++;
                    ?>

                    <?
                    switch ($arAnswer["FIELD_TYPE"]):
                        case 0://radio
                            $value = (isset($_REQUEST['vote_radio_' . $arAnswer["QUESTION_ID"]]) &&
                                $_REQUEST['vote_radio_' . $arAnswer["QUESTION_ID"]] == $arAnswer["ID"]) ? 'checked="checked"' : '';
                            break;
                    endswitch;
                    ?>
                    <?
                    switch ($arAnswer["FIELD_TYPE"]):
                        case 0://radio
                            ?>
                            <input type="radio" <?= $value ?> name="vote_radio_<?= $arAnswer["QUESTION_ID"] ?>" <?
                            ?>id="vote_radio_<?= $arAnswer["QUESTION_ID"] ?>_<?= $arAnswer["ID"] ?>" <?
                                   ?>value="<?= $arAnswer["ID"] ?>" <?= $arAnswer["~FIELD_PARAM"] ?> />
                            <div><label
                                for="vote_radio_<?= $arAnswer["QUESTION_ID"] ?>_<?= $arAnswer["ID"] ?>"><span><?= $arAnswer["~MESSAGE"] ?></span></label>
                            </div><?
                            break;
                    endswitch;
                    ?>

                    <?
                endforeach
                ?>

                <?
            endforeach
            ?>


            <div class="vote-form-box-buttons vote-vote-footer">
                <span class="vote-form-box-button vote-form-box-button-first"><input type="submit" name="vote"
                                                                                     value="<?= GetMessage("VOTE_SUBMIT_BUTTON") ?>"/></span>
            <span class="vote-form-box-button vote-form-box-button-last"
                  style="display: block; margin-left: 50px; margin-bottom: 20px;">
                <a name="show_result" <?
                ?>href="<?= $arResult["URL"]["RESULT"] ?>"><?= GetMessage("VOTE_RESULTS") ?></a>
            </span>
            </div>
        </form>
    </div>
</div>
