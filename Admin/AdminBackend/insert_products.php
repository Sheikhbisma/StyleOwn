<?php
session_start();

// 1. Root path setup aur functions include karna
$root_path = dirname(__DIR__);
include_once $root_path . '/CommonLinks.php'; // Taake $conn aur aapke custom functions (insertData, selectQuery) mil sakein

if (isset($_POST['add_product_btn'])) {
    
    // Form se basic data nikalna
    $cat_id      = intval($_POST['cat_id']); // Hidden input se aane wali sub-category ID
    $p_name      = trim($_POST['p_name']);
    $description = trim($_POST['description']);
    $base_price  = floatval($_POST['base_price']);
    $discount    = floatval($_POST['discount']);
    
    // 2. DUPLICATE CHECK (Check karen ke is sub-category mein is naam ka product pehle se to nahi hai)
    $check = selectQuery("products", "p_name", $p_name);
    
    if ($check && mysqli_num_rows($check) > 0) {
        $_SESSION["error"] = "Product with this name already exists!";
        header("Location: ../AdminFrontend/AddProducts.php?subcategory={$cat_id}");
        exit;
    }

    // 3. IMAGE UPLOAD HANDLING (main_image)
    $main_image_name = "";
    
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] == 0) {
        $file = $_FILES['main_image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        
        // File extension check karna (jpg, png, jpeg)
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        
        if (in_array($fileActualExt, $allowed)) {
            // Unique naam banana taake files aapas mein overwrite na hon
            $newFileName = "prod_" . uniqid('', true) . "." . $fileActualExt;
            
            // Uploads folder ka rasta (Apne folder structure ke mutabiq check kar lein)
            // Hum htdocs/StyleOwn/uploads/ folder mein save karwa rahe hain
            $fileDestination = dirname(dirname(__DIR__)) . '/Products_Images/' . $newFileName;
            
            // Agar uploads folder nahi bana hua to create kar de
            if (!is_dir(dirname(dirname(__DIR__)) . '/Products_Images/')) {
                mkdir(dirname(dirname(__DIR__)) . '/Products_Images/', 0777, true);
            }

            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                $main_image_name = $newFileName; // Database mein sirf file ka naam jayega
            } else {
                $_SESSION["error"] = "Failed to upload image file!";
                header("Location: ../AdminFrontend/AddProducts.php?subcategory={$cat_id}");
                exit;
            }
        } else {
            $_SESSION["error"] = "Invalid file type! Only JPG, JPEG, and PNG are allowed.";
            header("Location: ../AdminFrontend/AddProducts.php?subcategory={$cat_id}");
            exit;
        }
    } else {
        $_SESSION["error"] = "Product main image is required!";
        header("Location: ../AdminFrontend/AddProducts.php?subcategory={$cat_id}");
        exit;
    }

    // 4. DATA ARRAY (Aapke database ke columns ke mutabiq mapping)
    $productData = [
        "cat_id"      => $cat_id,
        "p_name"      => $p_name,
        "description" => $description,
        "base_price"  => $base_price,
        "discount"    => $discount,
        "main_image"  => $main_image_name
    ];

    // 5. INSERT DATA (Aapka custom function use karte hue)
    $insert = insertData("products", $productData);

    // 6. SESSION MESSAGES & REDIRECTION
    if ($insert) {
        $_SESSION["success"] = "Product '{$p_name}' Added Successfully!";
        // Product add hone ke baad wapas usi page par bhej rahe hain subcategory ID ke sath
        header("Location: ../AdminFrontend/AddProducts.php?subcategory={$cat_id}");
    } else {
        $_SESSION["error"] = "Something went wrong while inserting the product!";
        header("Location: ../AdminFrontend/AddProducts.php?subcategory={$cat_id}");
    }
    exit;
} else {
    // Agar koi direct access karne ki koshish kare
    header('Location: ../AdminFrontend/SubCategories.php');
    exit;
}
?>