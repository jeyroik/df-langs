<?php
namespace deflou\interfaces\langs;

use deflou\components\langs\ELangs;

interface IHaveLang
{
    public const FIELD__LANG = 'lang';

    public function getLang(): string;
    public function buildLang(): ILang;

    public function setLang(string $lang): static;
}
