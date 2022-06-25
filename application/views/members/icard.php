<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', 'Members') ?>
			<div class="row content_main mt-3">
				<div class="padd">
					<?php $this->load->view('members/sidebar') ?>
					<div class="col-lg-10 member_detail_right">
						<div class="row table_member">
							<div class="col-12" id="card">
								<div class="card">
                                    <?= img((is_file($this->config->item('members').$data['image']) ? $this->config->item('members').$data['image'] : 'assets/images/logo.png'), '', 'style="width:100%"') ?>
                                    <h3><?= $icard ?></h3>
                                    <h4><?= $data['name'] ?> <?= $data['surname'] ?></h4>
                                    <h6><?= $data['mobile'] ?></h6>
                                    <p>
                                        <?= $data['cur_house_no'] ? $data['cur_house_no'].', ' : '' ?>
                                        <?= $data['cur_building_name'] ? $data['cur_building_name'].', ' : '' ?>
                                        <?= $data['cur_address1'] ? $data['cur_address1'].', ' : '' ?>
                                        <?= $data['cur_address2'] ? $data['cur_address2'].', ' : '' ?>
                                        <?= $data['cur_area'] ? $data['cur_area'].', ' : '' ?>
                                        <?php $csc = $this->main->getCityStateCountry($data['cur_city']); ?>
                                        <?= isset($csc['city']) && $csc['city'] ? $csc['city'].', ' : '' ?>
                                        <?= isset($csc['state']) && $csc['state'] ? $csc['state'].', ' : '' ?>
                                        <?= isset($csc['country']) && $csc['country'] ? $csc['country'] : '' ?>
                                    </p>
                                    <p>
                                        <?= img('assets/images/logo.png', '', 'style="width:30%"') ?>
                                    </p>
                                    <p><button onclick="printDiv()">Download</button></p>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>