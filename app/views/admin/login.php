<?php
if(isset($_SESSION["login"])) header("Location: " . BASE_URL . "admin/index");
?>

    <section id="login" class="login position-relative mid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-xl-5 mx-auto">
                    <?php Flash::flash(); ?>
                    <div class="login-wrapper">
                        <h2 class="mb-4"><i class="bi bi-person-fill"></i> Admin Login</h2>
                        <form method="POST" action="<?= BASE_URL; ?>admin/loginAction">
                            <div class="mb-4">
                                <label for="username" class="form-label">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                    <span>Username</span>
                                </label>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <span>Password</span>
                                </label>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <a href="<?= BASE_URL; ?>" class="home"><i class="bi bi-house-fill"></i></a>
    </section>