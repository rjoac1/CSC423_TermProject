<?php

require('ui_utilities.inc');

//------------------------------------------------------------
// Main Control Logic: It just calls a function
ui_show_new_event_form();

//------------------------------------------------------------
function ui_show_new_event_form()
{
//Create an HTML document using the ECHO statements
$script = "<script type='text/javascript' src='ValidateEvent.js'>  </script>";

ui_print_header_with_head_elements("MAIN MENU", $script);
?>
