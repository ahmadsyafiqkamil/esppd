

<body class="navbar-bottom login-container">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><?php echo lang('cnt_1'); ?></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> <?php echo lang('cnt_2'); ?></span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> <?php echo lang('cnt_3'); ?></span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> <?php echo lang('cnt_4'); ?></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<?php if (  $msg === 0): ?>
		<div class="alert alert-danger alert-styled-left alert-bordered">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
			<span class="text-semibold"><?php echo lang('error_1'); ?></span>
		</div>
	<?php endif; ?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Advanced login -->
				<?php echo form_open(site_url("login/auth")); ?>
				<!-- <form action="index.html"> -->
				<div class="panel panel-body login-form">
					<div class="text-center">
						<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
						<h5 class="content-group"> <?php echo lang('cnt_5'); ?><small class="display-block"></small><?php echo lang('cnt_6'); ?></h5>
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="text" class="form-control" placeholder="NIP anda" name="nip">
						<div class="form-control-feedback">
							<i class="icon-user text-muted"></i>
						</div>
					</div>

					<div class="form-group has-feedback has-feedback-left">
						<input type="password" class="form-control" placeholder="Password anda" name="password">
						<div class="form-control-feedback">
							<i class="icon-lock2 text-muted"></i>
						</div>
					</div>

					<!-- <fieldset class="content-group">
						<div class="form-group">
							<label class="control-label col-lg-2"><?php echo lang('cnt_62'); ?></label>
							<div class="col-lg-12">
								<select name="instansi" class="form-control">
									<?php foreach ($instansi as $i): ?>
										<option value="<?php echo $i->id; ?>"><?php echo $i->instansi; ?></option>
									<?php endforeach; ?>

								</select>
							</div>
						</div>

					</fieldset> -->


					<div class="form-group login-options">
						<div class="row">
							<div class="col-sm-6">
								<label class="checkbox-inline">
									<input type="checkbox" class="styled" checked="checked">
									<?php echo lang('cnt_7'); ?>
								</label>
							</div>

							<div class="col-sm-6 text-right">
								<a href="login_password_recover.html"><?php echo lang('cnt_8'); ?></a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn bg-blue btn-block"> <?php echo lang('cnt_9'); ?><i class="icon-arrow-right14 position-right"></i></button>
					</div>

					<!-- <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
					<ul class="list-inline form-group list-inline-condensed text-center">
					<li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
					<li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
					<li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
					<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
				</ul> -->

				<div style="display: none" class="content-divider text-muted form-group"><span><?php echo lang('cnt_10'); ?></span></div>
				<a style="display: none" href="<?php echo site_url("register") ?>" class="btn btn-default btn-block content-group"> <?php echo lang('cnt_11'); ?></a>
				<!-- <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> -->
			</div>
			<!-- </form> -->
			<?php echo form_close(); ?>
			<!-- /advanced login -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</div>
<!-- /page container -->
