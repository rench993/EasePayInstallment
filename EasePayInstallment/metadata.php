<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = [
    'id'          => 'rench_installment',
    'title'       => [
        'de' => 'Ratenzahlungsmodul',
        'en' => 'Installment Module',
    ],
    'description' => [
        'de' => 'Einrichtung von Ratenzahlungen für Produkte.',
        'en' => 'Setup installments for products.',
    ],
    'thumbnail'   => '',
    'version'     => '1.0',
    'author'      => 'Your Company Name',
    'url'         => 'https://yourcompany.com/installment-module',
    'email'       => 'contact@yourcompany.com',
    'extend' => [
        \OxidEsales\Eshop\Application\Model\Article::class => \rench\EasePayInstallment\Model\Article::class,
        \OxidEsales\Eshop\Application\Controller\Admin\ArticleMain::class => \rench\EasePayInstallment\Controller\Admin\ArticleMain::class,
    ],

    'blocks'      => [
        [
            'template' => 'article_main.tpl',
            'block'    => 'admin_article_main_extended',
            'file'     => 'views/admin/blocks/article_main__admin_article_main_extended.tpl',
            'position' => '1',
        ],
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block'    => 'details_productmain_shortdesc',
            'file'     => 'views/blocks/productmain__details_productmain_shortdesc.tpl',
            'position' => '1',
        ]
    ],
    'settings'    => [
    ],
];
