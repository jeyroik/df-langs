<?php
namespace deflou\components\langs;

use deflou\interfaces\langs\ILang;
use extas\components\Item;
use extas\components\parameters\THasParams;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\components\THasStringId;

class Lang extends Item implements ILang
{
    use THasStringId;
    use THasName;
    use THasDescription;
    use THasParams;
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
