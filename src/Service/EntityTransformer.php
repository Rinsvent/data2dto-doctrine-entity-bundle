<?php

namespace Rinsvent\Data2DTODoctrineEntityBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Rinsvent\Transformer\Transformer\Meta;
use Rinsvent\TransformerBundle\Service\AbstractTransformer;

class EntityTransformer extends AbstractTransformer
{
    public function __construct(
        protected EntityManagerInterface $em
    ) {
    }

    /**
     * @param $data
     * @param Entity $meta
     */
    public function transform(mixed $data, Meta $meta): mixed
    {
        $repository = $this->em->getRepository($meta->class);
        try {
            return $repository->find($data);
        } catch (\Throwable) {
            return $data;
        }
    }
}
