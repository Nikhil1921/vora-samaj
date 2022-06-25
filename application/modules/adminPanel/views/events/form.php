<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', ['image' => (isset($data['image']) ? $data['image'] : '')]) ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Event Title', 'title', 'class="col-form-label"'); ?>
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
            <div class="col-3">
                <div class="form-group">
                    <?= form_label('Event date', 'e_date', 'class="col-form-label"'); ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "date",
                        'id' => "e_date",
                        'name' => "e_date",
                        'required' => "",
                        'value' => set_value('e_date') ? set_value('e_date') : (isset($data['e_date']) ? $data['e_date'] : '')
                    ]); ?>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <?= form_label('Event time', 'e_time', 'class="col-form-label"'); ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "time",
                        'id' => "e_time",
                        'name' => "e_time",
                        'required' => "",
                        'value' => set_value('e_time') ? set_value('e_time') : (isset($data['e_time']) ? $data['e_time'] : '')
                    ]); ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Event Place', 'place', 'class="col-form-label"'); ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "place",
                        'name' => "place",
                        'maxlength' => 30,
                        'required' => "",
                        'value' => set_value('place') ? set_value('place') : (isset($data['place']) ? $data['place'] : '')
                    ]); ?>
                    <?= form_error('place') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Event image', 'image', 'class="col-form-label"'); ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        'accept' => "image/png, image/jpg, image/jpeg, application/pdf",
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
                    <?= form_label('Description', 'description', 'class="col-form-label"'); ?>
                    <?= form_textarea([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "description",
                        'rows'=>"4",
                        'name' => "description",
                        'required' => "",
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