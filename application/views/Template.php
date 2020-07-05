<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $judul ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= base_url().'assets/images/icon/favicon.ico' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/themify-icons.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/metisMenu.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/slicknav.min.css' ?>">
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/typography.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/default-css.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/styles.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/responsive.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap-toggle.min.css' ?>">
  </head>
  <body>

    <!-- preloader area start -->
    <div id="preloader" style="display: none">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?= $_sidebar; ?>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?= $_header; ?>
            <!-- header area end -->

            <?= $_content; ?>
        </div>

        <?= $_footer; ?>
    </div>

  <script type="text/javascript">
      var BaseUrl = '<?= base_url() ?>';
  </script>
  <script src="<?= base_url().'assets/js/vendor/jquery-2.2.4.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/popper.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/bootstrap.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/owl.carousel.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/metisMenu.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/jquery.slimscroll.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/jquery.slicknav.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/bootstrap-toggle.min.js' ?>"></script>
  <script src="<?= base_url().'assets/plugins/sweetalert2/sweetalert2.all.min.js' ?>"></script>
  <script src="<?= base_url().'assets/plugins/toastr/toastr.min.js' ?>"></script>
  <script src="<?= base_url().'assets/js/plugins.js' ?>"></script>
  <script src="<?= base_url().'assets/js/scripts.js' ?>"></script>
  <script src="<?= base_url().'assets/js/mine.js' ?>"></script>
  <script src="<?= base_url().'assets/js/ajax.js' ?>"></script>
  </body>
</html>
