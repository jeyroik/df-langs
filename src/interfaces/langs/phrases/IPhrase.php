<?php
namespace deflou\interfaces\langs\phrases;

use deflou\interfaces\langs\IHaveLang;
use extas\interfaces\IHasName;
use extas\interfaces\IHasValue;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;

interface IPhrase extends IItem, IHaveUUID, IHasName, IHasValue, IHaveLang
{
    public const SUBJECT = 'deflou.lang.phrase';
}
