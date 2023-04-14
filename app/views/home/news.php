
    <section id="breadcrumbs" breadcrumb="true">
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">News</li>
                </ol>
                <h3>News & Events</h3>
            </div>
        </nav>
    </section>

    <section id="news" class="news mb-4">
        <div class="page section-title">
            <h3><span class="text-primary">News</span> List</h3>
        </div>
        <div class="container">
            <div class="row row-gap-4">
                <?php foreach($data["news"] as $news): ?>
                <div class="col-md-6 col-xl-4">
                    <div class="news-head">
                        <img src="<?= BASE_URL; ?>assets/uploads/<?= $news["image"]; ?>" alt="" class="img-fluid">
                        <div class="news-content">
                            <a href="<?= BASE_URL; ?>news/<?= $news["slug"]; ?>"><?= $news["title"]; ?></a>
                            <p class="text-white"><?= substr($news["news"], 0, 100); ?>...</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>