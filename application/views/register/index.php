<body class="navbar-bottom login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><?php echo lang('cnt_1'); ?></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<!-- <div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"><?php echo lang(' cnt_2'); ?></span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> <?php echo lang(' cnt_3'); ?></span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> <?php echo lang(' cnt_4'); ?></span>
					</a>
				</li>
			</ul>
		</div> -->
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Registration form -->
				<?php echo form_open(site_url("register/pro")); ?>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<div class="panel registration-form">
								<div class="panel-body">
									<div class="text-center">
										<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
										<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
									</div>

									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Choose username">
										<div class="form-control-feedback">
											<i class="icon-user-plus text-muted"></i>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="First name">
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Second name">
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="password" class="form-control" placeholder="Create password">
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="password" class="form-control" placeholder="Repeat password">
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="email" class="form-control" placeholder="Your email">
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="email" class="form-control" placeholder="Repeat email">
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" class="styled" checked="checked">
												Send me <a href="#">test account settings</a>
											</label>
										</div>

										<div class="checkbox">
											<label>
												<input type="checkbox" class="styled" checked="checked">
												Subscribe to monthly newsletter
											</label>
										</div>

										<div class="checkbox">
											<label>
												<input type="checkbox" class="styled">
												Accept <a href="#">terms of service</a>
											</label>
										</div>
									</div>

									<div class="text-right">
										<a type="button" class="btn btn-link" href="login"><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
										<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?>
				<!-- /registration form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
