<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-6">
            <h5><?= $title ?> <?= $operation ?></h5>
        </div>
        <div class="col-6">
            <?= form_open_multipart("$url/upload") ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "file",
                'id' => "banner",
                'name' => "banner",
                'onchange' => 'this.form.submit()',
                'style' => 'display: none',
                'accept' => "image/png, image/jpg, image/jpeg",
                'required' => ""
            ]) ?>
            <?= form_close() ?>
            <label for="banner" class="btn btn-outline-success btn-sm float-right"><span class="fa fa-upload"></span> Upload</label>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="datatable table table-striped table-bordered nowrap">
            <thead>
                <th class="target">Sr.</th>
                <th>Banner</th>
                <th class="target">Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>