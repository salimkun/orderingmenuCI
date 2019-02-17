    </div>
    <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url()?>assets/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/morris/morris-data.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        var $checkboxes = $('#devel-generate-content-form input[type="checkbox"]');
            
        $checkboxes.change(function(){
            var value = 0;
            var id = [];
            $.each($checkboxes.filter(':checked'), function(){            
                value = value + parseInt($(this).val().split('|')[1]);
                id.push($(this).val().split('|')[0]);
            });

            $('#arr_menu').val(id);
            $('#total_price').val(value);
        });

    });
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
        var $checkboxes = $('#OmodalERP16022019-004 input[type="checkbox"]');
        $checkboxes.change(function(){
            var value = 0;
            var id = [];
            $.each($checkboxes.filter(':checked'), function(){            
                value = value + parseInt($(this).val().split('|')[1]);
                id.push($(this).val().split('|')[0]);
            });

            $('#arr_menu').val(id);
            $('#total_price').val(value);
        });

    });
    </script>   
</body>

</html>