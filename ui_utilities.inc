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

function ui_print_header_with_head_elements($title, $args){
    ui_print_start_html_header();
    ui_print_document_title($title);
    ui_print_link_references($args);
    ui_print_end_header();
    ui_print_body_header($title);

}

function ui_print_start_html_header(){
    echo <<<START
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" />
START;
}

function ui_print_document_title($title){
    echo <<<TITLE
        <title>Retail Advertising Data Management System: $title</title>
TITLE;
}

function ui_print_link_references($args){
    if(!(is_array($args))){
        $args = array($args);
    }
    //Put in the page specific lines of code that need to go into the head.
    //(i.e. scripts, links to stylesheets etc.)
    foreach($args as $arg){
        echo "$arg";
    }
}


function ui_print_end_header(){
    echo <<<ENDHEAD
    </head>
    <body>
ENDHEAD;
}


function ui_print_body_header($title){
    echo <<<BODYHEADER
    <center>
	<h1>Retail Advertising Data Management System</h1>
    <hr />
    <h2>$title</h2>
    <br />
BODYHEADER;
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
    echo "</center>";
    echo "</body>";
    echo "</html>";
}