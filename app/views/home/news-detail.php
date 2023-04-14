
    <section id="detail" class="news" breadcrumb="true">
        <div class="container">
            <div class="row row-gap-4">
                <div class="col-md-7 col-lg-8">
                    <div class="news-detail">
                        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                            <ol class="breadcrumb text-white">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>news/">News</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $data["detail"]["title"]; ?></li>
                            </ol>
                        </nav>
                        <div class="news-header">
                            <h3><?= $data["detail"]["title"]; ?></h3>
                            <div class="admin">
                                <img src="<?= BASE_URL; ?>img/<?= $data["admin"][0]["image"]; ?>" class="d-inline-block img-fluid rounded-circle me-2" width="25"> by <span class="text-primary"><?= $data["admin"]["0"]["name"]; ?></span> | <?= ucwords($data["detail"]["date"]); ?>
                            </div>
                            <a href="<?= BASE_URL; ?>assets/uploads/<?= $data["detail"]["image"]; ?>" class="glightbox">
                                <img src="<?= BASE_URL; ?>assets/uploads/<?= $data["detail"]["image"]; ?>" class="img-fluid">
                            </a>
                        </div>
                        <div class="mt-4 mb-3">
                            <p><?= nl2br($data["detail"]["news"]); ?></p>
                        </div>
                        <a href="<?= BASE_URL ?>news">Back to news list</a>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="news-sidebar">
                        <div class="latest">
                            <h4>Latest News</h4>
                            <div class="news-head">
                                <img src="<?= BASE_URL; ?>assets/uploads/<?= $data["news"][0]["image"]; ?>" alt="" class="img-fluid">
                                <div class="news-content">
                                    <a href="<?= BASE_URL; ?>news/<?= $data["news"][0]["slug"]; ?>"><?= $data["news"][0]["title"]; ?></a>
                                    <p class="text-white"><?= substr($data["news"][0]["news"], 0, 50); ?>...</p>
                                </div>
                            </div>
                        </div>
                        <div class="list">
                            <h4>More News</h4>
                            <?php $i = 1; foreach($data["news"] as $news): ?>
                            <?php if($i > 3): break; endif; ?>
                            <a class="d-block text-uppercase" href="<?= BASE_URL; ?>news/<?= $news["slug"]; ?>"><?= $news["title"]; ?></a>
                            <p class="pt-0"><?= substr($news["news"], 0, 75); ?>...</p>
                            <?php $i++; endforeach; ?>
                            <a href="<?= BASE_URL; ?>news">Explore more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    