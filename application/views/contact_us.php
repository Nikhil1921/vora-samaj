<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', $title) ?>
			<div class="row content_main mt-4">
                <div class="col-lg-12">
                    <div class="row mt-4">
						<?php foreach($fields as $field): echo '<div class="col-12">'; foreach($field as $k => $f): ?>
							<?php if($k === 0): ?>
							<div class="contact_details">
								<h5><?= $f['value'] ?></h5>
							</div>
							<?php else: 
								switch ($k) {
									case 2:
										echo $f['value'] ? "<p><strong> Mobile Number : </strong> ".$f['value']." </p>" : '';
										break;
										break;
									case 3:
										echo $f['value'] ? "<p><strong> Email Id : </strong> ".$f['value']." </p>" : '';
										echo '</div>';
										break;
									
									default:
										echo "<div class='cont_content'>";
										echo $f['value'] ? "<p><strong> Address : </strong> ".$f['value']." </p>" : '';
										break;
								}  ?>
							<?php endif ?>
						<?php endforeach; echo '</div>'; endforeach ?>
                    </div>
                </div>
			</div>
		</div>
	</section>
</section>