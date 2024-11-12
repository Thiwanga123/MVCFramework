
        <?php require APPROOT . '/views/inc/components/loginheader.php'; ?>

            <div class="login-box">
                <h1>Create Your Account</h1>
                <form>

                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"required>

                    <button type="submit" class="signup-btn">Create Account</button>
                </form>

            </div>

        <?php require APPROOT . '/views/inc/components/loginfooter.php'; ?>

