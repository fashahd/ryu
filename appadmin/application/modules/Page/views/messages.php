<?php
    date_default_timezone_set("Asia/Jakarta");
    $tgl2 = date("Y-m-d H:i:s");
	$month = date("m");
	$sql 	= "SELECT * FROM ryu_support_ticket order by created_dttm desc";
	$query	= $this->db->query($sql);
	$listmail = "";
	if($query->num_rows()>0){
		$no = 1;
		foreach($query->result() as $row){
            if (strlen($row->message) > 30){
                $message = substr($row->message, 0, 70) . '...';
            }else{
                $message = $row->message;
            }
            if($row->status == "open"){
                $labelmail = '<label class="label label-warning pull-right">Unread<label>';
            }
            if($row->status == "read"){
                $labelmail = '<label class="label label-primary pull-right">Read<label>';
            }
            if($row->status == "answer"){
                $labelmail = '<label class="label label-success pull-right">Answered<label>';
            }
            $listmail .= '
            <tr>
                <td><input type="checkbox" value="'.$row->support_id.'" name="support_id"></td>
                <td class="mailbox-name"><a href="'.base_url().'page/read/'.$row->support_id.'">'.$row->firstname.' '.$row->lastname.'</a></td>
                <td class="mailbox-subject"><b>'.$row->subject.'</b> - '.$message.'
                    - '.$labelmail.'
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">'.datediff($row->created_dttm,$tgl2).'</td>
            </tr>
            ';
			$no++;
		}
    }

    function datediff($tgl1, $tgl2){
        $tgl1 = strtotime($tgl1);
        $tgl2 = strtotime($tgl2);
        $diff_secs = abs($tgl1 - $tgl2);
        $base_year = min(date("Y", $tgl1), date("Y", $tgl2));
        $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
        if(date("Y", $diff) - $base_year != 0){
            return date("Y", $diff) - $base_year." year ago";
        }

        if(date("n", $diff) - 1 != 0){
            return (date("n", $diff) - 1)." month ago";
        }

        if(date("j", $diff) - 1 != 0){
            return (date("j", $diff) - 1)." days ago";
        }

        if(date("G", $diff) != 0){
            return date("G", $diff)." hour ago";
        }

        if((int) date("i", $diff) != 0){
            return (int) date("i", $diff)." min ago";
        }

        if((int) date("s", $diff) != 0){
            return (int) date("s", $diff)." sec ago";
        }
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
	<div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Inbox</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                        <button onclick="deletemessage()" type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <span type="button" class="btn btn-default btn-sm" onclick="window.location.reload()"><i class="fa fa-refresh"></i></span>
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <?=$listmail?>
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
        </div>
	</div>
</div>
<!-- /.row -->