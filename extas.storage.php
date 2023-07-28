<?php

use extas\components\repositories\RepoItem;

return [
    "name" => "jeyroik/df-triggers",
    "tables" => [
        "languages" => [
            "namespace" => "deflou\\repositories",
            "item_class" => "deflou\\components\\langs\\Lang",
            "pk" => "id",
            "aliases" => ["langs"],
            "code" => [
                'create-before' => '\\' . RepoItem::class . '::setId($item);'
                                  .'\\' . RepoItem::class . '::throwIfExist($this, $item, [\'name\']);'
            ]
        ],
        "phrases" => [
            "namespace" => "deflou\\repositories",
            "item_class" => "deflou\\components\\langs\\phrases\\Phrase",
            "pk" => "id",
            "aliases" => [],
            "hooks" => [],
            "code" => [
                'create-before' => '\\' . RepoItem::class . '::setId($item);'
                                  .'\\' . RepoItem::class . '::throwIfExist($this, $item, [\'name\']);'
            ]
        ]
    ]
];
