<?php
   $page_title = "StyleOwn | Home";
    ob_start(); // PHP ko bolo: "Niche wali HTML ko abhi hold par rakho"
 ?>
<main>
<section class="hero-section mb-5">
    <div class="container-fluid px-0">
        <div class="position-relative d-flex align-items-center justify-content-center text-center p-5" 
             style="min-height: 75vh; background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.25)), url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1600') center/cover no-repeat;">
            
            <div class="p-5 rounded-0 text-dark shadow-sm style-hero-box" 
                 style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(10px); max-width: 550px;">
                <span class="text-uppercase text-muted d-block mb-2" style="font-size: 0.75rem; letter-spacing: 2px; font-weight: 500;">Summer Collection</span>
                <h1 class="display-5 mb-3" style="font-family: 'Playfair Display', serif; font-weight: 500; letter-spacing: 1px;">The Summer Edit</h1>
                <p class="text-muted small mb-4">Discover minimal silhouettes, breathable fabrics, and effortless premium styles curated for your everyday aesthetic.</p>
                <a href="newin.php" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase btn-sm fw-medium" style="letter-spacing: 1px; font-size: 0.8rem;">Shop Collection</a>
            </div>
        </div>
    </div>
</section>

<section class="container my-5 py-4">
    <div class="text-center mb-5">
        <h2 style="font-family: 'Playfair Display', serif; font-weight: 500; letter-spacing: 1px;">New Arrivals</h2>
        <p class="text-muted small text-uppercase" style="letter-spacing: 2px;">Just Added to StyleOwn</p>
    </div>
    
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <div class="card border-0 rounded-0 bg-transparent text-center product-card">
                <div class="position-relative overflow-hidden style-img-wrapper" style="background-color: #f3f3f3;">
                    <span class="position-absolute top-0 start-0 bg-dark text-white text-uppercase px-3 py-1 m-2 fw-medium" style="font-size: 0.65rem; letter-spacing: 1px; z-index: 2;">New</span>
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=600" class="w-100 object-fit-cover transition-all" style="height: 400px;" alt="Classic Linen Dress">
                </div>
                <div class="card-body px-0 pt-3">
                    <a href="#" class="text-dark text-decoration-none text-uppercase fw-medium d-block mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">Classic Linen Dress</a>
                    <span class="text-muted" style="font-size: 0.9rem;">PKR 4,500</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card border-0 rounded-0 bg-transparent text-center product-card">
                <div class="position-relative overflow-hidden style-img-wrapper" style="background-color: #f3f3f3;">
                    <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?q=80&w=600" class="w-100 object-fit-cover transition-all" style="height: 400px;" alt="Sleek Blazer Set">
                </div>
                <div class="card-body px-0 pt-3">
                    <a href="#" class="text-dark text-decoration-none text-uppercase fw-medium d-block mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">Sleek Blazer Set</a>
                    <span class="text-muted" style="font-size: 0.9rem;">PKR 8,900</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card border-0 rounded-0 bg-transparent text-center product-card">
                <div class="position-relative overflow-hidden style-img-wrapper" style="background-color: #f3f3f3;">
                    <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?q=80&w=600" class="w-100 object-fit-cover transition-all" style="height: 400px;" alt="Minimalist Heels">
                </div>
                <div class="card-body px-0 pt-3">
                    <a href="#" class="text-dark text-decoration-none text-uppercase fw-medium d-block mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">Minimalist Heels</a>
                    <span class="text-muted" style="font-size: 0.9rem;">PKR 3,800</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card border-0 rounded-0 bg-transparent text-center product-card">
                <div class="position-relative overflow-hidden style-img-wrapper" style="background-color: #f3f3f3;">
                    <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=600" class="w-100 object-fit-cover transition-all" style="height: 400px;" alt="Leather Shoulder Bag">
                </div>
                <div class="card-body px-0 pt-3">
                    <a href="#" class="text-dark text-decoration-none text-uppercase fw-medium d-block mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">Leather Shoulder Bag</a>
                    <span class="text-muted" style="font-size: 0.9rem;">PKR 5,400</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container my-5 py-4">
    <div class="text-center mb-5">
        <h2 style="font-family: 'Playfair Display', serif; font-weight: 500; letter-spacing: 1px;">Explore Collections</h2>
        <p class="text-muted small text-uppercase" style="letter-spacing: 2px;">Curated Styles For Every Occasion</p>
    </div>
    
    <div class="row g-4">
        <div class="col-md-6">
            <a href="dresses.php" class="position-relative d-flex align-items-center justify-content-center text-decoration-none overflow-hidden style-category-banner" style="height: 380px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25 style-overlay" style="z-index: 2;"></div>
                <img src="https://images.unsplash.com/photo-1612336307429-8a898d10e223?q=80&w=800" class="position-absolute w-100 h-100 object-fit-cover transition-all" alt="Dresses">
                <h3 class="text-white position-relative" style="z-index: 3; font-family: 'Playfair Display', serif; font-size: 2.2rem; letter-spacing: 2px;">Dresses</h3>
            </a>
        </div>

        <div class="col-md-6">
            <a href="accessories.php" class="position-relative d-flex align-items-center justify-content-center text-decoration-none overflow-hidden style-category-banner" style="height: 380px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25 style-overlay" style="z-index: 2;"></div>
                <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?q=80&w=800" class="position-absolute w-100 h-100 object-fit-cover transition-all" alt="Accessories">
                <h3 class="text-white position-relative" style="z-index: 3; font-family: 'Playfair Display', serif; font-size: 2.2rem; letter-spacing: 2px;">Accessories</h3>
            </a>
        </div>
    </div>
</section>
</main>
<?php
    $page_content = ob_get_clean(); // Saara HTML content is variable mein save ho gaya
    
    // Bas is ek line se Navbar, Aapka Content, aur Footer teeno sahi order mein load ho jayenge!
    include_once __DIR__ . '/UserComponents/MasterLayout.php'; 
?>