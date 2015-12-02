<?php

use Monolog\Logger;

return array(
    'hosts' => array(
                    '127.0.0.1:9200'
                    ),
    'logPath' => 'D:\elasticsearch\logs',
    'logLevel' => Logger::INFO,
    'index_name'=>'foodiee',
    'post_type'=>'post'
);