<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
			<?php $this->load->view('breadcrumb', $title) ?>
			<?php if($events): ?>
				<div class="row content_main mt-3">
					<?php foreach($events as $e): ?>
					<div class="col-lg-2 events_left">
						<?= strpos($e['image'], '.pdf') ? '<a href="'.base_url($e['image']).'" target="_blank">'.img(['class' => "events_img", 'src' => 'assets/images/file.png']).'</a>' : img(['class' => "events_img", 'src' => $e['image']]) ?>
					</div>
					<div class="col-lg-10 events_right">
						<h4 class="events_p"><?= $e['title'] ?></h4>
						<p class="events_p"><?= $e['description'] ?></p>
						<h2 class="event_h2"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $e['date'] ?></span></h2>
						<h2 class="event_h2"><span><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $e['place'] ?></span></h2>
					</div>
					<?php endforeach ?>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="pagination mt-4">
							<?= $this->pagination->create_links(); ?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="row content_main mt-4 ">
					<div class="col-12">
						<div class="container text-center">
							<div class="error-heading">
								<h2 class="headline font-danger p-4">No events available.</h2>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>
</section>