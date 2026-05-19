<?php
session_start();
/** @var mysqli $conn */ // 💡 VS Code ko chup karwane ke liye magic line

// 1. Database connection
// dirname(__DIR__) ka matlab hai Admin folder se bahar niklo (StyleOwn mein aao)
$root_path = dirname(__DIR__); 

require $root_path . '/Auth/dbconnect.php';
require $root_path . '/Auth/function.php';

// 3. CSS Path (Browser ke liye)
$base_url = "/StyleOwn/Admin/";
?>

<!-- CSS & Fonts -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css">

<?php
$mainCategories = [];
$selectMainCategories = mysqli_query($conn,"Select * from categories where parent_id = 0 and gender = 'women'");
if($selectMainCategories){
    while($row = mysqli_fetch_assoc($selectMainCategories)){
$mainCategories[] = $row ?? '';

    }
}

?>