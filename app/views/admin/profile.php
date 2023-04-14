
            <section id="profile" class="mt-4 pb-4">
                <div class="container-fluid">
                    <?php Flash::flash(); ?>
                    <h2>Profile Details</h2>

                    <div class="row row-gap-4 mt-4">
                        <div class="col-md-5">
                            <div class="profile-card">
                                <div class="header"></div>
                                <div class="profile-details">
                                    <div class="profile-img">
                                        <img src="<?= BASE_URL; ?>img/<?= $data["admin"]["image"]; ?>" class="img-fluid rounded-circle">
                                        <label for="profile-img"><i class="bi bi-camera"></i></label>
                                    </div>
                                    <h5><?= $data["admin"]["name"]; ?></h5>
                                    <p><?= $data["admin"]["email"]; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <form method="POST" action="<?= BASE_URL; ?>admin/action/edit/profile" enctype="multipart/form-data">
                                <input type="hidden" name="table" value="admin">
                                <input type="hidden" name="id" value="<?= $data["admin"]["id"]; ?>">
                                <input type="file" name="image" id="profile-img" class="d-none">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?= $data["admin"]["name"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $data["admin"]["email"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $data["admin"]["username"]; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="mb-3">
                                    <label for="password2" class="form-label">Password Confirmation</label>
                                    <input type="password" name="password2" class="form-control" id="password2">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
