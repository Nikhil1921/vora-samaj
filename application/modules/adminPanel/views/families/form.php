<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', [
        'permanent_address' => isset($data['permanent_address']) ? $data['permanent_address'] : '',
        'current_address' => isset($data['current_address']) ? $data['current_address'] : '',
        'visiting_card' => isset($data['visiting_card']) ? $data['visiting_card'] : '',
        'image' => isset($data['image']) ? $data['image'] : '',
    ])?>
        <div class="row">
            <div class="col-12 alert alert-dark text-center">Personal details</div>
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Surname', 'surname', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "surname",
                        'name' => "surname",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('surname') ? set_value('surname') : (isset($data['surname']) ? $data['surname'] : '')
                    ]); ?>
                    <?= form_error('surname') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Mobile no.', 'mobile', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "mobile",
                        'name' => "mobile",
                        'maxlength' => 10,
                        'required' => "",
                        'value' => set_value('mobile') ? set_value('mobile') : (isset($data['mobile']) ? $data['mobile'] : '')
                    ]); ?>
                    <?= form_error('mobile') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Email', 'email', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "email",
                        'name' => "email",
                        'maxlength' => 100,
                        'required' => "",
                        'value' => set_value('email') ? set_value('email') : (isset($data['email']) ? $data['email'] : '')
                    ]); ?>
                    <?= form_error('email') ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?= form_label('Date Of Birth', 'dob', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "date",
                        'id' => "dob",
                        'name' => "dob",
                        'required' => "",
                        'value' => set_value('dob') ? set_value('dob') : (isset($data['dob']) ? $data['dob'] : '')
                    ]); ?>
                    <?= form_error('dob') ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group m-checkbox-inline mb-0 custom-radio-ml">
                    <?= form_label('Blood group', '', 'class="col-form-label"') ?>
                    <select name="blood_group" id="blood_group" class="form-control">
                        <option value="O +" <?= set_value('blood_group') ? set_select('blood_group', "O +") : (isset($data['blood_group']) && $data['blood_group'] == "O +" ? 'selected' : '') ?> >O +</option>
                        <option value="O -" <?= set_value('blood_group') ? set_select('blood_group', "O -") : (isset($data['blood_group']) && $data['blood_group'] == "O -" ? 'selected' : '') ?> >O -</option>
                        <option value="A +" <?= set_value('blood_group') ? set_select('blood_group', "A +") : (isset($data['blood_group']) && $data['blood_group'] == "A +" ? 'selected' : '') ?> >A +</option>
                        <option value="A -" <?= set_value('blood_group') ? set_select('blood_group', "A -") : (isset($data['blood_group']) && $data['blood_group'] == "A -" ? 'selected' : '') ?> >A -</option>
                        <option value="B +" <?= set_value('blood_group') ? set_select('blood_group', "B +") : (isset($data['blood_group']) && $data['blood_group'] == "B +" ? 'selected' : '') ?> >B +</option>
                        <option value="B -" <?= set_value('blood_group') ? set_select('blood_group', "B -") : (isset($data['blood_group']) && $data['blood_group'] == "B -" ? 'selected' : '') ?> >B -</option>
                        <option value="AB +" <?= set_value('blood_group') ? set_select('blood_group', "AB +") : (isset($data['blood_group']) && $data['blood_group'] == "AB +" ? 'selected' : '') ?> >AB +</option>
                        <option value="AB -" <?= set_value('blood_group') ? set_select('blood_group', "AB -") : (isset($data['blood_group']) && $data['blood_group'] == "AB -" ? 'selected' : '') ?> >AB -</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group m-checkbox-inline mb-0 custom-radio-ml">
                    <?= form_label('Status', '', 'class="col-form-label"') ?>
                    <br>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Married',
                            'id' => "Married",
                            'name' => "marital_status",
                            'checked' => set_value('marital_status') ? set_radio('marital_status', 'Married') : (isset($data['marital_status']) && $data['marital_status'] == 'Married' ? 'checked' : TRUE)
                        ]); ?>
                        <?= form_label('Married', 'Married') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Single',
                            'id' => "Single",
                            'name' => "marital_status",
                            'checked' => set_value('marital_status') ? set_radio('marital_status', 'Single') : (isset($data['marital_status']) && $data['marital_status'] == 'Single' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Single', 'Single') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Divorced',
                            'id' => "Divorced",
                            'name' => "marital_status",
                            'checked' => set_value('marital_status') ? set_radio('marital_status', 'Divorced') : (isset($data['marital_status']) && $data['marital_status'] == 'Divorced' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Divorced', 'Divorced') ?>
                    </div>
                </div>
            </div>
            <?php if($operation === 'Add'): ?>
            <div class="col-md-6">
                <div class="form-group m-checkbox-inline mb-0 custom-radio-ml">
                    <?= form_label('Relation', '', 'class="col-form-label"') ?>
                    <br>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Wife',
                            'id' => "Wife",
                            'name' => "relation",
                            'checked' => set_value('relation') ? set_radio('relation', 'Wife') : (isset($data['relation']) && $data['relation'] == 'Wife' ? 'checked' : TRUE)
                        ]); ?>
                        <?= form_label('Wife', 'Wife') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Daughter',
                            'id' => "Daughter",
                            'name' => "relation",
                            'checked' => set_value('relation') ? set_radio('relation', 'Daughter') : (isset($data['relation']) && $data['relation'] == 'Daughter' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Daughter', 'Daughter') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Son',
                            'id' => "Son",
                            'name' => "relation",
                            'checked' => set_value('relation') ? set_radio('relation', 'Son') : (isset($data['relation']) && $data['relation'] == 'Son' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Son', 'Son') ?>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Education', 'education', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "education",
                        'name' => "education",
                        'required' => "",
                        'maxlength' => 255,
                        'value' => set_value('education') ? set_value('education') : (isset($data['education']) ? $data['education'] : '')
                    ]); ?>
                    <?= form_error('education') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group m-checkbox-inline mb-0 custom-radio-ml">
                    <?= form_label('Occupation', '', 'class="col-form-label"') ?>
                    <br>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Business',
                            'id' => "Business",
                            'name' => "occupation_type",
                            'checked' => set_value('occupation_type') ? set_radio('occupation_type', 'Business') : (isset($data['occupation_type']) && $data['occupation_type'] == 'Business' ? 'checked' : TRUE)
                        ]); ?>
                        <?= form_label('Business', 'Business') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Proffessional',
                            'id' => "Proffessional",
                            'name' => "occupation_type",
                            'checked' => set_value('occupation_type') ? set_radio('occupation_type', 'Proffessional') : (isset($data['occupation_type']) && $data['occupation_type'] == 'Proffessional' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Proffessional', 'Proffessional') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Job',
                            'id' => "Job",
                            'name' => "occupation_type",
                            'checked' => set_value('occupation_type') ? set_radio('occupation_type', 'Job') : (isset($data['occupation_type']) && $data['occupation_type'] == 'Job' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Job', 'Job') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Other',
                            'id' => "Other",
                            'name' => "occupation_type",
                            'checked' => set_value('occupation_type') ? set_radio('occupation_type', 'Other') : (isset($data['occupation_type']) && $data['occupation_type'] == 'Other' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Other', 'Other') ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Occupation details', 'occupation', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "occupation",
                        'name' => "occupation",
                        'required' => "",
                        'maxlength' => 255,
                        'value' => set_value('occupation') ? set_value('occupation') : (isset($data['occupation']) ? $data['occupation'] : '')
                    ]); ?>
                    <?= form_error('occupation') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Occupation location', 'job_location', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "job_location",
                        'name' => "job_location",
                        'required' => "",
                        'maxlength' => 255,
                        'value' => set_value('job_location') ? set_value('job_location') : (isset($data['job_location']) ? $data['job_location'] : '')
                    ]); ?>
                    <?= form_error('job_location') ?>
                </div>
            </div>
            <div class="col-md-<?= isset($data['visiting_card']) ? 4 : 6 ?>">
                <div class="form-group">
                    <?= form_label('Visiting card', 'visiting_card', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "visiting_card",
                        'name' => "visiting_card",
                    ]); ?>
                </div>
            </div>
            <?php if (isset($data['visiting_card'])): ?>
                <div class="col-md-2">
                    <?= img(['src' => $this->path.$data['visiting_card'], 'width' => '100%', 'height' => '100']); ?>
                </div>
            <?php endif ?>
            <div class="col-md-<?= isset($data['image']) ? 4 : 6 ?>">
                <div class="form-group">
                    <?= form_label('Image', 'image', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        'name' => "image",
                    ]); ?>
                </div>
            </div>
            <?php if (isset($data['image'])): ?>
                <div class="col-md-2">
                    <?= img(['src' => $this->path.$data['image'], 'width' => '100%', 'height' => '100']); ?>
                </div>
            <?php endif ?>
            <div class="col-12 alert alert-dark text-center">Residential address</div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Building name', 'res_building_name', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "res_building_name",
                        'name' => "res_building_name",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('res_building_name') ? set_value('res_building_name') : (isset($data['res_building_name']) ? $data['res_building_name'] : '')
                    ]); ?>
                    <?= form_error('res_building_name') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Area', 'res_area', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "res_area",
                        'name' => "res_area",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('res_area') ? set_value('res_area') : (isset($data['res_area']) ? $data['res_area'] : '')
                    ]); ?>
                    <?= form_error('res_area') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Landmark', 'res_landmark', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "res_landmark",
                        'name' => "res_landmark",
                        'maxlength' => 100,
                        'required' => "",
                        'value' => set_value('res_landmark') ? set_value('res_landmark') : (isset($data['res_landmark']) ? $data['res_landmark'] : '')
                    ]); ?>
                    <?= form_error('res_landmark') ?>
                </div>
            </div>
            <div class="col-12"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= form_label('Country', 'res_country', 'class="col-form-label"') ?>
                    <select name="res_country" id="res_country" class="form-control country" onchange="getStates(this);" data-value="<?= set_value('res_state') ? set_value('res_state') : (isset($data['res_state']) ? e_id($data['res_state']) : '') ?>" data-dependent="res_state">
                        <option value="" disabled selected>Select country</option>
                        <?php foreach ($countries as $country): ?>
                            <option value="<?= e_id($country['id']) ?>" <?= set_value('res_country') ? set_select('res_country', e_id($country['id'])) : (isset($data['res_country']) && $data['res_country'] == $country['id'] ? 'selected' : '') ?> ><?= $country['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('res_country') ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= form_label('State', 'res_state', 'class="col-form-label"') ?>
                    <select name="res_state" id="res_state" class="form-control state" onchange="getCities(this);" data-value="<?= set_value('res_city') ? set_value('res_city') : (isset($data['res_city']) ? e_id($data['res_city']) : '') ?>" data-dependent="res_city"></select>
                    <?= form_error('res_state') ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= form_label('City', 'res_city', 'class="col-form-label"') ?>
                    <select name="res_city" id="res_city" class="form-control"></select>
                    <?= form_error('res_city') ?>
                </div>
            </div>
            <div class="col-12 alert alert-dark text-center">Current address</div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Building name', 'cur_building_name', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "cur_building_name",
                        'name' => "cur_building_name",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('cur_building_name') ? set_value('cur_building_name') : (isset($data['cur_building_name']) ? $data['cur_building_name'] : '')
                    ]); ?>
                    <?= form_error('cur_building_name') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Area', 'cur_area', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "cur_area",
                        'name' => "cur_area",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('cur_area') ? set_value('cur_area') : (isset($data['cur_area']) ? $data['cur_area'] : '')
                    ]); ?>
                    <?= form_error('cur_area') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Landmark', 'cur_landmark', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "cur_landmark",
                        'name' => "cur_landmark",
                        'maxlength' => 50,
                        'required' => "",
                        'value' => set_value('cur_landmark') ? set_value('cur_landmark') : (isset($data['cur_landmark']) ? $data['cur_landmark'] : '')
                    ]); ?>
                    <?= form_error('cur_landmark') ?>
                </div>
            </div>
            <div class="col-12"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= form_label('Country', 'cur_country', 'class="col-form-label"') ?>
                    <select name="cur_country" id="cur_country" class="form-control country" onchange="getStates(this);" data-value="<?= set_value('cur_state') ? set_value('cur_state') : (isset($data['cur_state']) ? e_id($data['cur_state']) : '') ?>" data-dependent="cur_state">
                        <option value="" disabled selected>Select country</option>
                        <?php foreach ($countries as $country): ?>
                            <option value="<?= e_id($country['id']) ?>" <?= set_value('cur_country') ? set_select('cur_country', e_id($country['id'])) : (isset($data['cur_country']) && $data['cur_country'] == $country['id'] ? 'selected' : '') ?> ><?= $country['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('cur_country') ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= form_label('State', 'cur_state', 'class="col-form-label"') ?>
                    <select name="cur_state" id="cur_state" class="form-control state" onchange="getCities(this);" data-value="<?= set_value('cur_city') ? set_value('cur_city') : (isset($data['cur_city']) ? e_id($data['cur_city']) : '') ?>" data-dependent="cur_city"></select>
                    <?= form_error('cur_state') ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= form_label('City', 'cur_city', 'class="col-form-label"') ?>
                    <select name="cur_city" id="cur_city" class="form-control"></select>
                    <?= form_error('cur_city') ?>
                </div>
            </div>
            <div class="col-12"></div>
            <div class="col-md-3 col-6">
                <?= form_button([
                    'type'    => 'submit',
                    'class'   => 'btn btn-outline-primary btn-block col-12',
                    'content' => 'SAVE'
                ]); ?>
            </div>
            <div class="col-md-3 col-6">
                <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
            </div>
        </div>
    <?= form_close() ?>
</div>