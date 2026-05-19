<?php

$root_path = dirname(__DIR__);
include_once $root_path . '/CommonLinks.php';

if(isset($_POST['submit_category'])){
    
    $category_name = $_POST['category_name'];
    $gender = $_POST['gender'];
    
    // 1. Parent ID handle karna (Agar empty ho to exact PHP ka null ya string "NULL" aap ke function ke mutabiq)
    // Agar aap ka insertData function clean hai to exact null chalega, warna string "NULL"
    $parent_id = !empty($_POST['parent_id']) ? intval($_POST['parent_id']) : null;

    // 2. DUPLICATE CHECK (Sab se pehle check karen)
    // Note: Agar aap ka selectQuery dynamic hai to column specify karna parta hai, e.g., "cat_name = '$category_name'"
$check = selectQuery("categories", "cat_name", $category_name);    
    if($check && mysqli_num_rows($check) > 0){
        // Agar pehle se is gender mein yeh category bani hui hai
        $_SESSION["error"] = "Category already exists for this gender!";
        header('Location:../AdminFrontend/AddCategories.php');
        exit;
    }

    // 3. DATA ARRAY (Ab aik hi dafa array banayein, bar bar if-else mein likhne ki zaroorat nahi)
    $categoryData = [
        "cat_name"  => $category_name,
        "gender"    => $gender, 
        "parent_id" => $parent_id // Yeh automatic null ya ID pakad lega
    ];

    // 4. INSERT DATA
    $insert = insertData("categories", $categoryData);

    // 5. SESSION MESSAGES
    if($insert){
        $_SESSION["success"] = "Category '{$category_name}' Added Successfully!";
    } else {
        $_SESSION["error"] = "Something went wrong while inserting data!";
    }

    header('Location:../AdminFrontend/AddCategories.php');
    exit;
}
