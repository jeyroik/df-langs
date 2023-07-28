<?php
namespace deflou\components\langs;

use deflou\interfaces\langs\ILang;

enum ELangs: string
{
    case Russian = 'russian';
    case English = 'english';

    public function translate(string $text): string
    {
        return (new LangService())->translateTextTo($this->value, $text);
    }

    public function code(): string
    {
        $ls = new LangService();
        $lang = $ls->getLangByName($this->value);

        return $lang ? $lang->buildParams()->buildOne(ILang::PARAM__CODE)->getValue() : $this->value;
    }
}
