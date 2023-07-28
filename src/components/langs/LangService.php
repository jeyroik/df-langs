<?php
namespace deflou\components\langs;

use deflou\components\langs\phrases\PhraseService;
use deflou\interfaces\langs\ILang;
use deflou\interfaces\langs\ILangService;
use extas\components\Item;
use extas\interfaces\IHasDescription;
use extas\interfaces\IItem;
use extas\interfaces\parameters\IHaveParams;
use extas\interfaces\repositories\IRepository;

/**
 * @method IRepository languages()
 */
class LangService extends Item implements ILangService
{
    protected static array $langCache = [];

    public function getLangByName(string $name): ?ILang
    {
        if (!isset(self::$langCache[$name])) {       
            self::$langCache[$name] = $this->languages()->one([
                ILang::FIELD__NAME => $name
            ]);
        }

        return self::$langCache[$name];
    }

    public function translateTextTo(string $langName, string $text): string
    {
        $phrase = (new PhraseService())->getPhraseByName($text, $langName);

        return $phrase ? $phrase->getValue() : $text;
    }

    public function translateFieldsTo(string $langName, IItem $item, array $fields): IItem
    {
        $local = clone $item;

        foreach ($fields as $field) {
            if (!isset($local[$field])) {
                continue;
            }

            $local[$field] = $this->translateTextTo($langName, $local[$field]);
        }

        return $local;
    }

    public function translateParamsTo(string $langName, IHaveParams $subject, bool $doWithTitle, bool $doWithDesc): IHaveParams
    {
        $local = clone $subject;

        $params = $local->getParams();
        foreach ($params as $name => $param) {
            if ($doWithTitle) {
                $params[$name][IHasDescription::FIELD__TITLE] = $this->translateTextTo(
                    $langName, 
                    $params[$name][IHasDescription::FIELD__TITLE]
                );
            }

            if ($doWithDesc) {
                $params[$name][IHasDescription::FIELD__DESCRIPTION] = $this->translateTextTo(
                    $langName, 
                    $params[$name][IHasDescription::FIELD__DESCRIPTION]
                );
            }
        }
        $local->setParams($params);

        return $local;
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
