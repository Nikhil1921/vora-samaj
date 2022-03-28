<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', $title) ?>
			<div class="row content_main mt-4">
                <div class="col-lg-12">
                    <div class="row mt-4">
                        <div class="col-12">
							<div class="contact_details">
								<h5>Any Query?</h5>
							</div>
							<div class="cont_content">
								<p><strong>Mobile Number : </strong> <?= $this->config->item('mobile') ?></p>
								<p><strong>Email Id : </strong> <?= $this->config->item('email') ?></p>
							</div>
						</div>
						<div class="col-12">
							<div class="contact_details">
								<h5>Shree Zalavad Tapgachchh Swetamber Murtipujak</h5>
							</div>
							<div class="cont_content">
								<p><strong>Address : </strong> H-4/15, Xyz Apartment,Nr, Adarshnagar, Vijaynagar Naranpura, Ahmedabad-380013.</p>
								<p><strong>Mobile Number : </strong> <?= $this->config->item('mobile') ?></p>
								<p><strong>Email Id : </strong> <?= $this->config->item('email') ?></p>
							</div>
						</div>
						<div class="col-12">
							<div class="contact_details">
								<h5>Shree Zalavad Tapgachchh Swetamber Murtipujak</h5>
							</div>
							<div class="cont_content">
								<p><strong>Address : </strong> H-4/15, Xyz Apartment,Nr, Adarshnagar, Vijaynagar Naranpura, Ahmedabad-380013.</p>
								<p><strong>Mobile Number : </strong> <?= $this->config->item('mobile') ?></p>
								<p><strong>Email Id : </strong> <?= $this->config->item('email') ?></p>
							</div>
						</div>
                    </div>
                </div>
			</div>
		</div>
	</section>
</section>