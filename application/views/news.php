<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', $title) ?>
            <?php if($news): ?>
			<div class="row content_main mt-4">
                <div class="col-lg-12">
                    <div class="row mt-4">
                        <?php foreach($news as $n): ?>
                        <div class="col-lg-4">
                            <?= anchor('news/'.e_id($n['id']), '
                            <div class="card crd_news" style="width: 100%;">
                                '.img(['src' => $n['image'], 'class' => "card-img-top"]).'
                                <div class="card-body crd_body">
                                    <h6 class="">'.$n['title'].'</h6>
                                </div>
                            </div>
                            ', 'class="news_a"'); ?>
                        </div>
                        <?php endforeach ?>
                        
                            
                    </div>
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
								<h2 class="headline font-danger p-4">No news available.</h2>
							</div>
						</div>
					</div>
				</div>
            <?php endif ?>
		</div>
	</section>
</section>