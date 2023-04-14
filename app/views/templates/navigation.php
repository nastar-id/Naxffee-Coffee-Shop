<?php if ($data["nav_type"] == "Main") : ?>

    <nav class="navbar navbar-expand-lg navbar-dark <?php if(array_key_exists("nav_active", $data)): echo $data["nav_active"]; endif; ?> py-2">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL; ?>"><i class="bi bi-cup-hot"></i><span class="ms-2">Naxffee</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>#about">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= BASE_URL; ?>menu#drink">Drink Menu</a></li>
                            <li><a class="dropdown-item" href="<?= BASE_URL; ?>menu#food">Food Menu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php elseif ($data["nav_type"] == "Dashboard") : ?>

    <div class="main-wrapper">
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <label for="toggle" class="toggle-button">
                <i class="bi bi-list"></i>
            </label>
            <input type="checkbox" id="toggle" class="d-none">
            <div class="navbar-brand">
                <a class="nav-brand-link text-start" href="<?= BASE_URL; ?>"><i class="bi bi-cup-hot"></i> <span class="ms-2">Naxffee</span></a>
            </div>
            <div class="offcanvas-body px-0 mt-1">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-3 mt-3">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>admin"><i class="bi bi-house-fill"></i> <span>Home</span></a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-label" data-text="Post"><div class="dot"></div></span>
                    </li>
                    <li class="nav-item dropend" id="on-hover">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-utensils" style="font-size: 20.5px; transform: translateX(-7.3px) translateY(2px);"></i> <span style="transform: translateX(-2.5px);">Menu</span><i class="bi bi-caret-right-fill arrow"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL; ?>admin/menu/drink"><i class="fa-solid fa-mug-hot me-2"></i> Drink Menu</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL; ?>admin/menu/food"><i class="fa-solid fa-bread-slice me-2"></i> Food Menu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>admin/news"><i class="bi bi-newspaper" style="font-size: 21.2px; transform: translateX(1.2px);"></i> <span style="transform: translateX(5px);">News</span></a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-label" data-text="Images"><div class="dot"></div></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>admin/slider"><i class="bi bi-image" style="font-size: 21.2px; transform: translateX(1.2px);"></i> <span style="transform: translateX(5px);">Slider</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL; ?>admin/gallery"><i class="bi bi-images" style="font-size: 21.2px; transform: translateX(1.2px);"></i> <span style="transform: translateX(5px);">Gallery</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="body-wrapper">
            <nav class="navbar navbar-dark w-100 py-3" style="width: 100vw;">
                <div class="container-fluid">
                    <label for="toggle" class="toggle-button">
                        <i class="bi bi-list"></i>
                    </label>
                    <input type="checkbox" name="toggle" id="toggle" class="d-none">
                    <ul class="navbar-nav dashboard ms-auto">
                        <li class="nav-item">
                            <a class="nav-link with-icon" href="<?= BASE_URL; ?>admin/profile"><i class="bi bi-person-circle"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link with-icon" href="<?= BASE_URL; ?>admin/logout"><i class="fa-solid fa-power-off"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
<?php endif; ?>