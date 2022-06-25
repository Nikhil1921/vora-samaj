<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
			<?php $this->load->view('breadcrumb', $title) ?>
			<?php if($informations): ?>
				<div class="row content_main mt-3">
					<?php foreach($informations as $i): ?>
					<div class="col-lg-1 events_left">
						<a href="<?= base_url($i['image']) ?>" target="_blank"><?= img(['class' => "events_img", 'src' => 'assets/images/file.png']) ?></a>
					</div>
					<div class="col-lg-11 events_right">
						<?= anchor('information/'.my_crypt($i['id']), '<h4 class="events_p">'.$i['title'].'</h4>', 'class="text-dark"') ?>
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
								<h2 class="headline font-danger p-4">No information available.</h2>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>
</section>