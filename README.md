![tests](https://github.com/jeyroik/df-langs/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/df-langs/coverage.svg?branch=master)

[![Latest Stable Version](https://poser.pugx.org/jeyroik/df-langs/v)](//packagist.org/packages/jeyroik/df-langs)
[![Total Downloads](https://poser.pugx.org/jeyroik/df-langs/downloads)](//packagist.org/packages/jeyroik/df-langs)
[![Dependents](https://poser.pugx.org/jeyroik/df-langs/dependents)](//packagist.org/packages/jeyroik/df-langs)



# df-langs

Langs support for DeFlou

# usage

extas.php
```json
{
    "languages": [
        {
            "name": "russian",
            "title": "Русский",
            "params": {
                "code": {
                    "name": "code",
                    "value": "ru"
                }
            }
        }
    ],

    "phrases": [
        {
            "name": "test",
            "lang": "russian",
            "value": "тест"
        }
    ]
}
```

Install languages and phrases: `$ extas i`

Phrase translate
```php
echo ELangs::Russian->translate('test'); // результат: тест
```

Also you can translate object fields and parameters title/description. See tests for details.