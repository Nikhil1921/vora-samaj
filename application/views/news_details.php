<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
			<div class="row content_main">
				<div class="padd">
					<div class="col-lg-12 content_right">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12 head_samakhya">
                                    <div class="section-title text-center padd_border">
                                        <h2><?= $news['title'] ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row main_news">
                                <div class="col-12">
                                    <div class="news_details">
                                        <?= img(['src' => $news['image'], 'class' => "card-img-top"]) ?>
                                        <p class="news_detail_p nws_det_p"><?= $news['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>