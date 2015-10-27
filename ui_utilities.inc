<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/27/2015
 * Time: 3:41 PM
 */
function ui_print_header($title)
{
    $args = array("");
    ui_print_header_with_head_elements($title, $args);
}
function ui_print_header_with_head_elements($title, $args)
{
    if(!(is_array($args)))
    {
        $args = array($args);
    }
    echo <<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" />
        <title>Retail Advertising Data Management System: $title</title>
END;
    //Put in the page specific lines of code that need to go into the head. (i.e. scripts, links to stylesheets etc.)
    foreach($args as $arg)
    {
        echo "$arg";
    }
    echo <<<EOD
    </head>
    <body>
    <center>
    <h1>Retail Advertising Data Management System</h1>
    </center>
    <hr />
    <center>
    <h2>$title</h2>
    </center>
    <br />
EOD;
}

function ui_print_footer_with_main_menu_button()
{
    echo <<<END
    <BR/>
    <BR/>
    <center>
    <input type="button" value="Return to Main Menu" onClick="window.location='index.html'"/>
    </center>
END;
    ui_print_footer();
}

function ui_print_footer()
{
    echo "</body>";
    echo "</html>";
}