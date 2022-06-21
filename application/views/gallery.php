<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', $title) ?>
			<?php if($gallery): ?>
			<div class="row content_main mt-4">
                <div class="col-lg-12">
                    <div class="row mb-4">
                        <?php foreach($gallery as $g): if(! $g['images']) continue; 
							  echo '<div class="col-lg-12 mt-4"><h2 class="font_family text-center mb-4"><b>'.$g['name'].'</b></h2></div>'; 
							  foreach($g['images'] as $img): ?>
								<div class="col-lg-3 mt-3">
									<div class="card committee_card" style="width: 100%;">
										<div class="card-body">
											<?= img(['src' => $img['image'], 'class' => "card-img-top committee_img"]) ?>
										</div>
									</div>
								</div>
                        <?php endforeach; endforeach ?>
                    </div>
                </div>
			</div>
			<?php else: ?>
				<div class="row content_main mt-4 ">
					<div class="col-12">
						<div class="container text-center">
							<div class="error-heading">
								<h2 class="headline font-danger p-4">No gallery available.</h2>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>
</section>