<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-2 member_detail_left">
    <div class="sec_content">
        <div class="content-1">
            <p>
                <?= $name !== 'members' ? anchor('members', 'My Family', 'class="contet_a"') : '<a class="contet_a" href="javascript:;">My Family</a>' ?>
            </p>
        </div>
        <div class="content-1">
            <p>
                <?= $name !== 'add-member' ? anchor('members/add-member', 'Register Your Family', 'class="contet_a"') : '<a class="contet_a" href="javascript:;">Register Your Family</a>' ?>
            </p>
        </div>
        <div class="content-1">
            <p>
                <?= $name !== 'tree' ? anchor('members/tree', 'Family Tree', 'class="contet_a"') : '<a class="contet_a" href="javascript:;">Family Tree</a>' ?>
            </p>
        </div>
        <div class="content-1">
            <p>
                <?= anchor('members/logout', "Logout", 'class="contet_a"') ?>
            </p>
        </div>
    </div>
</div>