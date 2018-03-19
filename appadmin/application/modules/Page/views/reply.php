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
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Reply Message <?=$fullname?></h3>
            </div>
            <form id="replymessage">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <input class="form-control" value="<?=$email?>" name="email">
                </div>
                <div class="form-group">
                    <input class="form-control" value="Re : <?=$subject?>" name="subject">
                    <input class="form-control" value="<?=$support_id?>" type="hidden" name="support_id">
                </div>
                <div class="form-group">
                    <textarea name="message" id="compose-textarea" class="form-control" style="height: 300px">
                    </textarea>
                </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right">
                    <a href="<?=base_url()?>page/read/<?=$support_id?>" class="btn btn-default"><i class="fa fa-back"></i> Cancel</a>
                    <div id="buttonreply">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
</div>
                </div>
            </div>
            <!-- /.box-footer -->
            </form>
        </div>
        <!-- /. box -->
    </div>
</div>
<!-- /.row -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>