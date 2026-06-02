<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-3">
    <div class="container">
        
        <a class="navbar-brand fw-bold" href="index.php" style="letter-spacing: 1px;">STYLEOWN</a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-2">
                <li class="nav-item"><a class="nav-link" href="newin.php">New In</a></li>
                <li class="nav-item"><a class="nav-link" href="clothing.php">Clothing</a></li>
                <li class="nav-item"><a class="nav-link" href="dresses.php">Dresses</a></li>
                <li class="nav-item"><a class="nav-link" href="shoes.php">Shoes</a></li>
                <li class="nav-item"><a class="nav-link" href="accessories.php">Accessories</a></li>
                <li class="nav-item"><a class="nav-link nav-sale" href="sale.php">Sale</a></li>
            </ul>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            
            <a href="#" class="nav-icon text-dark fs-5"><i class="bi bi-search"></i></a>
            
            <?php if (isset($_SESSION['userid'])): ?>
                <div class="dropdown">
                    <a class="d-flex align-items-center profile-dropdown-toggle text-decoration-none" 
                       href="#" id="userNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar-circle me-2">
                            <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
                        </div>
                        <span class="user-nav-name d-none d-md-inline text-dark fw-medium small">
                            Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </span>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 animated fadeIn mt-3" 
                        aria-labelledby="userNavbarDropdown" style="border-radius: 12px; min-width: 210px; right: 0;">
                        <li class="px-3 py-2 border-bottom mb-1">
                            <p class="text-muted small mb-0" style="font-size: 0.75rem;">Signed in as</p>
                            <p class="fw-bold text-dark text-truncate mb-0 small"><?php echo $_SESSION['email']; ?></p>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2" href="../User/Dashboard.php">
                                <i class="far fa-user-circle me-2 text-muted" style="font-size: 16px Meso;"></i> My Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2" href="../User/Orders.php">
                                <i class="fas fa-shopping-bag me-2 text-muted" style="font-size: 16px;"></i> My Orders
                            </a>
                        </li>
                        <li><hr class="dropdown-divider text-muted"></li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center py-2 text-danger" href="../backend-settings/Logout.php">
                                <i class="fas fa-sign-out-alt me-2" style="font-size: 16px;"></i> Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="../Authentication/login.php" class="nav-icon text-dark fs-5" title="Sign In">
                    <i class="bi bi-person"></i>
                </a>
            <?php endif; ?>

            <a href="#" class="nav-icon text-dark fs-5 position-relative">
                <i class="bi bi-bag"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" style="font-size: 0.55rem; padding: 0.25em 0.4em;">0</span>
            </a>
            
        </div>

    </div>
</nav>