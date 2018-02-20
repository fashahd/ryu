<?php
    $username = $this->session->userdata("username");
    $sql = "SELECT * FROM ryu_users WHERE username = '$username'";
    $query = $this->db->query($sql);
    if($query->num_rows()){
        $row        = $query->row();
        $username   = $row->username;
        $fullname   = $row->fullname;
        $email      = $row->email;
    }
?>


<!-- Content Header (Page header) -->
<div id="notif"></div>
<section class="content-header">
	<h1><?=$tittle?></h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
            <form class="form" id="profile">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Name" value="<?=$fullname?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$email?>">
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="content-header">
    <h1>Account Information</h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
            <form class="form" id="account">
                <div class="form-group">
                    <label for="inputName">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$username?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail">New Password</label>
                    <input type="password" class="form-control" name="new_password" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Re-type Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Re-type Password">
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>