<?php
    // 1. Page Title set karein
    $page_title = "Shop All Products | StyleOwn";
    
    // 2. Output Buffering shuru
    ob_start(); 
?>

<style>
    /* Shop Page Custom Styles */
    .filter-title {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        color: #111;
    }
    .filter-list {
        list-style: none;
        padding-left: 0;
    }
    .filter-list li a {
        font-size: 0.9rem;
        color: #555;
        text-decoration: none;
        transition: color 0.2s;
    }
    .filter-list li a:hover {
        color: #111;
        font-weight: 500;
    }
    
    /* Product Grid Card Styling */
    .shop-product-card {
        transition: transform 0.3s ease;
    }
    .shop-product-card:hover {
        transform: translateY(-5px);
    }
    .shop-img-wrapper {
        position: relative;
        overflow: hidden;
        background-color: #f3f3f3;
    }
    .shop-img-wrapper img {
        width: 100%;
        height: 380px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .shop-product-card:hover .shop-img-wrapper img {
        transform: scale(1.04);
    }
    
    /* Hover on card displays "Quick Add" or view icon */
    .quick-view-btn {
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 100%;
        background: rgba(17, 17, 17, 0.9);
        color: #fff;
        text-align: center;
        padding: 10px 0;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: bottom 0.3s ease;
        text-decoration: none;
    }
    .shop-product-card:hover .quick-view-btn {
        bottom: 0;
    }

    .shop-product-title {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 500;
        color: #111;
        text-decoration: none;
    }
    .shop-product-price {
        font-size: 0.9rem;
        color: #555;
    }

    /* Small Size Badges in Filters */
    .filter-size-box {
        display: inline-block;
        width: 35px;
        height: 35px;
        border: 1px solid #ddd;
        text-align: center;
        line-height: 33px;
        font-size: 0.8rem;
        margin-right: 5px;
        margin-bottom: 5px;
        color: #333;
        text-decoration: none;
    }
    .filter-size-box:hover, .filter-size-box.active {
        border-color: #111;
        background: #111;
        color: #fff;
    }
</style>

<div class="container my-5 pt-3">
    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3">
        <div>
            <h1 style="font-family: 'Playfair Display', serif; font-weight: 500; font-size: 2rem;">Our Collection</h1>
            <p class="text-muted small mb-0">Showing 1–8 of 24 products</p>
        </div>
        <div class="d-flex align-items-center">
            <span class="text-muted small me-2 text-nowrap d-none d-sm-inline">Sort by:</span>
            <select class="form-select form-select-sm rounded-0 border-secondary-subtle" style="width: 160px; font-size: 0.85rem;">
                <option>Featured</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Newest Arrivals</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 d-none d-md-block pe-4">
            
            <div class="mb-4">
                <h5 class="filter-title mb-3">Categories</h5>
                <ul class="filter-list">
                    <li class="mb-2"><a href="#">All Clothing</a></li>
                    <li class="mb-2"><a href="#">Dresses</a></li>
                    <li class="mb-2"><a href="#">Blazers & Jackets</a></li>
                    <li class="mb-2"><a href="#">Accessories</a></li>
                    <li class="mb-2"><a href="#">Shoes</a></li>
                </ul>
            </div>
            
            <hr class="opacity-25 my-4">

            <div class="mb-4">
                <h5 class="filter-title mb-3">Filter by Price</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="p1">
                    <label class="form-check-label small text-muted" for="p1">Under PKR 3,000</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="p2">
                    <label class="form-check-label small text-muted" for="p2">PKR 3,000 - PKR 6,000</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="p3">
                    <label class="form-check-label small text-muted" for="p3">Over PKR 6,000</label>
                </div>
            </div>

            <hr class="opacity-25 my-4">

            <div class="mb-4">
                <h5 class="filter-title mb-3">Sizes</h5>
                <div>
                    <a href="#" class="filter-size-box">S</a>
                    <a href="#" class="filter-size-box active">M</a>
                    <a href="#" class="filter-size-box">L</a>
                    <a href="#" class="filter-size-box">XL</a>
                </div>
            </div>

        </div>

        <div class="col-md-9">
            <div class="row g-4">
                
                <div class="col-md-4 col-6">
                    <div class="card border-0 rounded-0 bg-transparent shop-product-card">
                        <div class="shop-img-wrapper">
                            <span class="position-absolute top-0 start-0 bg-dark text-white text-uppercase px-2 py-1 m-2" style="font-size: 0.6rem; letter-spacing: 1px; z-index:2;">New</span>
                            <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=600" alt="Product">
                            <a href="product-detail.php" class="quick-view-btn">View Product</a>
                        </div>
                        <div class="card-body px-0 pt-3 text-center">
                            <a href="product-detail.php" class="shop-product-title d-block mb-1">Classic Linen Dress</a>
                            <span class="shop-product-price">PKR 4,500</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card border-0 rounded-0 bg-transparent shop-product-card">
                        <div class="shop-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=600" alt="Product">
                            <a href="product-detail.php" class="quick-view-btn">View Product</a>
                        </div>
                        <div class="card-body px-0 pt-3 text-center">
                            <a href="product-detail.php" class="shop-product-title d-block mb-1">Sleek Blazer Set</a>
                            <span class="shop-product-price">PKR 8,900</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card border-0 rounded-0 bg-transparent shop-product-card">
                        <div class="shop-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?q=80&w=600" alt="Product">
                            <a href="product-detail.php" class="quick-view-btn">View Product</a>
                        </div>
                        <div class="card-body px-0 pt-3 text-center">
                            <a href="product-detail.php" class="shop-product-title d-block mb-1">Minimalist Heels</a>
                            <span class="shop-product-price">PKR 3,800</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card border-0 rounded-0 bg-transparent shop-product-card">
                        <div class="shop-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=600" alt="Product">
                            <a href="product-detail.php" class="quick-view-btn">View Product</a>
                        </div>
                        <div class="card-body px-0 pt-3 text-center">
                            <a href="product-detail.php" class="shop-product-title d-block mb-1">Leather Shoulder Bag</a>
                            <span class="shop-product-price">PKR 5,400</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card border-0 rounded-0 bg-transparent shop-product-card">
                        <div class="shop-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1612336307429-8a898d10e223?q=80&w=600" alt="Product">
                            <a href="product-detail.php" class="quick-view-btn">View Product</a>
                        </div>
                        <div class="card-body px-0 pt-3 text-center">
                            <a href="product-detail.php" class="shop-product-title d-block mb-1">Silk Slip Dress</a>
                            <span class="shop-product-price">PKR 6,200</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <div class="card border-0 rounded-0 bg-transparent shop-product-card">
                        <div class="shop-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?q=80&w=600" alt="Product">
                            <a href="product-detail.php" class="quick-view-btn">View Product</a>
                        </div>
                        <div class="card-body px-0 pt-3 text-center">
                            <a href="product-detail.php" class="shop-product-title d-block mb-1">Gold Hoops Set</a>
                            <span class="shop-product-price">PKR 1,500</span>
                        </div>
                    </div>
                </div>

            </div>

            <nav class="mt-5 pt-4">
                <ul class="pagination justify-content-center pagination-sm">
                    <li class="page-item disabled"><a class="page-link rounded-0 border-0 text-dark" href="#">Prev</a></li>
                    <li class="page-item active"><a class="page-link rounded-0 border-0 bg-dark text-white" href="#">1</a></li>
                    <li class="page-item"><a class="page-link rounded-0 border-0 text-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link rounded-0 border-0 text-dark" href="#">3</a></li>
                    <li class="page-item"><a class="page-link rounded-0 border-0 text-dark" href="#">Next</a></li>
                </ul>
            </nav>

        </div>
    </div>
</div>

<?php
    // 3. Poora content variable me store ho gaya
    $page_content = ob_get_clean(); 
    
    // 4. Master Layout call ho gaya (Automatic header/navbar/footer)
include_once __DIR__ . '/../../UserComponents/MasterLayout.php';
?>