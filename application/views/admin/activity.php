<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Activity Records
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-desktop"></i> Activity Records
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-sm-6">
        <ul class="list-group">
        <?php 
            if($values->num_rows() > 0) {
            foreach ($values->result() as $value) { ?>
            <li class="list-group-item">
                <label><?php echo $value->event_date; ?></label>
                <?php echo 'Anda '.$value->content;?></li>
            <?php } } ?>
        </ul>
    </div>
</div>

</div>
<!-- /.container-fluid -->