<?php
use \Illuminate\Database\Schema\Blueprint;
use \Illuminate\Database\Query\Builder;

use Chatbox\SimpleKVS\Driver\SimpleDB;

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
        "signup_tmp_token"      => SimpleDB::schema(),
        "signup_tmp_invitation" => SimpleDB::schema(),
        "signup_tmp_reminder"   => SimpleDB::schema(),
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


