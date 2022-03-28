<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', ['image' => (isset($data['image']) ? $data['image'] : '')]) ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Title', 'title', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "title",
                        'name' => "title",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('title') ? set_value('title') : (isset($data['title']) ? $data['title'] : '')
                    ]); ?>
                    <?= form_error('title') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Image', 'image', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        (!isset($data['image']) ? 'required' : '') => '',
                        'name' => "image"
                    ]); ?>
                </div>
            </div>
            <?php if (isset($data['image'])): ?>
                <div class="col-2">
                    <?= img(['src' => $this->path.$data['image'], 'width' => '100%', 'height' => '100']); ?>
                </div>    
            <?php endif ?>
            <div class="col-12">
                <div class="form-group">
                    <?= form_label('Description', 'description', 'class="col-form-label"') ?>
                    <?= form_textarea([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "description",
                        'name' => "description",
                        'required' => "",
                        'rows'=>"5",
                        'value' => set_value('description') ? set_value('description') : (isset($data['description']) ? $data['description'] : '')
                    ]); ?>
                    <?= form_error('description') ?>
                </div>
            </div>
            <div class="col-12"></div>
            <div class="col-3">
                <?= form_button([
                    'type'    => 'submit',
                    'class'   => 'btn btn-outline-primary btn-block col-12',
                    'content' => 'SAVE'
                ]); ?>
            </div>
            <div class="col-3">
                <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
            </div>
        </div>
    <?= form_close() ?>
</div>