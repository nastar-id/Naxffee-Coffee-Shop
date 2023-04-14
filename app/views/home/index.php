  
    <section id="hero">
        <div id="slider" class="carousel slide carousel-fade" data-bs-interval="3000" data-bs-ride="carousel">
            <div class="banner">
                <h1>Naxffee</h1>
                <span>Work - Study - Relax with <span class="text-primary">Naxffee</span></span>
                <a href="<?= BASE_URL; ?>#menu" class="d-block btn btn-outline-light mt-4">SEE OUR MENU</a>
            </div>
            <div class="carousel-inner">
                <?php foreach($data["slider"] as $slider): ?>
                <div class="carousel-item full-screen">
                    <img src="<?= BASE_URL; ?>assets/slider/<?= $slider["image"]; ?>" class="img-fluid" alt="<?= $slider["title"]; ?>">
                </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="about" class="about main-content">
        <div class="container">
            <div class="section-title">
                <h3><span class="text-primary">About</span> Naxffee</h3>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-4">
                    <div class="logo">
                        <i class="bi bi-cup-hot"></i>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <p>Welcome to <span class="text-primary">Naxffee</span>, a coffee shop where every cup is a masterpiece.</p>
                    <p>Naxffee is a coffee shop where we're passionate about serving the best coffee possible. Our skilled baristas use only the finest coffee beans from around the world to create delicious cups of coffee for our customers. We also offer a range of freshly made pastries, sandwiches, and snacks using locally sourced ingredients.</p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <p>We're committed to creating a friendly and inclusive environment where people can connect over a cup of coffee. Sustainability is also important to us, so we use eco-friendly products and practices wherever possible. Come visit us and enjoy a great cup of coffee!</p>
                    <p>Thank you for choosing Naxffee. We look forward to serving you and being a part of your daily routine.</p>
                    <div class="social-media">
                        <span class="me-1">Social Media: </span>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="menu" class="menu main-content">
        <div class="container">
            <div class="section-title mb-4">
                <h3>What <span class="text-primary">Menu</span> do we have?</h3>
                <span>We have some drinks and foods menu</span>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3 mb-md-0">
                    <h4 class="mb-3">Drink menu</h4>
                    <div class="drink">
                        <div class="img">
                            <img src="<?= BASE_URL; ?>assets/uploads/<?= $data["drink"][0]["image"]; ?>" class="d-block img-fluid" alt="<?= $data["drink"][0]["drinkname"]; ?>">
                            <a href="menu#drink" class="btn btn-primary btn-sm">See More</a>
                        </div>
                        <a href="menu#drink"><b><?= $data["drink"][0]["drinkname"]; ?> >></b></a>
                        <p>At Naxffee, we offer a wide selection of drinks including coffee, tea, smoothies, and specialty drinks. We also offer dairy-free milk alternatives. Come quench your thirst with our delicious beverages!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                    <h4 class="mb-3">Food menu</h4>
                    <div class="food">
                        <div class="img">
                            <img src="<?= BASE_URL; ?>assets/uploads/<?= $data["food"][0]["image"]; ?>" class="d-block img-fluid" alt="<?= $data["food"][0]["foodname"]; ?>">
                            <a href="menu#food" class="btn btn-primary btn-sm">See More</a>
                        </div>
                        <a href="menu#food"><b><?= $data["food"][0]["foodname"]; ?> >></b></a>
                        <p>Naxffee also serve freshly made pastries, sandwiches, and snacks, all made with locally sourced ingredients. Our menu includes gluten-free and vegan options. Come enjoy a tasty bite with your coffee!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mx-auto">
                    <h4 class="mb-3">Opening hours</h4>
                    <div class="opening">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Monday <span class="float-end text-primary">7:00AM - 5:00PM</span></li>
                            <li class="list-group-item">Tuesday <span class="float-end text-primary">7:00AM - 5:00PM</span></li>
                            <li class="list-group-item">Wednesday <span class="float-end text-primary">7:00AM - 5:00PM</span></li>
                            <li class="list-group-item">Thursday <span class="float-end text-primary">7:00AM - 5:00PM</span></li>
                            <li class="list-group-item">Friday <span class="float-end text-primary">7:00AM - 5:00PM</span></li>
                            <li class="list-group-item">Saturday <span class="float-end text-primary">7:00AM - 4:00PM</span></li>
                            <li class="list-group-item">Sunday <span class="float-end text-primary">Closed</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery main-content">
        <div class="section-title mb-4">
            <h3>Our <span class="text-primary">Gallery</span></h3>
        </div>
        <div class="owl-carousel">
            <?php foreach($data["gallery"] as $gallery): ?>
            <div>
                <a href="<?= BASE_URL; ?>assets/gallery/<?= $gallery["image"]; ?>" class="glightbox">
                    <img src="<?= BASE_URL; ?>assets/gallery/<?= $gallery["image"]; ?>" class="img-fluid">
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="news" class="news main-content">
        <div class="container">
            <div class="section-title mb-4">
                <h3><span class="text-primary">News</span> and Events</h3>
            </div>
            <div class="row gap-4 gap-md-0">
                <?php $i = 1; foreach($data["news"] as $news): ?>
                <?php if($i > 2): break; endif; ?>
                <div class="col-md-4">
                    <div class="news-head">
                        <img src="<?= BASE_URL; ?>assets/uploads/<?= $news["image"]; ?>" alt="" class="img-fluid">
                        <div class="news-content">
                            <a href="<?= BASE_URL; ?>news/<?= $news["slug"]; ?>"><?= $news["title"]; ?></a>
                            <p><?= substr($news["news"], 0, 100); ?>...</p>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
                <div class="col-md-4">
                    <?php $i = 1; foreach($data["news"] as $news): ?>
                    <?php if($i > 4): break; endif; ?>
                    <a class="d-block text-uppercase" href="<?= BASE_URL; ?>news/<?= $news["slug"]; ?>"><?= $news["title"]; ?></a>
                    <p class="pt-0"><?= substr($news["news"], 0, 50); ?>...</p>
                    <?php $i++; endforeach; ?>
                    <a href="<?= BASE_URL; ?>news">Explore more</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact main-content">
        <div class="container">
            <div class="section-title mb-4">
                <h3><span class="text-primary">Contact</span> us</h3>
            </div>
            <div class="row gap-4 gap-md-0">
                <div class="col-md-6 order-2">
                    <div class="card">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe width="100%" height="250px" id="gmap_canvas" src="https://maps.google.com/maps?q=monas&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                        <div class="card-body mt-3">
                            <h5 class="card-title"><i class="bi bi-geo-alt-fill"></i> Our Address</h5>
                            <p>RT.5/RW.2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="card-title"><i class="bi bi-telephone-fill"></i> Phone</h5>
                                    <p>+6289xxxxxxxxx</p>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="card-title"><i class="bi bi-envelope-fill"></i> Mail</h5>
                                    <p>naxffee@email.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-1">
                    <form action="" method="post" style="transform: translateY(-10px);">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Your name</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100% !important;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    