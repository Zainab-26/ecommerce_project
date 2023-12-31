<?php

//Display categories
function display_categories()
{
    global $connection;
    $sql = "select * from category where Category_status='Active'";
    $res = mysqli_query($connection,$sql);
    return $res;
}

//Display products
function display_products($category_id)
{
    global $connection;
    $sql = "select * from inventory where Status='Active'";

    if($category_id!='')
    {
        $sql = "select * from inventory where Category_ID = '$category_id' ";
    }
    $res = mysqli_query($connection,$sql);
    return $res;
}

//Display single products
function display_single_product($prod_id)
{
    global $connection;
    $sql = "select * from inventory where Status='Active'";

    if($prod_id!='')
    {
        $sql = "select * from inventory where Inventory_ID = '$prod_id'";
    }
    $res = mysqli_query($connection,$sql);
    return $res;
}

?>