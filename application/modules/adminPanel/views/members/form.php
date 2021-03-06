<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', ['image' => isset($data['image']) ? $data['image'] : '']) ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Name', 'name', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "name",
                        'name' => "name",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('name') ? set_value('name') : (isset($data['name']) ? $data['name'] : '')
                    ]); ?>
                    <?= form_error('name') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Date Of Birth', 'dob', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "date",
                        'id' => "dob",
                        'name' => "dob",
                        'required' => "",
                        'value' => set_value('dob') ? set_value('dob') : (isset($data['dob']) ? $data['dob'] : '')
                    ]); ?>
                    <?= form_error('dob') ?>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <?= form_label('Education', 'education', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "education",
                        'name' => "education",
                        'required' => "",
                        'maxlength' => 255,
                        'value' => set_value('education') ? set_value('education') : (isset($data['education']) ? $data['education'] : '')
                    ]); ?>
                    <?= form_error('education') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group m-checkbox-inline mb-0 custom-radio-ml">
                    <?= form_label('Download Type', '', 'class="col-form-label"') ?>
                    <br>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Boy',
                            'id' => "boy",
                            'name' => "gender",
                            'checked' => set_value('gender') ? set_radio('gender', 'Boy') : (isset($data['gender']) && $data['gender'] == 'Boy' ? 'checked' : TRUE)
                        ]); ?>
                        <?= form_label('Boy', 'boy') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Girl',
                            'id' => "girl",
                            'name' => "gender",
                            'checked' => set_value('gender') ? set_radio('gender', 'Girl') : (isset($data['gender']) && $data['gender'] == 'Girl' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Girl', 'girl') ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Image', 'image', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        'name' => "image",
                    ]); ?>
                    <?= form_error('hoddo') ?>
                </div>
            </div>
            <?php if (isset($data['image'])): ?>
                <div class="col-2">
                    <?= img(['src' => $this->path.$data['image'], 'width' => '100%', 'height' => '100']); ?>
                </div>
            <?php endif ?>
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