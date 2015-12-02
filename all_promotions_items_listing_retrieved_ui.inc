<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 10/26/2015
 * Time: 11:38 AM
 */
require('ui_utilities.inc');
function ui_show_promotions_retrieved($message, $promotions_retrieved_result)
{
    //----------------------------------------------------------
    // Start the html page
    ui_print_header("List of Promotion's and associated Items");

    // If the message is non-null and not an empty string print it
    // message contains the lastname and firstname

    if ($message)
    {
        if ($message != "")
        {
            echo '<center><font color="blue">'.$message.'</font></center><br />';
        }
    }

    echo <<<END
    <table border="1" cellspacing="0" cellpadding="5px">
    <tr>
    <th>Promo Code</th>
    <th>Name</th>
    <th>Description</th>
    <th>Amount Off</th>
    <th>Promo Type</th>
    </tr>
END;
    while($row = mysql_fetch_assoc($promotions_retrieved_result))
    {
        $promoCode = $row['PromoCode'];
        $name = $row['Name'];
        $description = $row['Description'];
        $amountOff = $row['AmountOff'];
        $promoType = $row['PromoType'];

        echo "<tr  bgcolor='#a9a9a9'>";

        echo "<td><b>$promoCode</b></td>";
        echo "<td><b>$name</b></td>";
        echo "<td ><b>$description</b></td>";
        echo "<td><b>$amountOff</b></td>";
        echo "<td><b>$promoType</b></td>";

        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="6">';
        retrieve_and_print_associated_promos($promoCode);
        echo "</td>";
        echo '</tr>';

    }

    echo "</table>";
    echo"<br />";
    echo "</form>";

    ui_print_footer_with_main_menu_button();

}

function retrieve_and_print_associated_promos($promoCode){

    $sql2 = "SELECT * FROM `Item` WHERE ItemNumber in (SELECT `ItemNumber` FROM `PromotionItem` WHERE `PromoCode` in (SELECT `PromoCode` FROM `Promotion` WHERE `PromoCode` = '" . $promoCode . "'))";


    $error_message = "Could not successfully run query ($sql2) from DB: ";


    $search_promo_result = get_result_set_from_select_query($sql2,$error_message);

    //$result is non-empty. So count the rows
    $numrows = mysql_num_rows($search_promo_result);

    //Create an appropriate message
    $message = "";
    if ($numrows == 0)
        $message = "No events found in database";
    ui_show_itempromo_retrieved($message, $search_promo_result);


}

function ui_show_itempromo_retrieved($message, $promo_retrieved_result){

    $numrows = mysql_num_rows($promo_retrieved_result);
    if($numrows == 0){
        echo <<<END2
        <table border="1" cellspacing="0" cellpadding="5px" bgcolor="white" width="100%">
        <tr><td colspan="6">
        There are no associated item for this promotion at this time.
        </td></tr></table>
END2;
    }else {
        echo <<<END
       <table border="1" cellspacing="0" cellpadding="5px" bgcolor="white" width="100%">
       <tr>
       <th>Item Number</th>
       <th>Item Description</th>
       <th>Category</th>
       <th>Department Name</th>
       <th>Purchase Cost</th>
       <th>Full Retail Price</th>
       </tr>
END;
        while ($row = mysql_fetch_assoc($promo_retrieved_result)) {
            $itemNumber = $row['ItemNumber'];
            $itemDescription = $row['ItemDescription'];
            $category = $row['Category'];
            $departmentName = $row['DepartmentName'];
            $purchaseCost = $row['PurchaseCost'];
            $fullRetailPrice = $row['FullRetailPrice'];


            echo "<tr>";
            echo "<td>$itemNumber</td>";
            echo "<td>$itemDescription</td>";
            echo "<td>$category</td>";
            echo "<td>$departmentName</td>";
            echo "<td>$purchaseCost</td>";
            echo "<td>$fullRetailPrice</td>";

            echo '</tr>';

        }

        echo "</table>";
        echo "<br />";
    }
}

?>