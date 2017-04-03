<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title><?php echo $title ?></title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link rel="shortcut icon" href="<?= assets_url(); ?>ico/favicon.png">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?= assets_url(); ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= assets_url(); ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?= assets_url(); ?>global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?= assets_url(); ?>global/css/components.css" rel="stylesheet">
  <link href="<?= assets_url(); ?>frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?= assets_url(); ?>frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?= assets_url(); ?>frontend/layout/css/themes/cyan.css" rel="stylesheet" id="style-color">
  <link href="<?= assets_url(); ?>frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo col-md-2 col-md-offset-5" href="<?= site_url() ?>">QFACE</a>
      </div>
    </div>
    <!-- Header END -->

    <div class="main">
      <div class="container" style="min-height: 500px;">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <div class="content-page">
              <div class="row">
                <!-- BEGIN SERVICE BLOCKS -->               
                <div class="col-md-12">
                  <div class="row margin-bottom-20">
                      <div class="col-md-4 col-md-offset-4" id="search-layanan" data-layanan-id="<?php echo $layanan->layanan_id ?>">
                        <div class="service-box-v1">
                          <h2 class="judul-layanan"><?php echo strtoupper($layanan->nama_layanan) ?></h2>
                          <p>Current queue: <div class="white" id="nomor-sekarang-<?php echo $layanan->layanan_id ?>"></div></p>
                          <p><div class="white" id="nama-sekarang-<?php echo $layanan->layanan_id ?>"></div></p>
                          <hr>
                          <p> Your queue : <div class="white" id='nomor-antrian' data-nomor-antrian="<?php echo $layanan->nomor_antrian ?>"><?php echo $layanan->pelanggan_id ?> </div></p>
                          <p> <div class="white" class="green"> <?php echo $layanan->nama_pelanggan ?></div></p>
                          <hr>
                          <p> Remaining queue :</p>
                          <p> <div class="white" class="green" id="sisa-antrian"></div></p>
                        </div>
                      </div>
                  </div>
                </div>
                <!-- END SERVICE BLOCKS -->  
              </div>

            </div>
          </div>
        </oiv>
      </div>
    </div>


    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2014 © QFace. ALL Rights Reserved.
          </div>
          <!-- END COPYRIGHT -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="<?= assets_url(); ?>global/plugins/respond.min.js"></script>
    <![endif]--> 
    <script src="<?= assets_url(); ?>global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?= assets_url(); ?>global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?= assets_url(); ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?= assets_url(); ?>frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?= assets_url(); ?>global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

    <script src="<?= assets_url(); ?>frontend/layout/scripts/layout.js" type="text/javascript"></script>

    <script type="text/javascript">
         $(document).ready(function(){
            //ajax.php is called every second to get view count from server
            var ajaxDelay = 1000;
            
                datalayananid = $('#search-layanan').attr("data-layanan-id")
                nomor_antrian = $('#nomor-antrian').attr("data-nomor-antrian")

                setInterval(function(){
                    $.ajax({
                        url: '<?php echo base_url(); ?>' + 'search/getQueue',
                        dataType: 'json',
                        type: 'post',
                        data: { layanan_id: datalayananid },
                        success: function(data) {
                            if (data['current'] != 0) {
                                $('#nomor-sekarang-' + data['current']['layanan_id']).html( data['current']['pelanggan_id'] );
                                $('#nama-sekarang-' + data['current']['layanan_id']).html( data['current']['nama_pelanggan'] );
                            }else{
                                $('#nomor-sekarang-' + data['current']['layanan_id']).html( 'Kosong' );
                                $('#nama-sekarang-' + data['current']['layanan_id']).html( 'Kosong' );
                            };
                            var sisa_antrian = nomor_antrian - data['current']['nomor_antrian'];
                            if (sisa_antrian === 0) {
                                $('#sisa-antrian').html( 'this is your turn' );
                            }else if(sisa_antrian < 0){
                                $('#sisa-antrian').html( "you 've missed your turn" );
                            }else{
                                $('#sisa-antrian').html( sisa_antrian );
                            };
                                


                        }
                    });
                }, ajaxDelay);
        }); 
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>