<?php
    // 1. Page Title set karein (Baad me yeh database se dynamic product ka naam ban jayega)
    $page_title = "Classic Linen Dress | StyleOwn";
    
    // 2. Output Buffering shuru
    ob_start(); 
?>
<style>
     /* Premium Size Selector Buttons */
    .size-selector input[type="radio"] {
        display: none;
    }
    .size-selector label {
        display: inline-block;
        width: 45px;
        height: 45px;
        line-height: 43px;
        text-align: center;
        border: 1px solid #ddd;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        margin-right: 8px;
        transition: all 0.2s ease;
    }
    .size-selector input[type="radio"]:checked + label {
        border-color: #111;
        background-color: #111;
        color: #fff;
    }
    
    /* Quantity Selector */
    .qty-input {
        width: 60px;
        text-align: center;
        border: 1px solid #ddd;
        border-left: none;
        border-right: none;
        font-size: 0.9rem;
    }
    .qty-btn {
        background: none;
        border: 1px solid #ddd;
        width: 35px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    /* Accordion Customization for Luxury Look */
    .accordion-item {
        border-left: none !important;
        border-right: none !important;
        border-radius: 0 !important;
        background: transparent;
    }
    .accordion-button {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
        padding-left: 0;
        padding-right: 0;
        color: #111 !important;
        background-color: transparent !important;
        box-shadow: none !important;
    }
    .accordion-body {
        padding-left: 0;
        padding-right: 0;
        font-size: 0.85rem;
        color: #666;
        line-height: 1.6;
    }

    /* Mobile Responsive Adjustments */
    @media (max-width: 768px) {
        .main-product-img {
            height: 450px;
        }
        .product-info-panel {
            padding-left: 0;
            margin-top: 2rem;
        }
    }
</style>


<div class="container my-5 pt-3">
    <div class="row">
        
        <div class="col-md-7 d-flex flex-column-reverse flex-md-row gap-3">
            <div class="d-flex flex-row flex-md-column gap-2 product-thumbnails">
                <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=600" class="active" alt="Thumb 1">
                <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600" alt="Thumb 2">
                <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?q=80&w=600" alt="Thumb 3">
            </div>
            
            <div class="flex-grow-1">
                <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=800" class="main-product-img img-fluid" id="mainImage" alt="Classic Linen Dress">
            </div>
        </div>

        <div class="col-md-5">
            <div class="product-info-panel">
                <span class="product-brand">StyleOwn Studio</span>
                <h1 class="product-main-title mt-1 mb-2">Classic Linen Dress</h1>
                
                <div class="product-detail-price mb-4">PKR 4,500</div>
                
                <hr class="text-muted opacity-25 my-4">

                <p class="text-muted small mb-4">
                    An effortless wardrobe essential crafted from premium breathable linen. Features a relaxed silhouette, minimal neckline, and a detachable waist tie-belt for versatile styling. Perfect for warm-weather elegance.
                </p>

                <div class="mb-4">
                    <span class="text-uppercase d-block mb-2 fw-medium" style="font-size: 0.75rem; letter-spacing: 1px;">Select Size</span>
                    <div class="size-selector d-flex">
                        <input type="radio" name="size" id="size-s" value="S" checked>
                        <label for="size-s">S</label>

                        <input type="radio" name="size" id="size-m" value="M">
                        <label for="size-m">M</label>

                        <input type="radio" name="size" id="size-l" value="L">
                        <label for="size-l">L</label>

                        <input type="radio" name="size" id="size-xl" value="XL">
                        <label for="size-xl">XL</label>
                    </div>
                </div>

                <div class="mb-4">
                    <span class="text-uppercase d-block mb-2 fw-medium" style="font-size: 0.75rem; letter-spacing: 1px;">Quantity</span>
                    <div class="d-flex align-items-center">
                        <button type="button" class="qty-btn" onclick="decrementQty()">-</button>
                        <input type="text" id="quantity" class="qty-input py-2" value="1" readonly>
                        <button type="button" class="qty-btn" onclick="incrementQty()">+</button>
                    </div>
                </div>

                <div class="d-grid gap-2 mb-5">
                    <button type="button" class="btn btn-dark rounded-0 py-3 text-uppercase fw-semibold" style="font-size: 0.85rem; letter-spacing: 1px;">Add To Bag</button>
                    <button type="button" class="btn btn-outline-dark rounded-0 py-3 text-uppercase fw-semibold" style="font-size: 0.85rem; letter-spacing: 1px;">Buy It Now</button>
                </div>

                <div class="accordion accordion-flush" id="productSpecs">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne">
                                Materials & Care
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#productSpecs">
                            <div class="accordion-body">
                                * 100% Organic Premium Linen<br>
                                * Light-weight and breathable texture<br>
                                * Hand wash cold or dry clean recommended<br>
                                * Iron on medium heat while damp
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo">
                                Shipping & Returns
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#productSpecs">
                            <div class="accordion-body">
                                * Free standard shipping across Pakistan on orders above PKR 5,000.<br>
                                * Delivery time: 3-5 working days.<br>
                                * Easy 7-day hassle-free return and exchange policy if tags are intact.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    // Thumbnail click par main image change karne ke liye
    const thumbnails = document.querySelectorAll('.product-thumbnails img');
    const mainImage = document.getElementById('mainImage');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            mainImage.src = this.src;
        });
    });

    // Quantity Increment/Decrement functions
    function incrementQty() {
        let qty = document.getElementById('quantity');
        qty.value = parseInt(qty.value) + 1;
    }

    function decrementQty() {
        let qty = document.getElementById('quantity');
        if(parseInt(qty.value) > 1) {
            qty.value = parseInt(qty.value) - 1;
        }
    }
</script>

<?php
    // 3. Buffer content ko variable me save karein
    $page_content = ob_get_clean(); 
    
    // 4. Apna single Master Layout include karein (isme automatic navbar + footer aa jayenge)
include_once __DIR__ . '/../../UserComponents/MasterLayout.php';
?>