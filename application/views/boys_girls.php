<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', $title) ?>
			<?php if(!$boys && !$girls): ?>
				<div class="row content_main mt-4 ">
					<div class="col-12">
						<div class="container text-center">
							<div class="error-heading">
								<h2 class="headline font-danger p-4">No boys or girls available.</h2>
							</div>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="row content_main mt-4">
					<div class="col-lg-12 mb-4">
						<ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link <?= $boys ? 'active' : '' ?> hover_nav" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Boys</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?= !$boys ? 'active' : '' ?> hover_nav" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Girls</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade <?= $boys ? 'show active' : '' ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<div class="row crd_main">
									<?php if($boys): ?>
									<?php foreach($boys as $b): ?>
									<div class="col-lg-3 mb-2">
										<div class="card boyes_card" style="width: 100%;">
											<?= img($b['image'], '', 'class="card-img-top boyes_card_image"') ?>
											<div class="card-body boyes_card_body">
												<p class="card-text boyes_card_text"><strong class="crd_strong">Name : </strong> <span class="crd_name"><?= $b['name'] ?></span></p>
												<p class="card-text boyes_card_text"><strong class="crd_strong">BOD : </strong> <span class="crd_name"><?= date('d-m-Y', strtotime($b['dob'])); ?></span></p>
												<p class="card-text boyes_card_text"><strong class="crd_strong">Education : </strong> <span class="crd_name"><?= $b['education'] ?></span></p>
											</div>
										</div>
									</div>
									<?php endforeach ?>
									<?php else: ?>
										<div class="text-center col-12">
											<h2 class="headline font-danger p-4">No boys available.</h2>
										</div>
									<?php endif ?>
								</div>
							</div>
							<div class="tab-pane fade <?= !$boys ? 'show active' : '' ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<div class="row crd_main">
									<?php if($girls): ?>
									<?php foreach($girls as $g): ?>
									<div class="col-lg-3 mb-2">
										<div class="card boyes_card" style="width: 100%;">
											<?= img($g['image'], '', 'class="card-img-top boyes_card_image"') ?>
											<div class="card-body boyes_card_body">
												<p class="card-text boyes_card_text"><strong class="crd_strong">Name : </strong> <span class="crd_name"><?= $g['name'] ?></span></p>
												<p class="card-text boyes_card_text"><strong class="crd_strong">BOD : </strong> <span class="crd_name"><?= date('d-m-Y', strtotime($g['dob'])); ?></span></p>
												<p class="card-text boyes_card_text"><strong class="crd_strong">Education : </strong> <span class="crd_name"><?= $g['education'] ?></span></p>
											</div>
										</div>
									</div>
									<?php endforeach ?>
									<?php else: ?>
										<div class="text-center col-12">
											<h2 class="headline font-danger p-4">No girls available.</h2>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>
</section>