<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
    <div class="card-header">
        <h5><?= $title ?> <?= $operation ?></h5>
    </div>
    <div class="card-body">
        <?= form_open() ?>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <?= form_label("I card title", 'icard', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => 'icard',
                            'name' => 'icard',
                            'maxlength' => 255,
                            'value' => set_value('icard') ? set_value('icard') : (isset($data['value']) ? $data['value'] : '')
                        ]); ?>
                        <?= form_error('icard') ?>
                    </div>
                </div>
                <div class="col-3">
                    <?= form_button([
                        'type'    => 'submit',
                        'class'   => 'btn btn-outline-primary btn-block',
                        'content' => 'UPDATE'
                    ]); ?>
                </div>
                <div class="col-3">
                    <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
                </div>
            </div>
        <?= form_close() ?>
    </div>
</div>