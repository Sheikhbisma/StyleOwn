<?php 
include_once __DIR__ . '/../CommonLinks.php'; 
/** @var mysqli $conn */ 
include 'sidebar.php'; 
 
if(isset($_GET['subcategory'])){
    $subCategory_id = mysqli_real_escape_string($conn, $_GET['subcategory']);
    
    // Sub-category ka naam nikalne ke liye taake form par heading acchi lage
    $subCatQuery = mysqli_query($conn, "SELECT cat_name FROM categories WHERE cat_id = '$subCategory_id'");
    $subCatName = ($subCatQuery && mysqli_num_rows($subCatQuery) > 0) ? mysqli_fetch_assoc($subCatQuery)['cat_name'] : "Sub-Category";
} else {
    header('Location: SubCategories.php');
    exit();
}
?>

<div class="main-content" style="padding: 30px; background-color: #f8f9fa; min-height: 100vh; font-family: 'Segoe UI', Roboto, sans-serif;">
    <div class="container-fluid" style="max-width: 900px; margin: 0 auto;">
        
        <div class="d-flex justify-content-between align-items-center mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <h2 style="font-weight: 700; color: #1e293b; margin: 0; font-size: 26px;">
                    Add New Product to <span style="color: #4f46e5;"><?php echo htmlspecialchars($subCatName); ?></span>
                </h2>
                <p style="color: #64748b; margin: 5px 0 0 0; font-size: 14px;">
                    Fill out the details below to insert a new product into this collection.
                </p>
            </div>
            
            <a href="javascript:history.back()" class="btn" style="border: 1px solid #cbd5e1; background: #fff; color: #334155; padding: 10px 16px; border-radius: 8px; font-weight: 500; text-decoration: none; font-size: 14px; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin-bottom: 30px;">

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert" style="background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 16px; border-radius: 12px; margin-bottom: 24px; font-weight: 500;">
                <i class="fas fa-check-circle me-2" style="font-size: 18px;"></i>
                <div><?php echo $_SESSION['success']; ?></div>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert" style="background-color: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 16px; border-radius: 12px; margin-bottom: 24px; font-weight: 500;">
                <i class="fas fa-exclamation-circle me-2" style="font-size: 18px;"></i>
                <div><?php echo $_SESSION['error']; ?></div>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div style="background: #ffffff; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03); border: 1px solid #f1f5f9; padding: 30px;">
            
            <form action="../AdminBackend/insert_products.php" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
                
                <input type="hidden" name="cat_id" value="<?php echo $subCategory_id; ?>">

                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-weight: 600; color: #334155; font-size: 14px;">Product Name</label>
                    <input type="text" name="p_name" placeholder="e.g., Embroidered Cotton Kurti" required style="padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; width: 100%; box-sizing: border-box; outline: none;">
                </div>

                <div style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-weight: 600; color: #334155; font-size: 14px;">Description</label>
                    <textarea name="description" rows="4" placeholder="Write standard details about material, size availability, fabric info..." required style="padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; width: 100%; box-sizing: border-box; outline: none; resize: vertical; font-family: inherit;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 6px;">
                        <label style="font-weight: 600; color: #334155; font-size: 14px;">Base Price (Rs.)</label>
                        <input type="number" name="base_price" min="0" placeholder="e.g., 2500" required style="padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; width: 100%; box-sizing: border-box; outline: none;">
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 6px;">
                        <label style="font-weight: 600; color: #334155; font-size: 14px;">Discount (%)</label>
                        <input type="number" name="discount" min="0" max="100" placeholder="e.g., 10 (Leave 0 if none)" value="0" style="padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; width: 100%; box-sizing: border-box; outline: none;">
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 6px; background: #f8fafc; border: 2px dashed #cbd5e1; padding: 20px; border-radius: 12px; text-align: center;">
                    <label style="font-weight: 600; color: #334155; font-size: 14px; cursor: pointer; display: block;">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 32px; color: #4f46e5; margin-bottom: 8px; display: block;"></i>
                        <span>Upload Main Product Image</span>
                        <input type="file" name="main_image" accept="image/*" required style="display: block; margin: 12px auto 0 auto; font-size: 14px; color: #64748b;">
                    </label>
                    <span style="font-size: 12px; color: #94a3b8;">Supported formats: JPG, PNG, JPEG (Recommended size: 800x1000px)</span>
                </div>

                <div style="margin-top: 10px; text-align: right;">
                    <button type="submit" name="add_product_btn" style="background: #4f46e5; color: #ffffff; border: none; font-size: 15px; font-weight: 600; padding: 12px 30px; border-radius: 8px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);">
                        <i class="fas fa-save"></i> Save Product
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>