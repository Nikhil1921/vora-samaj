<?php defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->passId)
{
    echo form_open('forgot/change-password', 'id="forgot-form"');
    echo '<div class="row">
            <div class="col-12">
                <h5 class="alert alert-danger text-center">Change Password</h5>
                <div id="error-messages" class="text-danger"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="col-form-label">Password</label>                                                <input type="password" name="password" value="" class="form-control" id="password" maxlength="100"  />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="confirm_password" class="col-form-label">Confirm Password</label>                                                <input type="password" name="confirm_password" value="" class="form-control" id="confirm_password" maxlength="100"  />
                </div>
            </div>
            <div class="col-md-6">
                <div class="log_in">
                    <button type="button" onclick="formSubmit(this.form);" class="log_in_btn">Change Password</button>
                </div>
            </div>
        </div>';
}
elseif ($this->session->otpId)
{
    echo form_open('forgot/verify-otp', 'id="forgot-form"');
    echo '<div class="row">
            <div class="col-12">
                <h5 class="alert alert-danger text-center">Verify OTP</h5>
                <div id="error-messages" class="text-danger"></div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    '.form_label('OTP', 'otp', 'class="col-form-label"').'       
                    '.form_input([
                        'class' => "form-control",
                        'name' => "otp",
                        'maxlength' => 6
                    ]).'
                </div>
            </div>
            <div class="col-md-12">
                <div class="log_in">
                    <button type="button" onclick="formSubmit(this.form);" class="log_in_btn">Verify OTP</button>
                </div>
            </div>
        </div>';
}
else
{
    echo form_open('forgot/send-otp', 'id="forgot-form"');
    echo '<div class="row">
            <div class="col-12">
                <h5 class="alert alert-danger text-center">Send OTP</h5>
                <div id="error-messages" class="text-danger"></div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    '.form_label('Mobile', 'mobile', 'class="col-form-label"').'       
                    '.form_input([
                        'class' => "form-control",
                        'name' => "mobile",
                        'maxlength' => 10
                    ]).'
                </div>
            </div>
            <div class="col-md-12">
                <div class="log_in">
                    <button type="button" onclick="formSubmit(this.form);" class="log_in_btn">Send OTP</button>
                </div>
            </div>
        </div>';
}

echo form_close();