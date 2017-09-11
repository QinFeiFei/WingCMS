<?php

return [
    // 影视类型 - 对应数据库
    'TV_MOVIE' => 10,
    'TV_TELEPLAY' => 20,
    'TV_CARTOON' => 30,
    'TV_VARIETY' => 40,
    'TV_MV' => 50,
    'TV_OPENCLASS' => 60,
    'TV_OTHER' => 70,

    // 路由中支持的影视类型
    'tv_Types' => [
        'movie',
        'teleplay',
        'cartoon',
        'variety',
        'mv',
        'openclass',
        'other'
    ],

    // 影视语言
    'tv_langs' => [
        [
            'label'=> '国语',
            'value'=> '10'
        ],
        [
            'label'=> '英语',
            'value'=> '20'
        ]
    ],

    // 影视年代
    'tv_years' => [
        [
            'label'=> '2017',
            'value'=> '2017'
        ],
        [
            'label'=> '2016',
            'value'=> '2016'
        ],
        [
            'label'=> '2015',
            'value'=> '2015'
        ],
        [
            'label'=> '2014',
            'value'=> '2014'
        ],
        [
            'label'=> '2013',
            'value'=> '2013'
        ],
        [
            'label'=> '2012',
            'value'=> '2012'
        ],
        [
            'label'=> '2011',
            'value'=> '2011'
        ],
        [
            'label'=> '2010-2000',
            'value'=> '2010-2000'
        ],
        [
            'label'=> '90年代',
            'value'=> '2000-1990'
        ],
        [
            'label'=> '80年代',
            'value'=> '1990-1980'
        ],
        [
            'label'=> '70年代',
            'value'=> '1980-1970'
        ],
        [
            'label'=> '更早',
            'value'=> '1970-'
        ],
    ],

    // 影视地区
    'tv_areas' => [
        '10' => [
            [
                'label'=> '大陆',
                'value'=> '1'
            ],
            [
                'label'=> '港台',
                'value'=> '2'
            ],
            [
                'label'=> '美国',
                'value'=> '3'
            ],
            [
                'label'=> '日本',
                'value'=> '4'
            ],
            [
                'label'=> '韩国',
                'value'=> '5'
            ],
            [
                'label'=> '印度',
                'value'=> '6'
            ],
            [
                'label'=> '俄罗斯',
                'value'=> '7'
            ],
            [
                'label'=> '泰国',
                'value'=> '8'
            ],
            [
                'label'=> '加拿大',
                'value'=> '9'
            ],
            [
                'label'=> '法国',
                'value'=> '10'
            ],
            [
                'label'=> '英国',
                'value'=> '11'
            ],
            [
                'label'=> '意大利',
                'value'=> '12'
            ],
            [
                'label'=> '德国',
                'value'=> '13'
            ],
            [
                'label'=> '其它',
                'value'=> '99'
            ]
        ],
        '20' => [
            [
                'label'=> '大陆剧',
                'value'=> '101'
            ],
            [
                'label'=> '港台剧',
                'value'=> '102'
            ],
            [
                'label'=> '欧美剧',
                'value'=> '103'
            ],
            [
                'label'=> '日韩剧',
                'value'=> '104'
            ],
            [
                'label'=> '其它电视剧',
                'value'=> '110'
            ]
        ]
    ]
];