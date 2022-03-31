<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', $title) ?>
			<?php if($commitee): ?>
			<div class="row content_main mt-4">
                <div class="col-lg-12">
                    <div class="row mt-5">
                        <?php foreach($commitee as $c): ?>
                            <div class="col-lg-3">
								<div class="card committee_card" style="width: 100%;">
									<?= img(['src' => $c['image'], 'class' => "card-img-top committee_img"]) ?>
									<div class="card-body">
										<h5 class="card-title"><?= $c['name'] ?></h5>
									</div>
								</div>
							</div>
                        <?php endforeach ?>
                    </div>
                </div>
			</div>
			<?php else: ?>
				<div class="row content_main mt-4 ">
					<div class="col-12">
						<div class="container text-center">
							<div class="error-heading">
								<h2 class="headline font-danger p-4">No committee members available.</h2>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>
</section>