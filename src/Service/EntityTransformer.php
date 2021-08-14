<?php

namespace Rinsvent\Data2DTODoctrineEntityBundle\Service\Transformer;

use Doctrine\ORM\EntityManagerInterface;
use Rinsvent\Data2DTO\Transformer\Meta;
use Rinsvent\Data2DTOBundle\Service\AbstractTransformer;

class EntityTransformer extends AbstractTransformer
{
    public function __construct(
        protected EntityManagerInterface $em
    ) {}

    /**
     * @param $data
     * @param Entity $meta
     */
    public function transform(&$data, Meta $meta): void
    {
        if ($meta->primaryType === 'id' && !is_int($data)) {
            return;
        }
        if ($meta->primaryType === 'uuid' && !is_string($data)) {
            return;
        }
        $repository = $this->em->getRepository($meta->class);
        $data = $repository->find($data);
    }
}
