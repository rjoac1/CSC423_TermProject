<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/21/2015
 * Time: 3:16 PM
 */
require('ui_utilities.inc');

function ui_show_promotion_insert_result($message, $promotionNumber, $promotionName, $promotionDescription,
                                    $promotionValue, $promotionType)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD NEW PROMOTION");

    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname
    if ($message)
    {
        if ($message != "")
        {
            echo '<center><font color="blue">'.$message.'</font></center><br />';
        }
    }

//finish up the html code, and put the return button to go back to main menu
    ui_print_footer_with_main_menu_button();
}
?>
