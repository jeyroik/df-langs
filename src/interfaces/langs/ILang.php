<?php
namespace deflou\interfaces\langs;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;
use extas\interfaces\parameters\IHaveParams;

interface ILang extends IItem, IHasName,  IHasDescription, IHaveUUID, IHaveParams
{
    public const SUBJECT = 'deflou.lang';

    public const PARAM__CODE = 'code';
}
