<?php 
include_once __DIR__ . '/../CommonLinks.php'; 
/** @var mysqli $conn */ 
include 'sidebar.php';

$error = [];
$mainCategoryTitle = "Women's Clothing"; // Default heading syntax

if(isset($_GET['mainCategory'])){
    $parent_id =$_GET['mainCategory'];
    
    // 1. Main category ka naam nikalne ka sahi tareeqa
    $category_query = mysqli_query($conn, "SELECT cat_name FROM categories WHERE cat_id = '$parent_id'");
    if($category_query && mysqli_num_rows($category_query) > 0){
        $cat_data = mysqli_fetch_assoc($category_query);
        $mainCategoryTitle = $cat_data['cat_name']; // Dynamic name locked!
    }
    
    // 2. Sub-categories nikalne ki query
    $subCategories = mysqli_query($conn, "SELECT * FROM categories WHERE parent_id = '$parent_id'");
    
    // 3. Check agar sub-categories nahi hain
    if(mysqli_num_rows($subCategories) == 0){
        $error['not'] = "Sub Categories for <b>{$mainCategoryTitle}</b> don't exist yet.";
    }
}
?>

<div class="main-content" style="padding: 30px; background-color: #f8f9fa; min-height: 100vh; font-family: 'Segoe UI', Roboto, sans-serif;">
    <div class="container-fluid" style="max-width: 1300px; margin: 0 auto;">
        
        <div class="d-flex justify-content-between align-items-center mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <h2 style="font-weight: 700; color: #1e293b; margin: 0; font-size: 28px;">
                    <span style="color: #4f46e5;">Women's <?php echo htmlspecialchars($mainCategoryTitle); ?></span> Collections
                </h2>
                <p style="color: #64748b; margin: 5px 0 0 0; font-size: 14px;">
                    Is category ke andar ki saari sub-categories yahan se manage karein.
                </p>
            </div>
            
            <a href="AddCategories.php" class="btn" style="border: 1px solid #cbd5e1; background: #fff; color: #334155; padding: 10px 16px; border-radius: 8px; font-weight: 500; text-decoration: none; font-size: 14px; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>

        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin-bottom: 30px;">

        <?php if(!empty($error['not'])): ?>
            <div class="alert alert-warning" style="background-color: #fffbeb; border: 1px solid #fde68a; color: #b45309; padding: 16px; border-radius: 12px; margin-bottom: 24px;">
                <i class="fas fa-exclamation-triangle me-2"></i> <?php echo $error['not']; ?>
            </div>
        <?php endif; ?>

        <div class="row" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
        
        <?php 
        // Loop sirf tab chalega jab database mein rows hongi
        if(isset($subCategories) && mysqli_num_rows($subCategories) > 0){
            while($row = mysqli_fetch_assoc($subCategories)){ 
        ?>
                <div class="category-card" style="background: #ffffff; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03); display: flex; flex-direction: column; justify-content: space-between; border: 1px solid #f1f5f9;">
                    <div style="padding: 24px; display: flex; align-items: center; gap: 16px;">
                        <div style="background: #eeebff; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-folder-open" style="color: #4f46e5; font-size: 20px;"></i>
                        </div>
                        <div>
                            <h5 style="font-size: 16px; font-weight: 600; color: #1e293b; margin: 0;"> Womens <?php echo htmlspecialchars($row['cat_name']); ?></h5>
                            <span style="font-size: 11px; color: #64748b; background: #f1f5f9; padding: 2px 8px; border-radius: 4px; display: inline-block; margin-top: 4px; border: 1px solid #e2e8f0;">ID: <?php echo $row['cat_id']; ?></span>
                        </div>
                    </div>
                    <div style="padding: 12px 24px 20px 24px; border-top: 1px solid #f8fafc; text-align: right; display: flex; justify-content: flex-end; gap: 16px;">
                        <a href="AddProducts.php?subcategory=<?php echo $row['cat_id']; ?>" style="color: #4f46e5; font-size: 14px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                            <i class="fas fa-edit"></i> Add Products
                        </a>
                        <a href="../AdminBackend/delete_category.php?id=<?php echo $row['cat_id']; ?>" onclick="return confirm('Kya aap waqai isey delete karna chahte hain?')" style="color: #ef4444; font-size: 14px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
        <?php 
            } 
        } 
        ?>

        </div>
    </div>
</div>