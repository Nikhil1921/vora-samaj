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
                    <?php if($birthdays): ?>
                      <marquee behavior="scroll" direction="left" class="ojas-small" scrolldelay="500" style="height: 263px;">
                        <div class="mrq_content">
                    <?php foreach($birthdays as $b): ?>
                        <?= img(['src' => $b['image'], 'class' => "d-block w-100"]) ?>
                        <h3 class="committee_h6"><strong><?= $b['name'] ?></strong></h3>
                    <?php endforeach; ?>
                      </div>
                    </marquee>
                    <?php else: ?>
                    <?= img(['src'=>"assets/images/sad.png"]) ?>
                    <h6 class="committee_h6">No birthdays available.</h6>
                    <?php endif ?>
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
                    <p class="content_p font_family">વંશ વૃદ્ધિની તવારીખ પણ રોમાંચક, રસપ્રદ, અને ભાતીગળ હોઈ કુટુંબના પૂર્વ ઈતિહાસની માફક કુટુંબની અટક પણ ભૌગોલિક તેમજ વ્યવસાયિક સબંધો સાથે સૂત્રાત્મક સાતત્ય ધરાવતી હોય છે. અહીં જે પ્રસ્તુત છે તે ‘વોરા' અટક ધીરધારના વ્યવસાય કારણે વહેવારવાળાનાં ટુંકાક્ષરી પર્યાય ‘વોરા’ વ્યવસાય સૂચક છે.</p>
                    <p class="content_p font_family">આપણા અર્થાત દસાડીઆ જૈન વોરા કુટુંબ મૂળ રાજસ્થાન જોધપૂર, બિકાનેર વચ્ચે આવેલ પીપાવારોડના વતની મૂળે રજપુત અને વૈષ્ણવ ધર્મના અનુયાયી હોવા છતાં ૨૫૦ વર્ષ પૂર્વે સ્થળાંતર કરી કુટુંબના પૂર્વજો ગુજરાતમાં થરાદ ગામે આવ્યા, અહિં જૈન ગોરજી મહારાજ કે મુનિમહારાજના સંપર્કમાં આવ્યા તેના ઉપદેશના ફળ સ્વરૂપે જૈન ધર્મ અંગીકાર કર્યો.</p>
                    <p class="content_p font_family">વ્યવસાય સૂચક વોરા સાથે શ્રીમાળનગર તરફ્ટી આવતાં ‘શ્રીમાળી કહેવાયા અને દસાડા ગામમાં સ્થાયી થતાં | શ્રીમાળી દસાડીયા જૈન વોરા તરીકે ઓળખાયા.</p>
                  </div>
                  <?php if(!$this->session->userId): ?>
                  <div class="col-lg-5 sec_detail">
                    <div class="card martimonial_card" style="width: 100%;">
                      <div class="matrimonial_tit">
                        <h5 class="card-title matrimonial_title">Member Login</h5>
                      </div>
                      <div class="card-body mt-1">
                        <?= form_open('login', 'id="login-form"') // send-sms for otp login ?>
                          <label for="html"><strong>Login mobile / Email</strong></label><br>
                          <input name="mobile" type="text" maxlength="100" size="30" placeholder="Enter mobile / Email" />
                          <label class="pt-2" for="html"><strong>Password</strong></label><br>
                          <!-- <label class="pt-2" for="html"><strong>OTP</strong></label><br> -->
                          <input name="otp" type="text" size="30" placeholder="Enter password" />
                          <div class="login_btn">
                            <div class="log_in">
                              <button type="submit" class="log_in_btn">LOGIN</button>
                              <!-- <button type="submit" class="log_in_btn">GET OTP</button> -->
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