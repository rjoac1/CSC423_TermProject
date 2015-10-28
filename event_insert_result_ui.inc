<?php
require('ui_utilities.inc');
function ui_show_event_insert_result($message, $eventCode, $eventName, $startDate, $endDate,
                                     $description, $type)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("ADD NEW EVENT");
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
