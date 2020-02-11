<div class="content-wrapper">
<section class="content-header">
  <h1>Users
    <small>Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></li></a></i>
    <li class="active">Users</li>
  </ol>
</section>

<!-- Main content-->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Add Users</h3>
			<div class="pull-right">
				<a href="<?=base_url('User')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php //echo validation_errors(); ?>
					<form action="" method="post">
						<div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
							<label>Name *</label>
							<input type="text" name="fullname" class="form-control">
							<?=form_error('fullname')?>
						</div>
						<div class="form-group <?=form_error('username') ? 'has-error' : null?>">
							<label>Username *</label>
							<input type="text" name="username" class="form-control">
							<?=form_error('username')?>
						</div>
						<div class="form-group <?=form_error('password') ? 'has-error' : null?>">
							<label>Password *</label>
							<input type="password" name="Password" class="form-control">
							<?=form_error('password')?>
						</div>
						<div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
							<label>Password Confirmation*</label>
							<input type="password" name="passconf" class="form-control">
							<?=form_error('passconf')?>
						</div>
						<div class="form-group"> 
							<label>Address *</label>
							<textarea name="address" class="form-control"></textarea>
							<?=form_error('address')?>
						</div>
						<div class="form-group <?=form_error('level') ? 'has-error' : null?>">
							<label>Level *</label>
							<select name="level" class="form-control">
								<?=form_error('level')?>
								<option value="">- Pilih -</option>
								<option value="1" <?=set_value('level') == 1 ? "selected" : null?>>Admin</option>
								<option value="2" <?=set_value('level') == 2 ? "selected" : null?>>Kasir</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">
								<i class="fa fa-paper-plane"></i> Save
							</button>
							<button type="Reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>      
                     