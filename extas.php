<?php

use deflou\components\langs\ELangs;
use deflou\interfaces\langs\ILang;
use deflou\interfaces\langs\phrases\IPhrase;
use extas\interfaces\parameters\IParam;

return [
    'languages' => [
        [
            ILang::FIELD__NAME => ELangs::Russian->value,
            ILang::FIELD__TITLE => 'Русский',
            ILang::FIELD__DESCRIPTION => 'Русский язык',
            ILang::FIELD__PARAMS => [
                ILang::PARAM__CODE => [
                    IParam::FIELD__NAME => ILang::PARAM__CODE,
                    IParam::FIELD__TITLE => 'Код языка',
                    IParam::FIELD__DESCRIPTION => 'Двусимвольный код языка',
                    IParam::FIELD__VALUE => 'ru'
                ]
            ]
        ],
        [
            ILang::FIELD__NAME => ELangs::English->value,
            ILang::FIELD__TITLE => 'English',
            ILang::FIELD__DESCRIPTION => 'English language',
            ILang::FIELD__PARAMS => [
                ILang::PARAM__CODE => [
                    IParam::FIELD__NAME => ILang::PARAM__CODE,
                    IParam::FIELD__TITLE => 'Language code',
                    IParam::FIELD__DESCRIPTION => 'Two symbols language code',
                    IParam::FIELD__VALUE => 'en'
                ]
            ]
        ]
    ],
    'phrases' => [
        [
            IPhrase::FIELD__LANG => ELangs::Russian->value,
            IPhrase::FIELD__NAME => 'test',
            IPhrase::FIELD__VALUE => 'тест'
        ]
    ]
];
