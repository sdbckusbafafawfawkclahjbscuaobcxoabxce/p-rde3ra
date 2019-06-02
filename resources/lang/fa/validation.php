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

    'accepted'             => ':attribute باید تأیید شده باشد.',
    'active_url'           => ':attribute آدرس معتبری نیست.',
    'after'                => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal'       => ':attribute باید تاریخی برابر یا بعد از :date باشد.',
    'alpha'                => ':attribute باید فقط شامل حروف باشد.',
    'alpha_dash'           => ':attribute باید فقط شامل حروف، اعداد و خط فاصله باشد.',
    'alpha_num'            => ':attribute باید فقط شامل حروف و اعداد باشد.',
    'array'                => ':attribute باید به صورت آرایه باشد',
    'before'               => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal'      => ':attribute باید تاریخی برابر یا قبل از :date باشد.',
    'between'              => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file'    => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => ':attribute باید بین :min و :max کارکتر باشد.',
        'array'   => ':attribute باید آیتم‌هایی بین :min و :max داشته باشد.',
    ],
    'boolean'              => 'فیلد :attribute می‌بایست صحیح یا غلط باشد.',
    'confirmed'            => 'تأیدیه‌ی :attribute مطابقت ندارد.',
    'date'                 => ':attribute تاریخ معتبری نیست.',
    'date_format'          => ':attribute با فرمت :format مطابقت ندارد.',
    'different'            => ':attribute و :other باید متفاوت باشند.',
    'digits'               => ':attribute باید :digits رقمی باشد.',
    'digits_between'       => ':attribute باید رقمی بین :min و :max باشد.',
    'dimensions'           => ':attribute اندازه‌ی تصویر نامعتبری دارد.',
    'distinct'             => 'فیلد :attribute مقداری تکراری دارد.',
    'email'                => ':attribute باید یک آدرس ایمیل معتبر باشد.',
    'exists'               => ':attribute انتخاب شده نامعتبر است.',
    'file'                 => ':attribute باید یک فایل باشد.',
    'filled'               => ':attribute فیلدی ضروری است.',
    'image'                => ':attribute باید یک تصویر باشد',
    'in'                   => ':attribute انتخاب شده نامغتبر است.',
    'in_array'             => 'فیلد :attribute در :other موجود نیست.',
    'integer'              => ':attribute باید مقداری عددی باشد.',
    'ip'                   => ':attribute باید یا آدرس آی‌پی معتبر باشد.',
    'json'                 => ':attribute باید رشته‌ی معتبری از نوع JSON باشد.',
    'max'                  => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file'    => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string'  => ':attribute نباید بیشتر از :max کارکتر باشد.',
        'array'   => ':attribute نباید بیشتر از :max آیتم داشته باشد.',
    ],
    'mimes'                => ':attribute باید فایلی ار نوع: :values باشد.',
    'mimetypes'            => ':attribute باید فایلی ار نوع: :values باشد.',
    'min'                  => [
        'numeric' => ':attribute باید حداقل :min باشد.',
        'file'    => ':attribute باید حداقل :min کیلوبایت باشد.',
        'string'  => ':attribute باید حداقل :min کارکتر باشد.',
        'array'   => ':attribute باید حداقل :min آیتم باشد.',
    ],
    'not_in'               => ':attribute انتخاب شده نامعتبر است.',
    'numeric'              => ':attribute باید به صورت عددی بلشد.',
    'present'              => 'فیلد :attribute باید وجود داشته باشد.',
    'regex'                => 'فیلد :attribute نامعتبر است.',
    'required'             => 'فیلد :attribute نامعتبر است.',
    'required_if'          => 'فیلد :attribute الزامی است زمانی که :other برابر با :value باشد.',
    'required_unless'      => 'فیلد :attribute الزامی است مگر زمانی که :other در :values باشد.',
    'required_with'        => 'فیلد :attribute الزامی است زمانی که :values موجود باشند.',
    'required_with_all'    => 'فیلد :attribute الزامی است زمانی که :values موجود باشند.',
    'required_without'     => 'فیلد :attribute الزامی است زمانی که :values موجود نباشند.',
    'required_without_all' => 'فیلد :attribute الزامی است زمانی که هیچکدام از :values موجود نباشند.',
    'same'                 => ':attribute و :other باید مطابق باشند.',
    'size'                 => [
        'numeric' => ':attribute باید :size باشد.',
        'file'    => ':attribute باید :size کیلوبایت باشد.',
        'string'  => ':attribute باید :size کارکتر باشد.',
        'array'   => ':attribute باید شامل :size آیتم باشد.',
    ],
    'string'               => ':attribute باید رشته‌ای باشد.',
    'timezone'             => ':attribute باید منطقه‌ی زمانی معتبری باشد.',
    'unique'               => 'این :attribute   تکراری است و قبلا استفاده شده.',
    'uploaded'             => 'ِبارگزاری :attribute با خطا مواجه شد.',
    'url'                  => 'فرمت :attribute نامعتبر است.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(
        "name" => "نام",
        "username" => "نام کاربری",
        "email" => "پست الکترونیکی",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "password" => "رمز عبور",
        "password_confirmation" => "تاییدیه ی رمز عبور",
        "city" => "شهر",
        "country" => "کشور",
        "address" => "نشانی",
        "phone" => "تلفن",
        "mobile" => "تلفن همراه",
        "age" => "سن",
        "sex" => "جنسیت",
        "gender" => "جنسیت",
        "day" => "روز",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "text" => "متن",
        "content" => "محتوا",
        "description" => "توضیحات",
        "picture" => "عکس",
        "color" => "رنگ",
        "waranty" => "گارانتی",
        "price" => "قیمت",
        "excerpt" => "گلچین کردن",
        "date" => "تاریخ",
        "time" => "زمان",
        "available" => "موجود",
        "size" => "اندازه",
        "body" => "متن",
        "imageUrl" => "آدرس تصویر",
        "videoUrl" => "آدرس ویدیو",
        "slug" => "نامک (اسلاگ)",
        "tags" => "تگ ها (برچسب ها)",
        "category" => "دسته بندی",
        "keywords" => "کلمات کلیدی",
        "val" => "مقدار",
        "value" => "مقدار",
        "edit" => "ویرایش",
        "adminemail" => "ایمیل ادمین"
    ),

];
