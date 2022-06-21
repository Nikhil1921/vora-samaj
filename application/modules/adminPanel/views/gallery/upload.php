<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart() ?>
        <div class="row">
            <div class="col-12">
                <?= form_label('Name', '', 'class="col-form-label"') ?>
                <?= form_input([
                    'class' => "form-control",
                    'disabled' => 'disabled',
                    'value' => $data['name']
                ]); ?>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Image', 'image', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        'name' => "image[]",
                        'multiple' => 'multiple',
                        'accept' => 'image/jpg,image/jpeg,image/png'
                    ]); ?>
                </div>
            </div>
            <div class="col-12 mb-3">
                
            </div>
            <div class="col-3">
                <?= form_button([
                    'type'    => 'submit',
                    'class'   => 'btn btn-outline-primary btn-block col-12',
                    'content' => 'UPLOAD'
                ]); ?>
            </div>
            <div class="col-3">
                <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
            </div>
        </div>
    <?= form_close() ?>
    <div class="row">
        <?php if($gallery): foreach($gallery as $g): ?>
            <div class="col-2 mt-3">
                <?= img($this->path.$g['image'], '', 'width="100%" height="100"') ?>
            </div>
            <div class="col-1">
                <?= form_open("$url/delete-image/$id", '', ['id' => e_id($g['id']), 'image' => $this->path.$g['image']]) ?>
                <?= form_button([
                    'type'    => 'submit',
                    'class'   => 'btn btn-outline-primary btn-xs mt-5',
                    'content' => 'DELETE'
                ]); ?>
                <?= form_close() ?>
            </div>
        <?php endforeach; endif ?>
    </div>
</div>