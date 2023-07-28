<?php
namespace deflou\interfaces\langs\phrases;
use extas\interfaces\IItem;

interface IPhraseService extends IItem
{
    public const SUBJECT = 'deflou.lang.phrase.service';

    public function getPhraseByName(string $name, string $lang): ?IPhrase;
}
