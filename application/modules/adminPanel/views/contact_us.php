<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
    <div class="card-header">
        <h5><?= $title ?> <?= $operation ?></h5>
    </div>
    <div class="card-body">
        <?= form_open() ?>
            <div class="row">
                <?php foreach ($fields as $field): ?>
                    <div class="col-6">
                        <div class="form-group">
                            <?= form_label($field['label'], $field['name'], 'class="col-form-label"') ?>
                            <?= form_input([
                                'class' => "form-control",
                                'type' => "text",
                                'id' => $field['name'],
                                'name' => $field['name'],
                                'maxlength' => 255,
                                'value' => set_value($field['name']) ? set_value($field['name']) : $field['value']
                            ]); ?>
                            <?= form_error($field['name']) ?>
                        </div>
                    </div>
                <?php endforeach ?>
                <div class="col-12"></div>
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