<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'error_prefix' => '<div class="txt-danger">* ',
    'error_suffix' => '</div>',
    
    'member_details' => [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[50]|alpha',
            'errors' => [
                'required' => "%s is required",
                'alpha' => "%s is invalid",
                'max_length' => "Max 50 characters allowed",
            ],
        ],
        [
            'field' => 'surname',
            'label' => 'Surname',
            'rules' => 'required|max_length[50]|alpha',
            'errors' => [
                'required' => "%s is required",
                'alpha' => "%s is invalid",
                'max_length' => "Max 50 characters allowed",
            ],
        ],
        [
            'field' => 'mobile',
            'label' => 'Mobile no.',
            'rules' => 'required|exact_length[10]|is_natural',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
                'exact_length' => "%s is invalid",
            ],
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|max_length[100]|valid_email',
            'errors' => [
                'required' => "%s is required",
                'valid_email' => "%s is invalid",
                'max_length' => "Max 100 characters allowed",
            ],
        ],
        [
            'field' => 'dob',
            'label' => 'Date of birth',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'blood_group',
            'label' => 'Blood group',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'marital_status',
            'label' => 'Status',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is required"
            ],
        ],
        [
            'field' => 'education',
            'label' => 'Education',
            'rules' => 'required|max_length[100]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 100 characters allowed",
            ],
        ],
        [
            'field' => 'occupation_type',
            'label' => 'Occupation',
            'rules' => 'required|max_length[15]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 15 characters allowed",
            ],
        ],
        [
            'field' => 'occupation',
            'label' => 'Occupation details',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 255 characters allowed",
            ],
        ],
        [
            'field' => 'job_location',
            'label' => 'Occupation location',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 characters allowed",
            ],
        ],
        [
            'field' => 'res_building_name',
            'label' => 'Building / Society name',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 characters allowed",
            ],
        ],
        [
            'field' => 'res_area',
            'label' => 'Area',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 characters allowed",
            ],
        ],
        [
            'field' => 'res_address1',
            'label' => 'Address line 1',
            'rules' => 'max_length[100]',
            'errors' => [
                'max_length' => "Max 100 characters allowed",
            ],
        ],
        [
            'field' => 'res_address2',
            'label' => 'Address line 2',
            'rules' => 'max_length[100]',
            'errors' => [
                'max_length' => "Max 100 characters allowed",
            ],
        ],
        [
            'field' => 'res_house_no',
            'label' => 'House no',
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 10 characters allowed",
            ],
        ],
        [
            'field' => 'res_country',
            'label' => 'Country',
            'rules' => 'required|is_natural',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
            ],
        ],
        [
            'field' => 'res_state',
            'label' => 'State',
            'rules' => 'required|is_natural',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
            ],
        ],
        [
            'field' => 'res_city',
            'label' => 'City',
            'rules' => 'required|is_natural',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
            ],
        ],
        [
            'field' => 'cur_building_name',
            'label' => 'Building / Society name',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 characters allowed",
            ],
        ],
        [
            'field' => 'cur_area',
            'label' => 'Area',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 characters allowed",
            ],
        ],
        [
            'field' => 'cur_address1',
            'label' => 'Address line 1',
            'rules' => 'max_length[100]',
            'errors' => [
                'max_length' => "Max 100 characters allowed",
            ],
        ],
        [
            'field' => 'cur_address2',
            'label' => 'Address line 2',
            'rules' => 'max_length[100]',
            'errors' => [
                'max_length' => "Max 100 characters allowed",
            ],
        ],
        [
            'field' => 'cur_house_no',
            'label' => 'House no',
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 10 characters allowed",
            ],
        ],
        [
            'field' => 'cur_country',
            'label' => 'Country',
            'rules' => 'required|is_natural',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
            ],
        ],
        [
            'field' => 'cur_state',
            'label' => 'State',
            'rules' => 'required|is_natural',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
            ],
        ],
        [
            'field' => 'cur_city',
            'label' => 'City',
            'rules' => 'required|is_natural',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
            ],
        ],
    ],
];