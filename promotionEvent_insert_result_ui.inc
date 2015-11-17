<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 10/26/2015
 * Time: 3:43 PM
 */
require('ui_utilities.inc');
function ui_show_promotion_event_insert_result($message){
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD EVENT TO PROMOTION");

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
