
    <?php if(array_key_exists("nav_type", $data) && $data["nav_type"] == "Main"): ?>
    <footer class="footer">
        <div class="container">
            <div class="row gap-5 gap-md-0">
                <div class="col-md-4">
                    <h4>Contact</h4>
                    <p>RT.5/RW.2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat</p>
                    <p>Phone: +6289xxxxxxxxx</p>
                    <p>Email: naxffee@email.com</p>
                    <div class="social-media">
                        <span class="me-1">Social Media: </span>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>News</h4>
                    <?php $i = 1; foreach($data["news"] as $news): ?>
                    <?php if($i > 3): break; endif; ?>
                    <a class="d-block text-uppercase" href="<?= BASE_URL; ?>news/<?= $news["slug"]; ?>"><?= $news["title"]; ?></a>
                    <p class="pt-0"><?= substr($news["news"], 0, 50); ?>...</p>
                    <?php $i++; endforeach; ?>
                </div>
                <div class="col-md-4">
                    <h4>Links</h4>
                    <a class="d-block mb-3" href="<?= BASE_URL; ?>"><i class="bi bi-chevron-right"></i> <span class="text-white fst-italic">Home</span></a>
                    <a class="d-block mb-3" href="<?= BASE_URL; ?>#about"><i class="bi bi-chevron-right"></i> <span class="text-white fst-italic">About</span></a>
                    <a class="d-block mb-3" href="<?= BASE_URL; ?>#menu"><i class="bi bi-chevron-right"></i> <span class="text-white fst-italic">Menu</span></a>
                    <a class="d-block mb-3" href="<?= BASE_URL; ?>#gallery"><i class="bi bi-chevron-right"></i> <span class="text-white fst-italic">Gallery</span></a>
                    <a class="d-block mb-3" href="<?= BASE_URL; ?>#news"><i class="bi bi-chevron-right"></i> <span class="text-white fst-italic">News</span></a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-start">
                        Copyright 2023 <span class="text-primary">Naxffee</span>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end mt-2 mt-lg-0">
                        Made with <i class="bi bi-heart-fill"></i> By <a href="https://github.com/nastar-id">Naxtarrr</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php endif; ?>

    <script src="<?= BASE_URL; ?>assets/vendor/owlcarousel/dist/owl.carousel.min.js"></script>
    
    <script src="<?= BASE_URL; ?>assets/js/glightbox.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/script.js?ts=<?=time()?>&quot"></script>
</body>
</html>