<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= "$title | " . APP_NAME ?></title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?= link_tag('assets/images/favicon.ico', 'icon', 'image/x-icon') ?>
		<?= link_tag('assets/css/bootstrap.css', 'stylesheet', 'text/css') ?>
		<?= link_tag('assets/css/style.css', 'stylesheet', 'text/css') ?>
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
					<div class="col-lg-3">
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
							<li class="nav-item  <?= $name === 'members' ? 'active' : '' ?>">
								<?= anchor('members', "Members", 'class="nav-link"') ?>
							</li>
							<li class="nav-item  <?= $name === 'home' ? 'active' : '' ?> dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Member Area
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?= anchor('login', "Login", 'class="dropdown-item"') ?>
									<a class="dropdown-item" href="#">Register Your Family Free</a>
									<?= anchor('my-family', "My Family", 'class="dropdown-item"') ?>
									<a class="dropdown-item" href="#">Family Tree</a>
								</div>
							</li>
							<li class="nav-item  <?= $name === 'committee_members' ? 'active' : '' ?>">
								<?= anchor('committee-members', "Committee Members", 'class="nav-link"') ?>
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
								<li><?= anchor('members', "Members",) ?></li>
								<li><?= anchor('committee-members', "Committee Members",) ?></li>
								<li><?= anchor('boys-girls', "Boys/Girls",) ?></li>
								<li><?= anchor('events', "Events",) ?></li>
								<li><?= anchor('news', "News",) ?></li>
								<li><?= anchor('contact-us', "Contact Us",) ?></li>
							</ul>
						</div>
						<div class="footer_end">
							<p>Vora Parivar Trust. All Rights Reserved</p>
							<p>Design by :<a target="_blank" href="http://densetek.com/" class="text-white"> Densetek Infotech</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?= script('assets/js/jquery.js') ?>
		<?= script('assets/js/popper.min.js') ?>
		<?= script('assets/js/bootstrap.min.js') ?>
		<?php if($name === 'home'): ?>
		<?php endif ?>
	</body>
</html>