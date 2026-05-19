<?php include_once __DIR__ . '/../CommonLinks.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminSidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='fas fa-book-open'></i>
            <span class="logo_name">AdminPanel</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="active">
                    <i class='fas fa-th-large'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="AddCategories.php">
                    <i class='fas fa-list'></i>
                    <span class="links_name">Add Categories</span>
                </a>
            </li>
            <li>
                <!-- Main wrapper ko d-block rakha hai taake relative positioning stack ho sake -->
                <div class="position-relative d-block text-start">

                    <!-- Toggle Button Area: Flex lagakar items ko align kiya hai aur border-radius diya hai -->
                    <div class="d-flex align-items-center rounded-3 text-white cursor-pointer category-toggle-btn"
                        onclick="toggleButton()" style="cursor: pointer;">

                        <div class="d-flex align-items-center">
                            <!-- FontAwesome settings icon -->
                            <i class="fas fa-cog "></i>
                            <span class="links_name pe-2">Category</span>
                        </div>

                        <!-- Bootstrap ya FontAwesome ka caret icon (Isme transition handle hogi) -->
                        <i class="fas fa-caret-down transition-300" id="caret-arrow" style="font-size:12px;"></i>
                    </div>

                    <!-- Dropdown Menu: Default Bootstrap 'd-none' (hidden) class ke sath -->
                    <div class="d-none flex-column ms-4 mt-1 border-start border-secondary ps-3" id="dropdownmenu">
                        <?php foreach($mainCategories as $category){ ?>
                        <a href="SubCategories.php?mainCategory=<?php echo $category['cat_id'] ?>" class="text-white text-decoration-none py-1 small d-block opacity-75 hover-opacity-100"> <?php  echo $category['cat_name'] ?></a>
<?php  } ?> 

</div>
                </div>
            </li>
            <li>
                <a href="insert_book.php">
                    <i class='fas fa-plus-circle'></i>
                    <span class="links_name">Add New Product</span>
                </a>
            </li>

            <li>
                <a href="orders.php">
                    <i class='fas fa-shopping-cart'></i>
                    <span class="links_name">Orders</span>
                </a>
            </li>
            <li>
                <a href="settings.php">
                    <i class='fas fa-cog'></i>
                    <span class="links_name">Settings</span>
                </a>
            </li>
            <li class="log_out">
                <a href="logout.php">
                    <i class='fas fa-sign-out-alt'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <script>
        function toggleButton() {
            let dropdownMenu = document.querySelector("#dropdownmenu");
            let arrow = document.querySelector("#caret-arrow");

            dropdownMenu.classList.toggle("d-none");
            arrow.classList.toggle("rotate");
        }
    </script>
</body>

</html>