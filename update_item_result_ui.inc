<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 11/9/2015
 * Time: 2:31 PM
 */
require('ui_utilities.inc');

function ui_show_item_update_details($message){
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("UPDATE ITEM");

    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname
    if ($message)
    {
        if ($message != "")
        {
            echo '<p><center><font color="blue">'.$message.'</font></center></p><br />';
        }
    }

//finish up the html code, and put the return button to go back to main menu
    ui_print_footer_with_main_menu_button();
}
?>