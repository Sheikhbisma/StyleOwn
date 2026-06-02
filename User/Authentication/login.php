<?php
session_start();

    // 1. Page Title set karein
    $page_title = "Sign In | StyleOwn";
    
    // 2. Output Buffering shuru
    ob_start(); 
?>

<div class="container">
    <div class="login-container shadow-sm">
      
        <!-- Form Header -->
        <div class="text-center mb-5">
            <h1 class="login-title mb-2">Welcome Back</h1>
            <p class="text-muted small">Please enter your details to sign in to your account.</p>
        </div>
        
        <!-- Login Form -->
        <form action="../backend-settings/Login-Settings.php" method="POST" autocomplete="off">
            
            <!-- Error Message Alert Box -->
            <?php if (isset($_SESSION["errorMessage"])): ?>
                <div class="alert alert-danger d-flex align-items-center" style="border-radius: 10px; padding: 15px; margin-bottom: 25px; border: none; background-color: #f8d7da; color: #842029;">
                    <i class="fas fa-exclamation-circle" style="font-size: 18px; margin-right: 10px;"></i> 
                    <div><?php echo $_SESSION["errorMessage"]; ?></div>
                </div>
                <?php unset($_SESSION["errorMessage"]); ?>
            <?php endif; ?>

            <!-- Success Message Alert Box (e.g. Password reset or logout success) -->
            <?php if (isset($_SESSION["successMessage"])): ?>
                <div class="alert alert-success d-flex align-items-center" style="border-radius: 10px; padding: 15px; margin-bottom: 25px; border: none; background-color: #d1e7dd; color: #0f5132;">
                    <i class="fas fa-check-circle" style="font-size: 18px; margin-right: 10px;"></i> 
                    <div><?php echo $_SESSION["successMessage"]; ?></div>
                </div>
                <?php unset($_SESSION["successMessage"]); ?>
            <?php endif; ?>

            <!-- Email Input -->
            <div class="mb-4 style-input-group">
                <label class="style-input-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="name@example.com" 
                       value="<?php echo $_SESSION['old_input']['email'] ?? ''; ?>" required>
            </div>

            <!-- Password Input -->
            <div class="mb-3 style-input-group">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="style-input-label">Password</label>
                    <a href="forgot-password.php" class="forgot-link small mb-2 text-decoration-none">Forgot Password?</a>
                </div>
                <div class="position-relative">
                    <input type="password" name="password" id="UserPassword" class="form-control pe-5" placeholder="Enter your password" required>
                    <!-- Eye Icon for Toggle Password View -->
                    <i class="far fa-eye position-absolute top-50 end-0 translate-middle-y me-3 text-muted" id="togglePassword" style="cursor: pointer;"></i>
                </div>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="form-check mb-4 mt-2">
                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember_me">
                <label class="form-check-label text-muted small user-select-none" for="rememberMe">
                    Remember me on this device
                </label>
            </div>

            <!-- Submit Button -->
            <div class="d-grid mb-4">
                <button type="submit" name="loginAccount" class="btn btn-signup">Sign In</button>
            </div>

            <!-- Link to Signup -->
            <div class="text-center mt-4">
                <p class="text-muted small mb-0">
                    Don't have an account? <a href="signup.php" class="login-link ms-1 fw-bold text-decoration-none">Create Account</a>
                </p>
            </div>

        </form>

    </div>
</div>

<!-- JavaScript for Password Toggle (Optional but Premium Feature) -->
<script>
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('UserPassword');

togglePassword.addEventListener('click', function () {
    // Toggle type attribute
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    
    // Toggle eye icon class
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});
</script>

<?php
    // 3. Clear old inputs after rendering the page
unset($_SESSION['old_input']);
    // 4. Buffer ka saara content variable mein save karein
    $page_content = ob_get_clean(); 
    
    // 5. Master Layout include karein
    include_once __DIR__ . '/../../UserComponents/MasterLayout.php'; 
?>