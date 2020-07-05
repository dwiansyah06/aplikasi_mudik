<!doctype html>
<html class="no-js" lang="en">

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
    <link rel="stylesheet" href="<?= base_url().'assets/css/slicknav.min.css' ?>">
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url().'assets/css/typography.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/default-css.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/styles.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/css/responsive.css' ?>">
    <!-- modernizr css -->
    <script src="<?= base_url().'assets/js/vendor/modernizr-2.8.3.min.js' ?>"></script>
</head>

<body>
    <div id="preloader" style="display:none">
        <div class="loader"></div>
    </div>

    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form id="quickForm" method="post">
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start your trip</p>
                    </div>
                    <div class="login-form-body">
                        <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="_email" autocomplete="off" required>
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="_pass" autocomplete="off" required>
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Signin <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <script type="text/javascript">
      var BaseUrl = '<?= base_url() ?>';
    </script>
    <!-- jquery latest version -->
    <script src="<?= base_url().'assets/js/vendor/jquery-2.2.4.min.js' ?>"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url().'assets/js/popper.min.js' ?>"></script>
    <script src="<?= base_url().'assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?= base_url().'assets/js/metisMenu.min.js' ?>"></script>
    <script src="<?= base_url().'assets/js/jquery.slimscroll.min.js' ?>"></script>
    <script src="<?= base_url().'assets/js/jquery.slicknav.min.js' ?>"></script>
    <script src="<?= base_url().'assets/plugins/jquery-validation/jquery.validate.min.js' ?>"></script>
    <script src="<?= base_url().'assets/plugins/jquery-validation/additional-methods.min.js' ?>"></script>
    <script src="<?= base_url().'assets/plugins/sweetalert2/sweetalert2.all.min.js' ?>"></script>
    <script src="<?= base_url().'assets/plugins/toastr/toastr.min.js' ?>"></script>
    <!-- others plugins -->
    <script src="<?= base_url().'assets/js/plugins.js' ?>"></script>
    <script src="<?= base_url().'assets/js/scripts.js' ?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
          });

        $.validator.setDefaults({
          submitHandler: function (form) {
            $.ajax({
               url: BaseUrl+'general/login_process',
               type:"POST",
               data: $(form).serialize(),
               beforeSend:function(){
                  $('#preloader').fadeIn();
                },
               success:function(result){
                 var data = JSON.parse(result);

                 $('#preloader').fadeOut();
                 if (data.hasil == 'fail') {
                     // $("#myalert").html('<div class="alert alert-danger"><p class="text-left">' +  + '</p></div>');
                     Toast.fire({
                       icon: 'error',
                       title: data.error.not_found
                     });

                     document.getElementById('exampleInputEmail1').value = null;
                     document.getElementById('exampleInputPassword1').value = null;
                 } else {
                     // window.location=(BaseUrl+'user/');
                     if (data.level == 'admin') {
                       window.location=(BaseUrl+'admin/');
                     } else {
                       window.location=(BaseUrl+'penumpang/');
                     }
                 }
               }
            });
            return false;
          }
        });

        $('#quickForm').validate({
          rules: {
            _email: {
              required: true,
              email: true,
              minlength: 1
            },
            _pass: {
              required: true,
              minlength: 3
            }
          },
          messages: {
            nip: {
              required: "Please enter yor email"
            },
            password: {
              required: "Please provide a password",
              minlength: "Your password must be at least 5 characters long"
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-gp').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      })
    </script>
</body>

</html>
