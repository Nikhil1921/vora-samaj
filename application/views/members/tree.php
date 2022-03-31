<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
	<section class="content">
		<div class="container">
            <?php $this->load->view('breadcrumb', 'Members') ?>
			<div class="row content_main mt-3">
                <?php $this->load->view('members/sidebar') ?>
				<div class="col-10 mb-3">
                    <div class="tree">
                        <ul>
                            <li>
                                <a href="javascript:;;"><?= $main['name'] ?></a>
                                <?php $this->member->memberTree($main) ?>
                            </li>
                        </ul>
                    </div>
                </div>
			</div>
		</div>
	</section>
</section>