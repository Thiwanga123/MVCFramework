<?php require APPROOT . '/views/inc/components/loginheader.php'; ?>

<div class="login-box">
    <h1>Login</h1>
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <label for="email">Email / Username</label>
        <input type="email" id="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">

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