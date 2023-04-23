<?php
$title = "Page login";
if (isset($_GET['status']) && $_GET['status'] == 'berhasil_register') {
    echo '<h4>Berhasil Register</h4>';
}
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card" id="login-card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="post" action="code/login.php">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="button" class="btn btn-secondary" id="register-btn">Register</button>
                    </form>
                </div>
            </div>
            <div class="card" id="register-card" style="display: none;">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="post" action="code/register.php">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <button type="button" class="btn btn-secondary" id="back-btn">Back to Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loginCard = document.getElementById("login-card");
    var registerCard = document.getElementById("register-card");
    var registerBtn = document.getElementById("register-btn");
    var backBtn = document.getElementById("back-btn");

    registerBtn.addEventListener("click", function() {
        loginCard.style.display = "none";
        registerCard.style.display = "block";
    });

    backBtn.addEventListener("click", function() {
        loginCard.style.display = "block";
        registerCard.style.display = "none";
    });
</script>