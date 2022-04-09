<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?= form_open_multipart(admin("import")) ?>
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
<div class="row">
    <?php if(isset($banners)): ?>
    <div class="col-md-3" onclick="window.location.href = '<?= base_url(admin('banners')) ?>'">
        <div class="card">
            <div class="card-body">
                <div class="chart-widget-dashboard">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0 f-w-600">
                                <span class="counter"><?= $banners ?></span>
                            </h5>
                            <p>Total Banners</p>
                        </div>
                        <i class="fa fa-image fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php if(isset($news)): ?>
    <div class="col-md-3" onclick="window.location.href = '<?= base_url(admin('news')) ?>'">
        <div class="card">
            <div class="card-body">
                <div class="chart-widget-dashboard">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0 f-w-600">
                                <span class="counter"><?= $news ?></span>
                            </h5>
                            <p>Total News</p>
                        </div>
                        <i class="fa fa-file-text fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php if(isset($members)): ?>
    <div class="col-md-3" onclick="window.location.href = '<?= base_url(admin('members')) ?>'">
        <div class="card">
            <div class="card-body">
                <div class="chart-widget-dashboard">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0 f-w-600">
                                <span class="counter"><?= $members ?></span>
                            </h5>
                            <p>Members</p>
                        </div>
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php if(isset($events)): ?>
    <div class="col-md-3" onclick="window.location.href = '<?= base_url(admin('events')) ?>'">
        <div class="card">
            <div class="card-body">
                <div class="chart-widget-dashboard">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0 f-w-600">
                                <span class="counter"><?= $events ?></span>
                            </h5>
                            <p>Total events</p>
                        </div>
                        <i class="fa fa-file-text fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php if(isset($committee)): ?>
    <div class="col-md-3" onclick="window.location.href = '<?= base_url(admin('committee')) ?>'">
        <div class="card">
            <div class="card-body">
                <div class="chart-widget-dashboard">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0 f-w-600">
                                <span class="counter"><?= $committee ?></span>
                            </h5>
                            <p>Total committee</p>
                        </div>
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php if(isset($boys_girls)): ?>
    <div class="col-md-3" onclick="window.location.href = '<?= base_url(admin('boys_girls')) ?>'">
        <div class="card">
            <div class="card-body">
                <div class="chart-widget-dashboard">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0 f-w-600">
                                <span class="counter"><?= $boys_girls ?></span>
                            </h5>
                            <p>Boys / Girls</p>
                        </div>
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
</div>