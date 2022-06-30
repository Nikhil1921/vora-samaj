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
							<div class="col-12">
								<div class="members_details">
									<div class="table-responsive">
										<table class="table table-bordered table-striped product-table">
											<thead>
												<tr>
													<th style="background:#0f62acba;" class="text-center text-white">SR #</th>
													<th style="background:#0f62acba;" class="text-center text-white">City</th>
													<th style="background:#0f62acba;" class="text-center text-white">Members</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($cities as $k => $c): ?>
												<tr>
													<td class="text-center"><?= $k+1 ?></td>
													<td class="text-center"><?= $c['name'] ?></td>
													<td class="text-center"><?= $c['members'] ?></td>
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
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