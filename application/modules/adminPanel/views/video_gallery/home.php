<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-7">
            <h5><?= $title ?> <?= $operation ?></h5>
        </div>
        <div class="col-3">
            <select name="kacheri-change" class="form-control">
                <option value="">Select Kacheri</option>
                <?php foreach($kacheries as $k): ?>
                    <option value="<?= e_id($k['id']) ?>"><?= $k['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-2">
            <?= anchor("$url/add", '<span class="fa fa-plus"></span> Add new', 'class="btn btn-outline-success btn-sm float-right"'); ?>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="datatable table table-striped table-bordered nowrap">
            <thead>
                <th class="target">Sr.</th>
                <th>Name</th>
                <th class="target">URL</th>
                <th class="target">Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>