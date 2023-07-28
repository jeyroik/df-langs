<?php
namespace deflou\interfaces\langs;
use extas\interfaces\IItem;
use extas\interfaces\parameters\IHaveParams;

interface ILangService extends IItem
{
    public const SUBJECT = 'deflou.subject';

    public function getLangByName(string $name): ?ILang;

    public function translateTextTo(string $langName, string $text): string;
    public function translateFieldsTo(string $langName, IItem $item, array $fields): IItem;
    public function translateParamsTo(string $langName, IHaveParams $subject, bool $doWithTitle, bool $doWithDesc): IHaveParams;
}
