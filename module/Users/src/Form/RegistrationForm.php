<?php
namespace Users\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

/**
 * This form is used to collect user registration data. This form is multi-step.
 * It determines which fields to create based on the $step argument you pass to
 * its constructor.
 */
class RegistrationForm extends Form
{
    /**
     * Constructor.     
     */
    public function __construct($step)
    {
        // Check input.
        if (!is_int($step) || $step<1 || $step>3)
            throw new \Exception('Step is invalid');
        
        // Define form name
        parent::__construct('registration-form');
     
        // Set POST method for this form
        $this->setAttribute('method', 'post');
                
        $this->addElements($step);
        $this->addInputFilter($step); 
    }
    
    /**
     * This method adds elements to form (input fields and submit button).
     */
    protected function addElements($step) 
    {
        if ($step==1) {
            
            // Add "email" field
            $this->add([           
                'type'  => 'text',
                'name' => 'email',
                'attributes' => [
                    'id' => 'email'
                ],
                'options' => [
                    'label' => 'أدخل بريدك الإلكتروني (e-mail)',
                ],
            ]);
            
            // Add "full_name" field
            $this->add([           
                'type'  => 'text',
                'name' => 'full_name',
                'attributes' => [
                    'id' => 'full_name'
                ],
                'options' => [
                    'label' => 'إسمك الكامل',
                ],
            ]);
            
            // Add "user_name" field
            $this->add([           
                'type'  => 'text',
                'name' => 'user_name',
                'attributes' => [
                    'id' => 'user_name'
                ],
                'options' => [
                    'label' => 'إسمك المستعار',
                ],
            ]);
            
            // Add "password" field
            $this->add([           
                'type'  => 'password',
                'name' => 'password',
                'attributes' => [
                    'id' => 'password'
                ],
                'options' => [
                    'label' => 'قنك السري',
                ],
            ]);
            
            // Add "confirm_password" field
            $this->add([           
                'type'  => 'password',
                'name' => 'confirm_password',
                'attributes' => [
                    'id' => 'confirm_password'
                ],
                'options' => [
                    'label' => 'أكد القن السري',
                ],
            ]);           
            
        } else if ($step==2) {

            // Add "street_address" field
            $this->add([
                'type'  => 'text',
                'name' => 'street_address',
                'attributes' => [                
                    'id' => 'street_address'
                ],
                'options' => [
                    'label' => 'عنوانك الشخصي',
                ],
            ]);
            
            // Add "city" field
            $this->add([
                'type'  => 'text',
                'name' => 'city',
                'attributes' => [                
                    'id' => 'city'
                ],
                'options' => [
                    'label' => 'المدينة',
                ],
            ]);
            
            // Add "post_code" field
            $this->add([
                'type'  => 'text',
                'name' => 'post_code',
                'attributes' => [                
                    'id' => 'post_code'
                ],
                'options' => [
                    'label' => 'رقم البريد',
                ],
            ]);
            
            // Add "country" field
            $this->add([            
                'type'  => 'select',
                'name' => 'country',
                'attributes' => [
                    'id' => 'country',                                
                ],                                    
                'options' => [                                
                    'label' => 'الدولة',
                    'empty_option' => '-- إختر دولتك --',
                    'value_options' => [
                        'US' => 'United States',
                        'CA' => 'Canada',
                        'GB' => 'Great Britain',
                        'FR' => 'France',
                        'IT' => 'Italy',
                        'DE' => 'Germany',
                        'RU' => 'Russia',
                        'CN' => 'China',
                        'AU' => 'Australia',
                        'JP' => 'Japan',
                        'MA' => 'Morocco'
                    ],                
                ],
            ]);
            
            
        } else if ($step==3) {
            
            // Add the CAPTCHA field
            $this->add([
                'type'  => 'captcha',
                'name' => 'captcha',
                'attributes' => [],
                'options' => [
                    'label' => 'أدخل الكود كما يبدوا لك',
                    'captcha' => [
                        'class' => 'Image',
                        'imgDir' => './public/img/captcha',
                        'suffix' => '.png',                    
                        'imgUrl' => '/img/captcha/',
                        'imgAlt' => 'CAPTCHA Image',
                        'font'   => './data/font/thorne_shaded.ttf',
                        'fsize'  => 24,
                        'width'  => 350,
                        'height' => 100,
                        'expiration' => 600, 
                        'dotNoiseLevel' => 40,
                        'lineNoiseLevel' => 3
                    ],
                ],
            ]);
            
        }
        
        // Add the CSRF field
        $this->add([
            'type'  => 'csrf',
            'name' => 'csrf',
            'attributes' => [],
            'options' => [                
                'csrf_options' => [
                     'timeout' => 600
                ]
            ],
        ]);
        
        // Add the submit button
        $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [                
                'value' => 'المرحلة الموالية',
                'id' => 'submitbutton',
            ],
        ]);        
    }
    
    /**
     * This method creates input filter (used for form filtering/validation).
     */
    private function addInputFilter($step) 
    {
        $inputFilter = new InputFilter();        
        $this->setInputFilter($inputFilter);
        
        if ($step==1) {

            $inputFilter->add([
                    'name'     => 'email',
                    'required' => true,
                    'filters'  => [
                        ['name' => 'StringTrim'],                    
                    ],                
                    'validators' => [
                        [
                            'name' => 'EmailAddress',
                            'options' => [
                                'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                                'useMxCheck'    => false,                            
                            ],
                        ],
                    ],
                ]);
            
            $inputFilter->add([
                'name'     => 'full_name',
                'required' => true,
                'filters'  => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                    ['name' => 'StripNewlines'],
                ],                
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'min' => 1,
                            'max' => 128
                        ],
                    ],
                ],
            ]);
            
            $inputFilter->add([
                'name'     => 'user_name',
                'required' => true,
                'filters'  => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                    ['name' => 'StripNewlines'],
                ],                
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'min' => 1,
                            'max' => 128
                        ],
                    ],
                ],
            ]);
           
            // Add input for "password" field
            $inputFilter->add([
                    'name'     => 'password',
                    'required' => true,
                    'filters'  => [                    
                    ],                
                    'validators' => [
                        [
                            'name'    => 'StringLength',
                            'options' => [
                                'min' => 6,
                                'max' => 64
                            ],
                        ],
                    ],
                ]);  

            // Add input for "confirm_password" field
            $inputFilter->add([
                    'name'     => 'confirm_password',
                    'required' => true,
                    'filters'  => [
                    ],       
                    'validators' => [
                        [
                            'name'    => 'Identical',
                            'options' => [
                                'token' => 'password',                            
                            ],
                        ],
                    ],
                ]);
            
        } else if ($step==2) {
        
            // Add input for "street_address" field
            $inputFilter->add([
                    'name'     => 'street_address',
                    'required' => true,
                    'filters'  => [
                        ['name' => 'StringTrim'],
                    ],                
                    'validators' => [
                        ['name'=>'StringLength', 'options'=>['min'=>1, 'max'=>255]]
                    ],
                ]);

            // Add input for "city" field
            $inputFilter->add([
                    'name'     => 'city',
                    'required' => true,
                    'filters'  => [
                        ['name' => 'StringTrim'],
                    ],                
                    'validators' => [
                        ['name'=>'StringLength', 'options'=>['min'=>1, 'max'=>255]]
                    ],
                ]);

            // Add input for "post_code" field
            $inputFilter->add([
                    'name'     => 'post_code',
                    'required' => true,
                    'filters'  => [                                        
                    ],                
                    'validators' => [
                        ['name' => 'IsInt'],
                        ['name'=>'Between', 'options'=>['min'=>0, 'max'=>999999]]
                    ],
                ]);

            // Add input for "country" field
            $inputFilter->add([
                    'name'     => 'country',
                    'required' => false,                
                    'filters'  => [
                        ['name' => 'Alpha'],
                        ['name' => 'StringTrim'],
                        ['name' => 'StringToUpper'],
                    ],                
                    'validators' => [
                        ['name'=>'StringLength', 'options'=>['min'=>2, 'max'=>2]]
                    ],
                ]);     
            
        } 
    }
}


