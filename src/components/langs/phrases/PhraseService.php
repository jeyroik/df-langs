<?php
namespace deflou\components\langs\phrases;

use deflou\interfaces\langs\phrases\IPhrase;
use deflou\interfaces\langs\phrases\IPhraseService;
use extas\components\Item;
use extas\interfaces\repositories\IRepository;

/**
 * @method IRepository phrases()
 */
class PhraseService extends Item implements IPhraseService
{
    protected static array $phraseCache = [];

    public function getPhraseByName(string $name, string $lang): ?IPhrase
    {
        if (!isset(self::$phraseCache[$name.$lang])) {
            self::$phraseCache[$name.$lang] = $this->phrases()->one([
                IPhrase::FIELD__NAME => $name,
                IPhrase::FIELD__LANG => $lang
            ]);
        }

        return self::$phraseCache[$name.$lang];
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
