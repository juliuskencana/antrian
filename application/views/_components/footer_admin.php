
            </section>
        </section>
    </section>
    <script src="<?= assets_admin_url(); ?>js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= assets_admin_url(); ?>js/bootstrap.js"></script>
    <!-- App -->
    <script src="<?= assets_admin_url(); ?>js/app.js"></script>
    <script src="<?= assets_admin_url(); ?>js/app.plugin.js"></script>
    <script src="<?= assets_admin_url(); ?>js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= assets_admin_url(); ?>js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="<?= assets_admin_url(); ?>js/charts/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= assets_admin_url(); ?>js/charts/flot/jquery.flot.min.js"></script>
    <script src="<?= assets_admin_url(); ?>js/charts/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= assets_admin_url(); ?>js/charts/flot/jquery.flot.resize.js"></script>
    <script src="<?= assets_admin_url(); ?>js/charts/flot/jquery.flot.grow.js"></script>
    <script src="<?= assets_admin_url(); ?>js/charts/flot/demo.js"></script>

    <script src="<?= assets_admin_url(); ?>js/calendar/bootstrap_calendar.js"></script>
    <script src="<?= assets_admin_url(); ?>js/calendar/demo.js"></script>

    <script src="<?= assets_admin_url(); ?>js/sortable/jquery.sortable.js"></script>


    <!-- Form -->
    
    <script src="<?= assets_admin_url(); ?>js/fuelux/fuelux.js"></script>
    <!-- datepicker -->
    <script src="<?= assets_admin_url(); ?>js/datepicker/bootstrap-datepicker.js"></script>
    <!-- slider -->
    <script src="<?= assets_admin_url(); ?>js/slider/bootstrap-slider.js"></script>
    <!-- file input -->  
    <script src="<?= assets_admin_url(); ?>js/file-input/bootstrap-filestyle.min.js"></script>
    <!-- combodate -->
    <script src="<?= assets_admin_url(); ?>js/libs/moment.min.js"></script>
    <script src="<?= assets_admin_url(); ?>js/combodate/combodate.js"></script>
    <!-- select2 -->
    <script src="<?= assets_admin_url(); ?>js/select2/select2.min.js"></script>
    <!-- wysiwyg -->
    <script src="<?= assets_admin_url(); ?>js/wysiwyg/jquery.hotkeys.js"></script>
    <script src="<?= assets_admin_url(); ?>js/wysiwyg/bootstrap-wysiwyg.js"></script>
    <script src="<?= assets_admin_url(); ?>js/wysiwyg/demo.js"></script>
    <!-- markdown -->
    <script src="<?= assets_admin_url(); ?>js/markdown/epiceditor.min.js"></script>
    <script src="<?= assets_admin_url(); ?>js/markdown/demo.js"></script>

    <!-- Form -->
    <?php if ($this->uri->segment(2) == 'dashboard'): ?>
        <script type="text/javascript">
            $(document).ready(function(){
               //ajax.php is called every second to get view count from server
               var ajaxDelay = 1000;
               var ids = [];
               $('[id^="layanan-"]').each( function() {
                   ids.push( this.id );
                   id = ids;
                   var datalayananid = [];
                   datalayananid = $(this).attr("data-layanan-id")
                   // console.log(datalayananid)


                   setInterval(function(){
                        $.ajax({
                            url: '<?php echo base_url(); ?>' + 'admin/dashboard/getQueue',
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

                                if (data['next'] != 0) {
                                    $('#nomor-next-' + data['current']['layanan_id']).html( data['next']['pelanggan_id'] );
                                    $('#nama-next-' + data['current']['layanan_id']).html( data['next']['nama_pelanggan'] );
                                }else{
                                    $('#nomor-next-' + data['current']['layanan_id']).html( data['nomor_antrian_next'] );
                                    $('#nama-next-' + data['current']['layanan_id']).html( 'kosong' );
                                };

                            }
                        });
                    }, ajaxDelay);
               });
            });

            $('a#next').click(function(e){
                e.preventDefault();

                datalayananid = $(this).attr("data-layanan-id")
                $.ajax({
                    url: '<?php echo base_url(); ?>' + 'admin/dashboard/nextQueue',
                    dataType: 'json',
                    type: 'post',
                    data: { layanan_id: datalayananid },
                    success: function(data) {
                        
                    }
                });
            }); 
        </script>
    <?php endif ?>
</body>

</html>