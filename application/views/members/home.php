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
													<th style="background:#0f62acba;" class="text-center text-white">Surname</th>
													<th style="background:#0f62acba;" class="text-center text-white">Name</th>
													<th style="background:#0f62acba;" class="text-center text-white">Father name</th>
													<th style="background:#0f62acba;" class="text-center text-white">Relation</th>
													<th style="background:#0f62acba;" class="text-center text-white">Change details</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-center">1</td>
													<td class="text-center"><?= $user['surname'] ?></td>
													<td class="text-center"><?= $user['name'] ?></td>
													<td class="text-center"><?= isset($user['parent']['name']) ? $user['parent']['name'] : "NA" ?></td>
													<td class="text-center">SELF</td>
													<td class="text-center">
														<?= anchor("members/profile", '<i class="fa fa-pencil fa-lg"></i>', 'class="btn"') ?>
														<?= anchor("members/icard", '<i class="fa fa-user fa-lg"></i>', 'class="btn"') ?>
													</td>
												</tr>
												<?php foreach($family as $k => $f): ?>
												<tr>
													<td class="text-center"><?= $k+2 ?></td>
													<td class="text-center"><?= $f['surname'] ?></td>
													<td class="text-center"><?= $f['name'] ?></td>
													<td class="text-center"><?= $user['name'] ?></td>
													<td class="text-center"><?= isset($user['parent']['name']) ? $user['parent']['name'] : "Son" ?></td>
													<td class="text-center">
														<?= anchor("members/update_member/".e_id($f['id']), '<i class="fa fa-pencil fa-lg"></i>', 'class="btn"') ?>
														<?= anchor("members/icard/".e_id($f['id']), '<i class="fa fa-user fa-lg"></i>', 'class="btn"') ?>
													</td>
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