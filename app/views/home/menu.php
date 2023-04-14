
    <section id="breadcrumbs" breadcrumb="true">
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Menu</li>
                </ol>
                <h3>Menu List</h3>
            </div>
        </nav>
    </section>

    <section id="drink" class="menu-list">
        <div class="page section-title">
            <h3><span class="text-primary">Drink</span> Menu</h3>
        </div>
        <div class="container">
            <div class="row">
                <?php $i = 1; foreach($data["drink"] as $drink): ?>
                <?php $price = ($drink["discount"] > 0) ? $drink["price"] - ($drink["price"] * $drink["discount"] / 100) : $drink["price"]; ?>
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="d-flex position-relative">
                            <div class="price">Rp. <?= $price; ?></div>
                            <div class="card-img full-screen">
                                <img src="<?= BASE_URL; ?>assets/uploads/<?= $drink["image"]; ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $drink["drinkname"]; ?></h5>
                                <p class="card-text"><?= $drink["description"]; ?></p>
                            </div>
                            <?php if($drink["discount"] > 0): ?>
                            <div class="discount"><?= $drink["discount"]; ?>% OFF</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </section>

    <section id="food" class="menu-list">
        <div class="page section-title">
            <h3><span class="text-primary">Food</span> Menu</h3>
        </div>
        <div class="container">
            <div class="row">
                <?php $i = 1; foreach($data["food"] as $food): ?>
                <?php $price = ($food["discount"] > 0) ? $food["price"] - ($food["price"] * $food["discount"] / 100) : $food["price"]; ?>
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="d-flex position-relative">
                            <div class="price">Rp. <?= $price; ?></div>
                            <div class="card-img">
                                <img src="<?= BASE_URL; ?>assets/uploads/<?= $food["image"]; ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $food["foodname"]; ?></h5>
                                <p class="card-text"><?= $food["description"]; ?></p>
                            </div>
                            <?php if($food["discount"] > 0): ?>
                            <div class="discount"><?= $food["discount"]; ?>% OFF</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </section>