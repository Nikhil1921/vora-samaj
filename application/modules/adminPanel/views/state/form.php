<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open() ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Country', 'c_id', 'class="col-form-label"') ?>
                    <select name="c_id" id="c_id" class="form-control">
                        <option value="" disabled selected>Select country</option>
                        <?php foreach($this->country as $c): ?>
                            <option value="<?= e_id($c['id']) ?>" <?= set_value('c_id') ? set_select('c_id', e_id($c['id'])) : (isset($data['c_id']) && $data['c_id'] == $c['id'] ? 'selected' : '') ?> ><?= $c['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('c_id') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Name', 'name', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "name",
                        'name' => "name",
                        'maxlength' => 100,
                        // 'required' => "",
                        'value' => set_value('name') ? set_value('name') : (isset($data['name']) ? $data['name'] : '')
                    ]); ?>
                    <?= form_error('name') ?>
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