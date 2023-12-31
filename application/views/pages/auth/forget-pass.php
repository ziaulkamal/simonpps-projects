<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('public/'); ?>images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('public/'); ?>images/favicon.png" type="image/x-icon">
    <title><?= $title; ?></title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/sweetalert2.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url('public/'); ?>css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/'); ?>css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>         
      <div class="container-fluid p-0"> 
        <div class="row m-0">
          <div class="col-12 p-0">    
            <div class="login-card">              
              <div class="login-main"> 
                <form class="theme-form login-form" action="<?= base_url($action) ?>" method="POST">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                  <h4 class="mb-3">Lupa Password</h4>
                  <div class="form-group">
                    <label>Masukkan Email Anda</label>
                    <div class="row">
                      <div class="col-8 col-sm-12">
                        <input class="form-control" type="email" name="email">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Ajukan</button>
                  </div>
                  <p>Sudah punya akun ?<a class="ms-2" href="<?= base_url('auth'); ?>">Log in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->
    <!-- latest jquery-->
    <script src="<?= base_url('public/'); ?>js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="<?= base_url('public/'); ?>js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url('public/'); ?>js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?= base_url('public/'); ?>js/sidebar-menu.js"></script>
    <script src="<?= base_url('public/'); ?>js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="<?= base_url('public/'); ?>js/bootstrap/popper.min.js"></script>
    <script src="<?= base_url('public/'); ?>js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="<?= base_url('public/'); ?>js/sweet-alert/sweetalert.min.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= base_url('public/'); ?>js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>