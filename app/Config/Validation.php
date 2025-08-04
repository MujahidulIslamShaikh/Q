<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $user_login = [
        'email' => [
            'label' => 'Email Address',
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'The {field} field is required.',
                'valid_email' => 'Please enter a valid {field}.'
            ]
        ],
    ];

    public $order = [
        'name' => [
            'label' => 'Full Name',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'mobile' => [
            'label' => 'Mobile Number',
            'rules' => 'required|numeric|exact_length[10]',
            'errors' => [
                'required' => 'The {field} field is required.',
                'numeric' => 'The {field} must contain only numbers.',
                'exact_length' => 'The {field} must be exactly 10 digits long.'
            ]
        ],
        // 'email' => [
        //     'label' => 'Email Address',
        //     'rules' => 'required|valid_email',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //         'valid_email' => 'Please enter a valid {field}.'
        //     ]
        // ],
        // 'address' => [
        //     'label' => 'Address',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //     ]
        // ],
        'city' => [
            'label' => 'City',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        // 'landmark' => [
        //     'label' => 'Landmark',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //     ]
        // ],
        // 'repair_date' => [
        //     'label' => 'Repair Date',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //     ]
        // ],
        // 'repair_time' => [
        //     'label' => 'Repair Time',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //     ]
        // ],
        // 'repair_type' => [
        //     'label' => 'Repair Type',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //     ]
        // ],
    ];

    public $contact_us = [
        'name' => [
            'label' => 'First Name',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'last_name' => [
            'label' => 'Last Name',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'city' => [
            'label' => 'City',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'mobile' => [
            'label' => 'Mobile Number',
            'rules' => 'required|numeric|exact_length[10]',
            'errors' => [
                'required' => 'The {field} field is required.',
                'numeric' => 'The {field} must contain only numbers.',
                'exact_length' => 'The {field} must be exactly 10 digits long.'
            ]
        ],
        'email' => [
            'label' => 'Email Address',
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'The {field} field is required.',
                'valid_email' => 'Please enter a valid {field}.'
            ]
        ],
        'subject' => [
            'label' => 'Subject',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        // 'message' => [
        //     'label' => 'Message',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //     ]
        // ],
    ];

    public $brand = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Icon',
            'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'uploaded' => 'The {field} field is required.',
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
        'order_number' => [
            'label' => 'Order Number',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];
    public $update_brand = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Icon',
            'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
        'order_number' => [
            'label' => 'Order Number',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $banner = [
        'image' => [
            'label' => 'Banner Image',
            'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'uploaded' => 'The {field} field is required.',
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                'max_size' => 'The {field} must not exceed 1 MB.'
            ]
        ]
    ];

    public $model = [
        'brand_id' => [
            'field' => 'brand_id',
            'label' => 'Brand',
            'rules' => 'required|numeric',

            'errors' => [
                'required' => 'Please select a {field}.',
                'numeric' => 'The %s must be a valid numeric selection.'
            ]
        ],
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Icon',
            'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'uploaded' => 'The {field} field is required.',
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
        'order_number' => [
            'label' => 'Order Number',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'type' => [
            'label' => 'Type',
            'rules' => 'required',
            'errors' => [
                'required' => 'Please select a {field}.',
            ]
        ],
    ];
    public $update_model = [
        'brand_id' => [
            'field' => 'brand_id',
            'label' => 'Brand',
            'rules' => 'required|numeric', // Validation for required and numeric dropdown selection

            'errors' => [
                'required' => 'Please select a {field}.',
                'numeric' => 'The %s must be a valid numeric selection.'
            ]
        ],
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Icon',
            'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
        'order_number' => [
            'label' => 'Order Number',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'type' => [
            'label' => 'Type',
            'rules' => 'required',
            'errors' => [
                'required' => 'Please select a {field}.',
            ]
        ],
    ];

    public $service = [
        'brand_id' => [
            'field' => 'brand_id',
            'label' => 'Brand',
            'rules' => 'required|numeric', // Validation for required and numeric dropdown selection

            'errors' => [
                'required' => 'Please select a {field}.',
                'numeric' => 'The %s must be a valid numeric selection.'
            ]
        ],
        'model_id' => [
            'field' => 'model_id',
            'label' => 'Model',
            'rules' => 'required|numeric', // Validation for required and numeric dropdown selection

            'errors' => [
                'required' => 'Please select a {field}.',
                'numeric' => 'The %s must be a valid numeric selection.'
            ]
        ],
        // 'title' => [
        //     'label' => 'Title',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //     ]
        // ],
        // 'image' => [
        //     'label' => 'Image',
        //     'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        //     'errors' => [
        //         'uploaded' => 'The {field} field is required.',
        //         'is_image' => 'The {field} must be a valid image file.',
        //         'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
        //     ]
        // ],
        // 'main_price' => [
        //     'field' => 'main_price',
        //     'label' => 'Main Price',
        //     'rules' => 'required|numeric',

        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //         'numeric' => 'The %s must be a valid numeric selection.'
        //     ]
        // ],
        // 'discounted_price' => [
        //     'field' => 'discounted_price',
        //     'label' => 'Discounted Price',
        //     'rules' => 'required|numeric',

        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //         'numeric' => 'The %s must be a valid numeric selection.'
        //     ]
        // ],
        // 'percent_off' => [
        //     'field' => 'percent_off',
        //     'label' => 'Percentage Off',
        //     'rules' => 'required|numeric',

        //     'errors' => [
        //         'required' => 'The {field} field is required.',
        //         'numeric' => 'The %s must be a valid numeric selection.'
        //     ]
        // ],
    ];
    public $update_service = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Image',
            'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
        'main_price' => [
            'field' => 'main_price',
            'label' => 'Main Price',
            'rules' => 'required|numeric',

            'errors' => [
                'required' => 'The {field} field is required.',
                'numeric' => 'The %s must be a valid numeric selection.'
            ]
        ],
        'discounted_price' => [
            'field' => 'discounted_price',
            'label' => 'Discounted Price',
            'rules' => 'required|numeric',

            'errors' => [
                'required' => 'The {field} field is required.',
                'numeric' => 'The %s must be a valid numeric selection.'
            ]
        ],
        'percent_off' => [
            'field' => 'percent_off',
            'label' => 'Percentage Off',
            'rules' => 'required|numeric',

            'errors' => [
                'required' => 'The {field} field is required.',
                'numeric' => 'The %s must be a valid numeric selection.'
            ]
        ],
    ];

    public $gallery = [
        'image' => [
            'label' => 'Image',
            'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'uploaded' => 'The {field} field is required.',
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $blog = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Image',
            'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'uploaded' => 'The {field} field is required.',
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
    ];
    public $update_blog = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Image',
            'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
    ];

    public $issue = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Image',
            'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'uploaded' => 'The {field} field is required.',
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
    ];
    public $update_issue = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Image',
            'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
    ];

    public $mobile = [
        'mobile' => [
            'label' => 'Mobile Number',
            'rules' => 'required|numeric|exact_length[10]',
            'errors' => [
                'required' => 'The {field} field is required.',
                'numeric' => 'The {field} must contain only numbers.',
                'exact_length' => 'The {field} must be exactly 10 digits long.'
            ]
        ],
    ];

    public $email = [
        'email' => [
            'label' => 'Email Address',
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'The {field} field is required.',
                'valid_email' => 'Please enter a valid {field}.'
            ]
        ]
    ];

    public $address = [
        'address' => [
            'label' => 'Address',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $terms_condition = [
        'terms_condition' => [
            'label' => 'Terms & Conditions',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $warranty_policy = [
        'warranty_policy' => [
            'label' => 'Warranty Policy',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $about = [
        'about_us' => [
            'label' => 'About Us',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $e_waste = [
        'policy' => [
            'label' => 'E-waste Policy',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $privacy_policy = [
        'policy' => [
            'label' => 'Privacy Policy',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];

    public $faq = [
        'question' => [
            'label' => 'Question',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'answer' => [
            'label' => 'Answer',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'type' => [
            'field' => 'type',
            'label' => 'Type',
            'rules' => 'required',

            'errors' => [
                'required' => 'Please select a {field}.',
            ]
        ],
    ];

    public $testimonial = [
        'user_name' => [
            'label' => 'User Name',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'description' => [
            'label' => 'Description',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];
    public $videos = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
        'image' => [
            'label' => 'Image',
            'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
            'errors' => [
                'is_image' => 'The {field} must be a valid image file.',
                'mime_in' => 'The {field} must be a JPG, JPEG, or PNG file.',
                
            ]
        ],
        'url' => [
            'label' => 'URL',
            'rules' => 'required',
            'errors' => [
                'required' => 'The {field} field is required.',
            ]
        ],
    ];


}
