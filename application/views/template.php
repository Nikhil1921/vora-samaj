<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= "$title | " . APP_NAME ?></title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?= link_tag('assets/images/favicon.ico', 'icon', 'image/x-icon') ?>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
		<?= link_tag('assets/css/style.css', 'stylesheet', 'text/css') ?>
		<?= link_tag('assets/css/responsive.css', 'stylesheet', 'text/css') ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<section class="header_up">
			<div class="container">
				<div class="row header_up_main">
					<div class="col-lg-5 header_up_left">
						<div class="logo">
							<?= anchor('', img(['src' => 'assets/images/logo11.png'])) ?>
						</div>
					</div>
					<div class="col-lg-4 header_up_right">
						<nav style="float: left;">
							<ul class="header_up_ul">
								<li>
									<a class="header_up_a" href="tel:<?= $this->config->item('mobile') ?>"><i class="fa fa-phone header_phone" aria-hidden="true"> <strong><?= $this->config->item('mobile') ?></strong></i></a><br />
									<a class="header_up_a" href="mailto:demo@example.com"><i class="fa fa-envelope header_phone" aria-hidden="true"> <strong><?= $this->config->item('email') ?></strong></i></a><br>
									<a class="header_name" href="javascript:;">ચિંતન અરવિંદભાઈ શાહ(વોરા)</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-lg-3 header_img">
						<?= img('assets/images/bahuchar_mataji-1.jpg', '', 'class="nav_right_img"') ?>
					</div>
				</div>
			</div>
		</section>
		<section class="header_middle_section">
			<div class="container-fluid">
				<nav class="navbar navbar-expand-lg navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav">
							<li class="nav-item <?= $name === 'home' ? 'active' : '' ?>">
								<?= anchor('', "Home", 'class="nav-link"') ?>
							</li>
							<li class="nav-item  <?= $name === 'about_us' ? 'active' : '' ?>">
								<?= anchor('about-us', "About Us", 'class="nav-link"') ?>
							</li>
							<li class="nav-item  <?= $name === 'committee_members' ? 'active' : '' ?>">
								<?= anchor('committee-members', "Gallery", 'class="nav-link"') ?>
							</li>
							<li class="nav-item  <?= $name === 'boys_girls' ? 'active' : '' ?>">
								<?= anchor('boys-girls', "Boys/Girls", 'class="nav-link"') ?>
							</li>
							<li class="nav-item  <?= $name === 'events' ? 'active' : '' ?>">
								<?= anchor('events', "Events", 'class="nav-link"') ?>
							</li>
							<li class="nav-item  <?= $name === 'news' ? 'active' : '' ?>">
								<?= anchor('news', "News", 'class="nav-link"') ?>
							</li>
							<li class="nav-item  <?= $name === 'contact_us' ? 'active' : '' ?>">
								<?= anchor('contact-us', "Contact Us", 'class="nav-link"') ?>
							</li>
							<?php if($this->session->userId): ?>
							<li class="nav-item  <?= in_array($name, ['members', 'add-member', 'tree', ]) ? 'active' : '' ?>">
								<?= anchor('members', "Members Area", 'class="nav-link"') ?>
							</li>
							<?php endif ?>
						</ul>
					</div>
				</nav>
			</div>
		</section>
		<?= $contents ?>
		<section class="ftr_end">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="ftr_cont text-center">
							<ul class="footer_ul">
								<li><?= anchor('', "Home",) ?></li>
								<li><?= anchor('about-us', "About Us",) ?></li>
								<li><?= anchor('committee-members', "Committee Members",) ?></li>
								<li><?= anchor('boys-girls', "Boys/Girls",) ?></li>
								<li><?= anchor('events', "Events",) ?></li>
								<li><?= anchor('news', "News",) ?></li>
								<li><?= anchor('contact-us', "Contact Us",) ?></li>
								<?php if($this->session->userId): ?>
								<li><?= anchor('members', "Members Area") ?></li>
								<?php endif ?>
							</ul>
						</div>
						<div class="footer_end">
							<p>Vora Parivar Trust. All Rights Reserved</p>
							<p>Design & Developed by :<a target="_blank" href="http://densetek.com/" class="text-white"> Densetek Infotech</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<input type="hidden" name="base_url" value="<?= base_url() ?>" />
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
		<?php if(isset($validate)): ?>
			<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
		<?php endif ?>
		<input type="hidden" name="error_msg" value="<?= $this->session->error ?>" />
		<input type="hidden" name="success_msg" value="<?= $this->session->success ?>" />
		<?php if(isset($validate) || $this->session->error || $this->session->success || in_array($name, ['tree'])): ?>
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<?php endif ?>
		<?= script('assets/js/script.js') ?>
	</body>
</html>