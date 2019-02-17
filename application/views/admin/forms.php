<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Forms
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Forms
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6"
        <?php if($add!=1){
            echo "style='display:none'";
        } ?>
        >

            <form role="form" action="<?php echo base_url('menu/insert_menu'); ?>" method="post">
                <?php
                    if (validation_errors() || $this->session->flashdata('insert_menu')) {
                ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong style="color:red">Warning!</strong>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('insert_menu'); ?>
                </div>
                <?php 
                    } else if ($this->session->flashdata('insert_menu_success')){
                ?>    
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong style="color:green">Success!</strong>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('insert_menu_success'); ?>
                </div>    
                <?php } ?>
                <div class="form-group">
                    <label>Name Food/Drink</label>
                    <input class="form-control" name="name">
                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
                
                <div class="form-group">
                    <label>Price</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" class="form-control" name="price">
                        <span class="input-group-addon">.00</span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value=0>Empty</option>
                        <option value=1>Ready</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>

            </form>

        </div>

        <!-- Form Order -->
        <div class="col-lg-6"
        <?php if($add!=2){
            echo "style='display:none'";
        } ?>
        >
            <form role="form" id="devel-generate-content-form" 
                action="<?php echo base_url('order/insert_order'); ?>" method="post">
                <?php
                    if (validation_errors() || $this->session->flashdata('insert_order')) {
                ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong style="color:red">Warning!</strong>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('insert_order'); ?>
                </div>
                <?php 
                    } else if ($this->session->flashdata('insert_order_success')){
                ?>    
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong style="color:green">Success!</strong>
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('insert_order_success'); ?>
                </div>    
                <?php } ?>
                <div class="form-group">
                    <label>Name buyer</label>
                    <input class="form-control" name="name_buyer">
                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
                <div class="form-group">
                    <label>No Table</label>
                    <select class="form-control" name="no_table">
                        <option value=0>Take away</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>2</option>
                        <option value=4>3</option>
                        <option value=5>4</option>
                        <option value=6>5</option>
                    </select>
                </div>
                <div class="form-group" style="display:none">
                    <input class="form-control" name="arr_menu" id="arr_menu">
                </div>
                <?php
                    if ($menus) {
                        if($menus->num_rows() > 0) { ?>
                <div class="form-group input-group">
                    <p><label>Foods & Drinks</label></p>
                    <?php foreach ($menus->result() as $menu) { ?>
                    <div class="col-lg-6">
                        <div class="checkbox">
                            <label>
                                <input 
                                    type="checkbox" 
                                    value=<?php echo $menu->id.'|'.$menu->price;?>
                                    name="menu"><?php echo $menu->name;?>
                            </label>
                        </div>
                    </div>
                    <?php }?>
                </div>
                    <?php } } ?>
                <div class="form-group">
                    <label>Total</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" id="total_price" class="form-control"
                            name="total_price" readonly>
                        <span class="input-group-addon">.00</span>
                    </div>
                </div>
                <div class="form-group" style="display:none;">
                    <label>Status</label>
                    <select class="form-control" name="flag">
                        <option value=0>Lunas</option>
                        <option value=1 checked>Belum di bayar</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>

            </form>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->