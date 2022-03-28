<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="title_main pt-2 text-center">
    <h2><?= $title ?></h2>
    <nav aria-label="breadcrumb" class="bread_main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= anchor('', 'Home'); ?></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
    </nav>
</div>