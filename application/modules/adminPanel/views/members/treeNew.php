<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-10">
            <h5><?= $title ?> <?= $operation ?></h5>
        </div>
    </div>
</div>
<div class="card-body">
    <div id="treeBasic">
        <ul>
            <li><?= $main['name'] ?>
                <?php $this->member->makeTree($main); ?>
            </li>
        </ul>
    </div>
</div>