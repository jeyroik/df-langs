<?php
namespace deflou\components\langs\phrases;

use deflou\components\langs\THasLang;
use deflou\interfaces\langs\phrases\IPhrase;
use extas\components\Item;
use extas\components\THasName;
use extas\components\THasStringId;
use extas\components\THasValue;

class Phrase extends Item implements IPhrase
{
    use THasStringId;
    use THasName;
    use THasValue;
    use THasLang;
    
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
