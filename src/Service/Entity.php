<?php

namespace Rinsvent\Data2DTODoctrineEntityBundle\Service;

use Rinsvent\Transformer\Transformer\Meta;

#[\Attribute]
class Entity extends Meta
{
    public const TYPE = 'service';

    public function __construct(
        public string $class,
        public array $tags = ['default'],
    ) {
        parent::__construct($tags);
    }
}
