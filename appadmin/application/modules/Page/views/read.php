<?php
	$month = date("m");
	$sql 	= "SELECT * FROM ryu_support_ticket where support_id = '$support_id'";
	$query	= $this->db->query($sql);
    $listmail = "";
    $fullname = "";
    $email = "";
    $subject = "";
    $message = "";
    $created = "";
	if($query->num_rows()>0){
        $row = $query->row();
        $fullname = $row->firstname." ".$row->lastname;
        $email    = $row->email;
        $subject  = $row->subject;
        $message  = $row->message;
        $created  = date("d M. Y H:i",strtotime($row->created_dttm));
	}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?=$fullname?></h3>
                <div class="box-tools pull-right">
                    <a href="<?=base_url()?>page/reply/<?=$support_id?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                        <i class="fa fa-reply"></i></a>
                    <a href="<?=base_url()?>page/messages" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Back">
                        Back</a> 
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-read-info">
                    <h3><?=$subject?></h3>
                    <h5>From: <?=$email?>
                    <span class="mailbox-read-time pull-right"><?=$created?></span></h5>
                </div>
                <div class="mailbox-read-message">
                    <?=$message?>
                </div>
                <!-- /.mailbox-read-message -->
            </div>
	</div>
</div>
<!-- /.row -->