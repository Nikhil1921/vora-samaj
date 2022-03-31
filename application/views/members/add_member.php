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
													<th style="background:#0f62acba;text-align: center;color: #ffffff;">Name</th>
													<th style="background:#0f62acba;text-align: center;color: #ffffff;">Mobile Number</th>
													<th style="background:#0f62acba;text-align: center;color: #ffffff;">Details</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td style="text-align: center;">VORA RASHIKLAL POPTLAL</td>
													<td style="text-align: center;">9876543210</td>
													<td style="text-align: center;"><?= anchor('login', "View Details",) ?></td>
												</tr>
												<tr>
													<td style="text-align: center;">VORA RASHIKLAL POPTLAL</td>
													<td style="text-align: center;">9876543210</td>
													<td style="text-align: center;"><?= anchor('login', "View Details",) ?></td>
												</tr>
												<tr>
													<td style="text-align: center;">VORA RASHIKLAL POPTLAL</td>
													<td style="text-align: center;">9876543210</td>
													<td style="text-align: center;"><?= anchor('login', "View Details",) ?></td>
												</tr>
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