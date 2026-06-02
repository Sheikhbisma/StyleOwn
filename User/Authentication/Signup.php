<?php
session_start();

// 1. Page Title set karein
$page_title = "Create An Account | StyleOwn";

// 2. Output Buffering shuru
ob_start();
?>



<div class="container">
    <div class="signup-container shadow-sm">

        <div class="text-center mb-5">
            <h1 class="signup-title mb-2">Create Account</h1>
            <p class="text-muted small">Please fill in the details below to register.</p>
        </div>

        <form action="../backend-settings/Signup-Setting.php" method="POST" autocomplete="off">
            <?php if (isset($_SESSION["successMessage"])): ?>
                <div class="alert alert-success d-flex align-items-center" style="border-radius: 10px; padding: 15px; margin-bottom: 25px; border: none; background-color: #d1e7dd; color: #0f5132;">
                    <i class="fas fa-check-circle" style="font-size: 18px; margin-right: 10px;"></i>
                    <div><?php echo $_SESSION["successMessage"]; ?></div>
                </div>
                <?php unset($_SESSION["successMessage"]); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION["errorMessage"])): ?>
                <div class="alert alert-danger d-flex align-items-center" style="border-radius: 10px; padding: 15px; margin-bottom: 25px; border: none; background-color: #f8d7da; color: #842029;">
                    <i class="fas fa-exclamation-circle" style="font-size: 18px; margin-right: 10px;"></i>
                    <div><?php echo $_SESSION["errorMessage"]; ?></div>
                </div>
                <?php unset($_SESSION["errorMessage"]); ?>
            <?php endif; ?>
            <div class="mb-4 style-input-group">
                <label class="style-input-label">First Name</label>
                <input type="text" value="<?php  echo $_SESSION['oldValues']['first_name'] ?? '' ?>" name="first_name" class="form-control" placeholder="e.g. Ayesha" required>
            </div>

            <div class="mb-4 style-input-group">
                <label class="style-input-label">Last Name</label>
                <input type="text" value="<?php  echo $_SESSION['oldValues']['last_name'] ?? '' ?>"  name="last_name" class="form-control" placeholder="e.g. Khan" required>
            </div>

            <div class="mb-4 style-input-group">
                <label class="style-input-label">Email Address</label>
                <input type="email" value="<?php  echo $_SESSION['oldValues']['email'] ?? '' ?>"  name="email" class="form-control" placeholder="name@example.com" required>
            </div>

            <div class="mb-4 style-input-group">
                <label class="style-input-label">Password</label>
                <input type="password" name="password" id="UserPassword" class="form-control" placeholder="Min. 8 characters" required>
                <div class="form-text text-muted small mt-2 d-none" id="messageBox">
                    <p class="mb-1 text-danger" id="length">➔ Password must be at least 8 characters long.</p>
                    <p class="mb-1 text-danger" id="alpha">➔ Must contain at least one alphabet (A-Z or a-z).</p>
                    <p class="mb-1 text-danger" id="characters">➔ Must contain at least one number and one special character (e.g. @, #, $).</p>
                </div>
            </div>

            <div class="form-check mb-4 mt-2">
                <input class="form-check-input" type="checkbox" id="newsletter" name="subscribe" checked>
                <label class="form-check-label text-muted small user-select-none" for="newsletter">
                    Subscribe to StyleOwn newsletter for exclusive updates and offers.
                </label>
            </div>

            <div class="d-grid mb-4">
                <button type="submit" name="registerAccount" class="btn btn-signup">Register Account</button>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small mb-0">
                    Already have an account? <a href="login.php" class="login-link ms-1">Sign In</a>
                </p>
            </div>

        </form>

    </div>
</div>
<script>
    let UserPassword = document.getElementById('UserPassword');

    let messageBox = document.getElementById('messageBox');

    let passLength = document.getElementById('length');

    let passalpha = document.getElementById('alpha');

    let characters = document.getElementById('characters');



    UserPassword.addEventListener('focus', () => {
        messageBox.classList.remove('d-none')
    });

    UserPassword.addEventListener('input', () => {
        const passwordValue = UserPassword.value;

        passLength.className = passwordValue.length >= 8 ? "text-success mb-1" : "text-danger mb-1";
        passLength.innerHTML = passwordValue.length >= 8 ? "✔ Password must be at least 8 characters long." : "❌ Password must be at least 8 characters long.";

        let checkAlpha = /[A-Za-z]/.test(passwordValue);
        passalpha.className = checkAlpha ? "text-success mb-1" : "text-danger mb-1";
        passalpha.innerHTML = checkAlpha ? "✔ Must contain at least one alphabet (A-Z or a-z)." : "❌ Must contain at least one alphabet (A-Z or a-z).";

        let checkchars = /(?=.*\d)(?=.*[!@#$%^&*])/.test(passwordValue);
        characters.className = checkchars ? "text-success mb-1" : "text-danger mb-1";
        characters.innerHTML = checkchars ? "✔  Must contain at least one number and one special character (e.g. @, #, $)." : "❌  Must contain at least one number and one special character (e.g. @, #, $).";


    })
</script>
<?php
unset($_SESSION['oldValues']);
// 3. Buffer ka saara content variable mein save karein
$page_content = ob_get_clean();

// 4. Master Layout include karein (Aapki file hierarchy ke mutabiq relative path)
include_once __DIR__ . '/../../UserComponents/MasterLayout.php';
?>