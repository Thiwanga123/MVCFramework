<?php require APPROOT . '/views/inc/components/loginheader.php'; ?>

<div class="login-box">
    <h1>Login</h1>
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <label for="email">Email / Username</label>
        <input type="email" id="email" name="email" required value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
        <span class="form-invalid"><?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?></span>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
        <span class="form-invalid"><?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?></span>

        <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>
</div>

<div class="right">
    <p>Plan your perfect trip! Log in for personalized recommendations, exclusive deals, and seamless planning tools.</p>
</div>

<!-- Correcting the path for the JS file -->
<script src="<?php echo URLROOT; ?>/js/SignIn.js"></script>
</body>
</html>