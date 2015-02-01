<?php
use \Illuminate\Database\Schema\Blueprint;
use \Illuminate\Database\Query\Builder;

return [
    "schema" => [
        "signup_login_attempt" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->string("login_key");
                $table->dateTime("created_at");
            },
        "signup_auth" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->string("provider");
                $table->string("key");
                $table->unsignedInteger("user_id");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
    ],
//    "seeds" => [
//        ["sample_table",function(Builder $builder){
//            $builder->insert($data);
//        }],
//    ],
//    "include" => [
//        "user" => __DIR__."/data/user.php"
//    ]
];


