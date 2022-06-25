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
									<?= form_open()?>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="alert alert-danger text-center">Change Password</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('Password', 'password', 'class="col-form-label"') ?>
                                                <?= form_input([
                                                    'class' => "form-control",
                                                    'type' => "password",
                                                    'id' => "password",
                                                    'name' => "password",
                                                    'maxlength' => 100,
                                                    // 'required' => ""
                                                ]); ?>
                                                <?= form_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('Confirm Password', 'confirm_password', 'class="col-form-label"') ?>
                                                <?= form_input([
                                                    'class' => "form-control",
                                                    'type' => "password",
                                                    'id' => "confirm_password",
                                                    'name' => "confirm_password",
                                                    'maxlength' => 100,
                                                    // 'required' => ""
                                                ]); ?>
                                                <?= form_error('confirm_password') ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="log_in">
                                                <button type="submit" class="log_in_btn">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>