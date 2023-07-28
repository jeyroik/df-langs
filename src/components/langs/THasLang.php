<?php
namespace deflou\components\langs;

use deflou\interfaces\langs\IHaveLang;
use deflou\interfaces\langs\ILang;

/**
 * @property array $config
 */
trait THasLang
{
    public function getLang(): string
    {
        return $this->config[IHaveLang::FIELD__LANG] ?? '';
    }

    public function buildLang(): ILang
    {
        return (new LangService())->getLangByName($this->getLang());
    }

    public function setLang(string $lang): static
    {
        $this->config[IHaveLang::FIELD__LANG] = $lang;

        return $this;
    }
}
