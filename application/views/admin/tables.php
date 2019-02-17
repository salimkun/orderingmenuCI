<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tables
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Tables
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <?php
        if (validation_errors() || $this->session->flashdata('result_update')) {
    ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="color:red">Warning!</strong>
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('result_update'); ?>
    </div>    
    <?php 
        } else if ($this->session->flashdata('result_update_success')) {?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="color:green">Success!</strong>
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('result_update_success'); ?>
    </div>
    <?php }?>

    <div class="row">
        <div class="col-lg-12"
            <?php if($add!=1){
                echo "style='display:none'";
            }?>
        >

            <h2>List Menu</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>status</th>
                            <th colspan="2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($values->num_rows() > 0) {
                            foreach ($values->result() as $value) { ?>
                                <tr>
                                    <td><?php echo $value->id; ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo "Rp. ".number_format($value->price); ?></td>
                                    <td><?php if ($value->flag == TRUE){
                                        echo "Ready";
                                    } else {
                                        echo "Empty";
                                    }?></td>
                                    <td>
                                        <button 
                                            class="btn btn-info" type="button" 
                                            data-target="#myModal<?php echo $value->id?>" data-toggle="modal">Edit</button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?php echo $value->id;?>" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form Edit -->                                                    
                                                    <form role="form" action="<?php echo base_url('menu/update'); ?>" method="post">
                                                        <div class="form-group" style="display:none;">
                                                            <input 
                                                                type="text" class="form-control" 
                                                                value="<?php echo $value->id;?>" name="id">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Name Food/Drink</label>
                                                            <input 
                                                                type="text" class="form-control" 
                                                                value="<?php echo $value->name;?>" name="name">
                                                        </div>

                                                        <div class="form-group input-group">
                                                            <span class="input-group-addon">Rp</span>
                                                            <input 
                                                                type="text" class="form-control" 
                                                                value="<?php echo $value->price;?>" name="price">
                                                            <span class="input-group-addon">.00</span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" name="flag">
                                                                <option value=<?php echo $value->flag?> selected="selected">
                                                                    <?php if($value->flag==0){
                                                                        echo "Empty";
                                                                    } else {
                                                                        echo "Ready";
                                                                    }?>
                                                                </option>
                                                                <option 
                                                                    value=<?php if($value->flag==0){
                                                                        echo 1;
                                                                    } else {
                                                                        echo 0;
                                                                    }?>>                                                                    
                                                                    <?php if($value->flag==0){
                                                                        echo "Ready";
                                                                    } else {
                                                                        echo "Empty";
                                                                    }?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <hr>
                                                        <button 
                                                            class="btn btn-primary" type="submit">Accept</button>
                                                        <button 
                                                            type="button" class="btn btn-default" 
                                                            data-dismiss="modal"
                                                            style="float: right;">Close</button>                                              
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <td>
                                        <a href="<?php echo base_url('menu/delete/'.$value->id.'/'.$value->name); ?>" class="btn btn-danger" 
                                            role="button">Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } 
                        } else { ?>
                            <tr>
                                <td colspan="4">Data Masih Kosong</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-12"
            <?php if($add!=2){
                echo "style='display:none'";
            }?>
        >
            <h2>List Order</h2>
            <div class="table-responsive">
                    <a href="<?php echo base_url('order/print') ?>" 
                        class="btn btn-success" 
                        role="button"
                        style="float: right;">Cetak
                    </a>

                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Meja</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($values->num_rows() > 0) {
                            foreach ($values->result() as $value) { ?>
                        <tr>
                            <td><?php echo $value->id?></td>
                            <td><?php echo $value->name?></td>
                            <td>
                                <?php if($value->no_table==0) {
                                    echo 'Take away';
                                } else {
                                    echo $value->no_table;
                                } ?>
                            </td>
                            <td><?php echo $value->total?></td>
                            <td><?php 
                                if ($value->id==1){
                                    echo 'Active';
                                } else {
                                    echo 'Done';
                                }?></td>
                            <td>
                                <button 
                                    class="btn btn-info" type="button" 
                                    data-target="#Omodal<?php echo $value->id?>" data-toggle="modal">Edit</button>
                            </td>

                             <!-- Modal -->
                             <div class="modal fade" id="Omodal<?php echo $value->id;?>" role="dialog">
                                <div class="modal-dialog" id="Omodal">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form Edit -->                                                    
                                            <form role="form"
                                                action="<?php echo base_url('order/update'); ?>" method="post">
                                                <div class="form-group">
                                                    <input 
                                                        type="text" class="form-control" 
                                                        value="<?php echo $value->id;?>" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <label>Name buyer</label>
                                                    <input 
                                                        class="form-control" 
                                                        name="name_buyer" 
                                                        value="<?php echo $value->name; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Table</label>
                                                    <select class="form-control" name="no_table">
                                                        <option 
                                                            value=<?php echo $value->no_table; ?> 
                                                            selected="selected">
                                                        <?php 
                                                            if($value->no_table==0){
                                                                echo "Take away";
                                                            } else {
                                                                echo $value->no_table;
                                                            } 
                                                        ?>
                                                        </option>
                                                        <option disabled>--------------</option>
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
                                                                    <?php
                                                                        if(in_array($menu->id,explode(',',$value->arr_menu))) {
                                                                            echo "checked";
                                                                        }
                                                                    ?>
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
                                                        <input 
                                                            type="text" id="total_price" 
                                                            class="form-control"
                                                            name="total_price" 
                                                            value=<?php echo $value->total; ?> readonly>
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                                <div 
                                                    class="form-group"
                                                    <?php 
                                                        if($value->owner_by!=$this->session->userdata('id')){ 
                                                            echo "style='display:none'";
                                                        }?>>
                                                    <label>Status</label>
                                                    <select class="form-control" name="flag">
                                                        <option 
                                                            value=<?php echo $value->flag; ?> 
                                                            selected="selected">
                                                        <?php 
                                                            if($value->flag==0){
                                                                echo "Lunas";
                                                            } else {
                                                                echo "Belum di bayar";
                                                            } 
                                                        ?>
                                                        </option>
                                                        <option disabled>--------------</option>
                                                        <option value=0>Lunas</option>
                                                        <option value=1>Belum di bayar</option>
                                                    </select>
                                                </div>
                
                                                <hr>
                                                <button 
                                                    class="btn btn-primary" type="submit">Accept</button>
                                                <button 
                                                    type="button" class="btn btn-default" 
                                                    data-dismiss="modal"
                                                    style="float: right;">Close</button>                                              
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <td>
                                <a href="<?php echo base_url('order/delete/'.$value->id) ?>" class="btn btn-danger" 
                                    role="button">Delete
                                </a>
                            </td>
                        </tr>
                        <?php } 
                        } else { ?>
                            <tr>
                                <td colspan="7">Data Masih Kosong</td>
                            </tr>
                        <?php } ?>
                     </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
