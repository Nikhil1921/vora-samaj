<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open('') ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Kacheri', 'k_id', 'class="col-form-label"') ?>
                    <select name="k_id" id="k_id" class="form-control" required>
                        <option value="" selected disabled>Select Kacheri</option>
                        <?php foreach($kacheries as $k): ?>
                            <option value="<?= e_id($k['id']) ?>" <?= set_value('k_id') ? set_select('k_id', e_id($k['id'])) : (isset($data['k_id']) && $data['k_id'] === $k['id'] ? "selected" : '') ?>><?= $k['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('k_id') ?>
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
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('name') ? set_value('name') : (isset($data['name']) ? $data['name'] : '')
                    ]); ?>
                    <?= form_error('name') ?>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <?= form_label('Video URL', 'v_url', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "v_url",
                        'name' => "v_url",
                        'maxlength' => 200,
                        'required' => "",
                        'value' => set_value('v_url') ? set_value('v_url') : (isset($data['v_url']) ? $data['v_url'] : '')
                    ]); ?>
                    <?= form_error('v_url') ?>
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