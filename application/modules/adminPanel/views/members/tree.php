<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-10">
            <h5><?= $title ?> <?= $operation ?></h5>
        </div>
    </div>
</div>
<div class="card-body">
    <div id="treeBasic">
        <ul>
            <li><?= $parent['name'] ?>
                <ul>
                    <?php foreach ($self as $s): ?>
                        <li data-jstree="{&quot;opened&quot;:true}"><?= $s['name'] ?>
                            <?php if($tree == $s['id']): ?>
                                <ul>
                                    <?php foreach($child as $c): ?>
                                        <li data-jstree="{&quot;selected&quot;:true,&quot;type&quot;:&quot;file&quot;}"><?= $c['name'] ?></li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </li>
        </ul>
    </div>
</div>