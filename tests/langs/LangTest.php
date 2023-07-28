<?php

use deflou\components\langs\ELangs;
use deflou\components\langs\LangService;
use deflou\components\langs\phrases\Phrase;
use extas\components\Item;
use extas\components\parameters\THasParams;
use extas\interfaces\parameters\IHaveParams;
use extas\interfaces\parameters\IParam;
use tests\ExtasTestCase;

class LangTest extends ExtasTestCase
{
    protected array $libsToInstall = [
        '' => ['php', 'php']
        //'vendor/lib' => ['php', 'json'] storage ext, extas ext
    ];
    protected bool $isNeedInstallLibsItems = true;
    protected string $testPath = __DIR__;

    public function testTranslate(): void
    {
        $this->assertEquals('ru', ELangs::Russian->code());
        $this->assertEquals('тест', ELangs::Russian->translate('test'));

        $ls = new LangService();

        $translated = $ls->translateFieldsTo(
            ELangs::Russian->value, 
            new class (['some' => 'test', 'some2' => 'test']) extends Item {
                protected function getSubjectForExtension(): string
                {
                    return '';
                }
            }, 
            ['some']
        );

        $this->assertEquals('тест', $translated['some']);
        $this->assertEquals('test', $translated['some2']);

        $translated = $ls->translateParamsTo(
            ELangs::Russian->value, 
            new class ([
                IHaveParams::FIELD__PARAMS => [
                    'some' => [
                        IParam::FIELD__NAME => 'some',
                        IParam::FIELD__TITLE => 'test',
                        IParam::FIELD__DESCRIPTION => 'test',
                        IParam::FIELD__VALUE => 'test'
                    ]
                ]
            ]) extends Item implements IHaveParams {
                use THasParams;
                protected function getSubjectForExtension(): string
                {
                    return '';
                }
            }, 
            doWithTitle: true,
            doWithDesc: true
        );

        $param = $translated->buildParams()->buildOne('some');

        $this->assertEquals('тест', $param->getTitle());
        $this->assertEquals('тест', $param->getDescription());
        $this->assertEquals('test', $param->getValue());

        $lang = $ls->getLangByName(ELangs::Russian->value);
        $this->assertEquals('Русский', $lang->getTitle());

        $phrase = new Phrase();
        $phrase->setLang(ELangs::Russian->value);
        $this->assertEquals(ELangs::Russian->value, $phrase->getLang());
        $this->assertEquals($phrase->buildLang()->getId(), $lang->getId());
    }
}
