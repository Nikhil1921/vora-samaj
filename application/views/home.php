<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="background">
  <section class="content">
    <div class="container">
      <div class="row content_main">
        <div class="padd">
          <div class="col-lg-3 content_left">
            <div class="panel panel-primary">
              <div class="texture heading-texture">
                <div class="bg_image_mar">
                  <div style="float:left;padding:5px;font-size: 21px;">
                    <i class="fa fa-newspaper-o fa-lg"></i> News
                  </div>
                  <?= anchor('news', 'More', 'class="btn Hind_Vadodara_fnt" style="color: black; float: right;background-color:#ffffff;border:1px solid white;font-size: 10px;margin-top: 6px;margin-right: 8px;"'); ?>
                </div>
                <div class="panel-body">
                  <marquee behavior="scroll" direction="UP" class="ojas-small" scrolldelay="500" style="height: 263px;">
                  <div class="mrq_content">
                    <?php if($news): ?>
                    <?php foreach($news as $n): ?>
                        <?= anchor('news/'.e_id($n['id']), '<p class="marque_p"><span><i class="fa fa-caret-right" aria-hidden="true"></i> '.$n['title'].'</span></p>', 'class="mar_con"'); ?>
                        <?= img(['src' => $n['image'], 'class' => "d-block w-100"]) ?>
                    <?php endforeach; else: ?>
                    <h5>No news available</h5>
                      <?php endif ?>
                  </div>
                  </marquee>
                </div>
                </div>
              </div>
              <div class="committee_member">
                <div class="texture heading-texture">
                  <div class="committee_members">
                    <h5>Today's birthday</h5>
                  </div>
                  <?= img(['src'=>"assets/images/2.jpg"]) ?>
                  <h3 class="committee_h6"><strong>Jignesh Vora</strong></h3>
                </div>
              </div>
            </div>
            <div class="col-lg-9 content_right">
              <div class="row cont_right_main">
                <div class="col-12 carousel_content">
                  <div id="carouselBannersControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php foreach($banners as $k => $banner): ?>
                      <div class="carousel-item <?= $k === 0 ? 'active' : ''?>">
                        <?= img(['src' => $banner['banner'], 'class' => "d-block w-100"]) ?>
                      </div>
                      <?php endforeach ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselBannersControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselBannersControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
                <div class="row cont_main">
                  <div class="col-lg-<?= !$this->session->userId ? 7 : 12 ?>  marqe_content">
                    <p class="content_p">The festival of lights Diwali has been around for a long time. According to Hindu mythology, Lord Rama returned home to Ayodhya on this day after killing the demon king Ravana. Upon the arrival of their king, the residents of Ayodhya lighted the streets and houses with oil lamps to celebrate the occasion. Since then, the Hindus have been following the tradition by celebrating the festival with pomp and fervor. It is easily the favorite festival for kids as they get to eat their favorite sweets and wear new clothes.</p>
                  </div>
                  <?php if(!$this->session->userId): ?>
                  <div class="col-lg-5 sec_detail">
                    <div class="card martimonial_card" style="width: 100%;">
                      <div class="matrimonial_tit">
                        <h5 class="card-title matrimonial_title">Member Login</h5>
                      </div>
                      <div class="card-body mt-1">
                        <?= form_open('send-sms', 'id="login-form"') ?>
                          <label for="html"><strong>Login mobile / Email</strong></label><br>
                          <input name="mobile" type="text" maxlength="100" size="30" placeholder="Enter mobile / Email to get otp">
                          <label class="pt-2" for="html"><strong>OTP</strong></label><br>
                          <input name="otp" type="text" disabled size="30" maxlength="4">
                          <div class="login_btn">
                            <div class="log_in">
                              <button type="submit" class="log_in_btn">GET OTP</button>
                            </div>
                          </div>
                        <?= form_close() ?>
                      </div>
                    </div>
                  </div>
                  <?php endif ?>
                </div>
                <div class="row">
                  <div class="col-12 mt-4">
                    <div class="panel panel-primary">
                      <div class="texture heading-texture">
                        <div class="bg_image_mar">
                          <div style="float:left;padding:5px;font-size: 21px;">
                            <i class="fa fa-newspaper-o fa-lg"></i> Events
                          </div>
                          <?= anchor("events", 'More', 'class="btn Hind_Vadodara_fnt" style="color: black; float: right;background-color:#ffffff;border:1px solid white;font-size: 12px;margin-top: 4px;margin-right: 8px;"'); ?>
                        </div>
                        <div class="panel-body">
                          <marquee behavior="scroll" direction="UP" class="ojas-small" scrolldelay="500" style="height: 240px;">
                          <div class="mrq_content">
                            <?php if($events): ?>
                            <?php
                              foreach($events as $event):
                              echo anchor("events", '<p><span><i class="fa fa-caret-right" aria-hidden="true"></i> '.$event['title'].'</span></p>', 'class="mar_con"');
                              endforeach;
                            else:
                            ?>
                            <h3>No events available</h3>
                            <?php endif ?>
                          </div>
                          </marquee>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>