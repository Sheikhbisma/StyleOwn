<?php include_once __DIR__ . '/../CommonLinks.php'; 

?>
<?php include 'sidebar.php'; ?>

<div class="main-content" style="background-color: #f8f9fa; min-height: 100vh; padding: 40px 20px;">
    <div class="form-container" style="max-width: 750px; margin: auto;">
        
        <div style="margin-bottom: 30px;">
            <h2 style="font-weight: 700; color: #1e293b; margin: 0 0 8px 0; font-size: 28px;">Add New Category</h2>
            <p style="color: #64748b; margin: 0; font-size: 15px;">Organize your StyleOwn catalog by adding root sections or custom internal sub-collections.</p>
        </div>

        <?php if (isset($_SESSION["success"])): ?>
            <div class="alert alert-success d-flex align-items-center" style="border-radius: 10px; padding: 15px; margin-bottom: 25px; border: none; background-color: #d1e7dd; color: #0f5132;">
                <i class="fas fa-check-circle" style="font-size: 18px; margin-right: 10px;"></i> 
                <div><?php echo $_SESSION["success"]; ?></div>
            </div>
            <?php unset($_SESSION["success"]); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION["error"])): ?>
            <div class="alert alert-danger d-flex align-items-center" style="border-radius: 10px; padding: 15px; margin-bottom: 25px; border: none; background-color: #f8d7da; color: #842029;">
                <i class="fas fa-exclamation-circle" style="font-size: 18px; margin-right: 10px;"></i> 
                <div><?php echo $_SESSION["error"]; ?></div>
            </div>
            <?php unset($_SESSION["error"]); ?>
        <?php endif; ?>

        <form action="../AdminBackend/insert_category.php" method="POST">

            <div style="background: #fff; padding: 25px; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.01); margin-bottom: 24px;">
                <div style="display: flex; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
                    <span style="background: #e0e7ff; color: #4f46e5; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 13px; margin-right: 10px;">1</span>
                    <h5 style="margin: 0; font-weight: 600; color: #334155; font-size: 16px;">Basic Information</h5>
                </div>

                <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 250px;">
                        <label style="font-weight: 500; color: #475569; margin-bottom: 8px; display: block; font-size: 14px;">Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="e.g. Western Wear, Handbags" style="border-radius: 8px; padding: 10px 14px; border: 1px solid #cbd5e1; transition: all 0.2s;">
                    </div>

                    <div style="flex: 1; min-width: 250px;">
                        <label style="font-weight: 500; color: #475569; margin-bottom: 8px; display: block; font-size: 14px;">Gender Assignment</label>
                        <select name="gender" class="form-control" style="border-radius: 8px; padding: 10px 14px; border: 1px solid #cbd5e1; background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2364748B%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 14px top 50%; background-size: 10px auto; -webkit-appearance: none; -moz-appearance: none; appearance: none;" id="gender">
                            <option value="">Choose Target Target...</option>
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                        </select>
                    </div>
                </div>
            </div>

            <div style="background: #fff; padding: 25px; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.01); margin-bottom: 24px;">
                <div style="display: flex; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
                    <span style="background: #e0e7ff; color: #4f46e5; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 13px; margin-right: 10px;">2</span>
                    <h5 style="margin: 0; font-weight: 600; color: #334155; font-size: 16px;">Set Architecture Structure</h5>
                </div>

                <div style="display: flex; gap: 16px; flex-wrap: wrap;">

                    <label style="flex: 1; min-width: 250px; border: 1px solid #cbd5e1; padding: 16px; border-radius: 12px; cursor: pointer; display: flex; align-items: flex-start; background: #f8fafc; transition: all 0.2s; position: relative;" class="type-card">
                        <input type="radio" name="category_type" id="main" checked value="main" style="margin-top: 4px; margin-right: 12px; transform: scale(1.1); accent-color: #4f46e5;">
                        <div>
                            <strong style="display: block; color: #1e293b; font-size: 15px; margin-bottom: 4px;">Main Category</strong>
                            <span style="font-size: 12.5px; color: #64748b; line-height: 1.4; display: block;">Acts as a primary structural tier visible directly on menus (e.g., Clothing, Shoes).</span>
                        </div>
                    </label>

                    <label style="flex: 1; min-width: 250px; border: 1px solid #cbd5e1; padding: 16px; border-radius: 12px; cursor: pointer; display: flex; align-items: flex-start; background: #f8fafc; transition: all 0.2s; position: relative;" class="type-card">
                        <input type="radio" name="category_type" id="sub" value="sub" style="margin-top: 4px; margin-right: 12px; transform: scale(1.1); accent-color: #4f46e5;">
                        <div>
                            <strong style="display: block; color: #1e293b; font-size: 15px; margin-bottom: 4px;">Subcategory</strong>
                            <span style="font-size: 12.5px; color: #64748b; line-height: 1.4; display: block;">Nests safely within a parent department (e.g., Summer Wear nested inside Clothing).</span>
                        </div>
                    </label>

                </div>
            </div>

            <div class="d-none" id="mainCategory" style="background: #fff; padding: 25px; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.01); margin-bottom: 24px; animation: fadeIn 0.3s ease-out;">
                <div style="display: flex; align-items: center; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
                    <span style="background: #e0e7ff; color: #4f46e5; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 13px; margin-right: 10px;">3</span>
                    <h5 style="margin: 0; font-weight: 600; color: #334155; font-size: 16px;">Assign Parent Department</h5>
                </div>
                
                <label style="font-weight: 500; color: #475569; margin-bottom: 8px; display: block; font-size: 14px;">Select Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-control" style="border-radius: 8px; padding: 10px 14px; border: 1px solid #cbd5e1; background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2364748B%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 14px top 50%; background-size: 10px auto; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                    <option value="">-- Choose Target Parent Pillar --</option>
                    <?php foreach($mainCategories as $cat){ ?>
                        <option value="<?php echo $cat['cat_id']; ?>">
                            <?php echo $cat['cat_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div style="background: #f0fdf4; border-left: 4px solid #16a34a; padding: 16px; border-radius: 12px; font-size: 13.5px; margin-bottom: 30px; color: #166534; display: flex; align-items: flex-start; gap: 10px; line-height: 1.5;">
                <i class="fas fa-info-circle" style="color: #16a34a; font-size: 16px; margin-top: 2px;"></i>
                <div>
                    <strong>System Integrity Note:</strong> Main Categories will instantly generate high-level global menu targets. Assigning a Subcategory keeps layout listings orderly and clean under an established core interface.
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" name="submit_category" class="btn btn-primary" style="padding: 12px 28px; border-radius: 10px; font-weight: 600; font-size: 15px; background: #4f46e5; border: none; box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3); transition: all 0.2s; cursor: pointer;">
                    <i class="fas fa-save" style="margin-right: 6px;"></i> Save Securely
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    let mainCategoryDropdown = document.getElementById("mainCategory");
    const mainCategory = document.getElementById("main");
    const subCategory = document.getElementById("sub");
const genderField = document.getElementById('gender').parentElement;

    function toggleParent(){
        if(subCategory.checked){
            mainCategoryDropdown.classList.remove('d-none');
                    genderField.style.display = 'none';

        } else {
            mainCategoryDropdown.classList.add('d-none');
                    genderField.style.display = 'block';

        }
    }

    mainCategory.addEventListener('change' , toggleParent);
    subCategory.addEventListener('change' , toggleParent);
    toggleParent();
</script>