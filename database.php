<?php
use \Illuminate\Database\Schema\Blueprint;
use \Illuminate\Database\Query\Builder;

return [
    "connections" => [
        "default" => [
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'database',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ],
    "schema" => [
        "tb_user" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->string("data");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
    ],
    "alias" => [
         "all" => ["default","auth"]
    ],
//    "seeds" => [
//        ["sample_table",function(Builder $builder){
//            $builder->insert($data);
//        }],
//    ],
    "includes" => [
        "auth" => __DIR__."/schema/database.php"
    ]
];


