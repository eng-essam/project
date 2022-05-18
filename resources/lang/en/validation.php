<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
     */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'custom' => [
        'email' => [
            'required' => 'برجاء كتابة البريد الالكتروني',
            'email' => " برجاء كتابة البريد الالكتروني صحيح",
            'unique' => "البريد الالكتروني موجود بالفعل",

        ],

        'password' => [
            'required' => 'برجاء كتابة كلمة السر',
            'confirmed' => 'كلمة السر غير متطابقتين',
            'min' => 'برجاء كتابة كلمة سر اكبر من 8 احرف',
        ],

        'Oldpassword' => [
            'required' => ' برجاء كتابة كلمة السر الحالية',
        ],

        'Newpassword' => [
            'required' => 'برجاء كتابة كلمة سر جديدة',
            'confirmed' => [
                'Newpassword.confirm' => 'كلمة السر غير متطابقتين',
            ],
            'min' => [
                'Newpassword.min' => 'برجاء كتابة كلمة سر اكبر من 8 احرف',
            ],
        ],

        'keyword' => [
            'required' => 'يرجي كتابة اسم الخدمة',
        ],

        'ssn' => [
            'required' => 'برجاء كتابة الرقم القومي',
            'numeric' => 'يرجي كتابة الرقم القومي صحيح',
            'digits' => 'يرجي كتابة الرقم القومي صحيح (14 رقم)',
            'unique' => "الرقم القومي موجود بالفعل ",
        ],

        'union_number' => [
            'required' => 'برجاء كتابة الكود النقابي',
            'numeric' => 'يرجي كتابة الكود النقابي صحيح',
            'unique' => " الكود النقابي موجود بالفعل",
            'numeric' => "يرجي ادخال كود نقابي صحيح",
        ],

        'phone' => [
            'required' => "يرجي ادخال رقم الهاتف",
            'unique' => "رقم الهاتف موجود بالفعل",
            'numeric' => "يرجي ادخل رقم هاتف صحيح",
            'digits' => " يرجي ادخل رقم هاتف صحيح مكون من 11 رقم فقط",
        ],
        'oldpassword' => [
            'required' => "برجاء ادخال كلمة السر الحالية",
        ],

        'card' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'personal_card' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'cost' => [
            'required' => 'يرجي رفع صورة لوصل سداد تكلفة الخدمة',
            'image' => 'يرجي رفع صورة لوصل سداد تكلفة الخدمة',
        ],

        'recept' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'report' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'receipt' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'birth' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'edu_certificate' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'salary' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'police_certificae' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'wedding' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'disclaimer' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'fulltime' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'ministry' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'endServ' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'brent' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'Insurance' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'health' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'attorney' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'License' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'recruitment' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'assignment' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'statement' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'movements' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'contract' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'engineer' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'tax_card' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'approval' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'presonal' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'army_card' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'temporary' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'master' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'model' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'graduation' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'excellence' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'personal' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'fesh' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'situation' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'certificate' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'building' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'recipe' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'device' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'purchase' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'license' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'registration' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'specialty' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'experience' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'fellowship' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'Professional' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'passport' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'hospital' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'death' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'funeral' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'benefits' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'newspaper' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'childrens' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'childrenspersonal' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'childs' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'project' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'hospitalcost' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

        'medical' => [
            'required' => 'يرجي رفع الصورة المطلوبة',
            'image' => 'يرجي رفع الصورة المطلوبة',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
     */

    'attributes' => [],

];
