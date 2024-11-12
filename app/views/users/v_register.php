<?php require APPROOT . '/views/inc/components/loginheader.php'; ?>

<div class="login-box">
    <h1>Create Your Account</h1>
    <form action="<?php echo URLROOT; ?>/users/register" method="POST">

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
        <?php echo isset($data['name_err']) ? $data['name_err'] : ''; ?>

        <label for="telephone_number">Telephone Number</label>
        <input type="text" id="telephone_number" name="telephone_number" value="<?php echo isset($data['telephone_number']) ? $data['telephone_number'] : ''; ?>">
        <?php echo isset($data['telephone_err']) ? $data['telephone_err'] : ''; ?>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
        <?php echo isset($data['email_err']) ? $data['email_err'] : ''; ?>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
        <?php echo isset($data['password_err']) ? $data['password_err'] : ''; ?>

        <button type="submit" class="signup-btn">Create Account</button>
    </form>
</div>

<?php require APPROOT . '/views/inc/components/loginfooter.php'; ?>