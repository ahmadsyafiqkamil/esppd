
<div class="content-wrapper">
	<!-- Form horizontal -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"><?php echo lang('cnt_19'); ?></h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<!-- <li><a data-action="reload"></a></li> -->
					<!-- <li><a data-action="close"></a></li> -->
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<?php echo $msg; ?>
			<?php echo form_open_multipart('client/instansi_pro', 'class="form-horizontal"'); ?>
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-lg-2"><?php echo lang('cnt_36'); ?></label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2"><?php echo lang('cnt_37'); ?></label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="alamat" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2"><?php echo lang('cnt_38'); ?></label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="hukum" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2"><?php echo lang('cnt_39'); ?></label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="telp" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2"><?php echo lang('cnt_40'); ?></label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="pos" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2"><?php echo lang('cnt_41'); ?></label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="Rekening" required>
					</div>
				</div>
				<fieldset class="content-group">
					<div class="form-group">
						<label class="control-label col-lg-2"><?php echo lang('cnt_42'); ?></label>
						<div class="col-lg-10">
							<input type="file" class="file-styled-primary" name="logo" required>
						</div>
					</div>
				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
		<!-- /form horizontal -->

	</div>
