<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title><?= $data["page_title"]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Jost&family=Roboto&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/vendor/fontawsome-6.4.0/css/all.min.css">

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/vendor/owlcarousel/dist/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/glightbox.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/theme.css?ts=<?=time()?>&quot">

    <script src="<?= BASE_URL; ?>assets/js/jquery.min.js"></script>
    <script>const baseurl = '<?= BASE_URL; ?>';</script>
</head>
<body <?php if(array_key_exists("nav_type", $data) && $data["nav_type"] == "Main"): ?>class="overflow-hidden" <?php endif; ?>>
    <?php if(array_key_exists("nav_type", $data) && $data["nav_type"] == "Main"): ?>
    <div class="loading" id="loading">
        <i class="bi bi-cup-hot"></i>
        <div class="stage">
            <p>Loading</p>
            <div class="dot-elastic"></div>
        </div>
    </div>
    <?php endif; ?>