<?php
namespace Omeka\Api\Representation;

use Omeka\Api\Exception;
use Omeka\Api\Representation\AbstractResourceRepresentation;
use Omeka\Entity\EntityInterface;

/**
 * Abstract entity representation.
 *
 * Provides functionality for all entity representations.
 */
abstract class AbstractEntityRepresentation extends AbstractResourceRepresentation
{
    /**
     * {@inheritDoc}
     */
    protected function validateData($data)
    {
        if (!$data instanceof EntityInterface) {
            throw new Exception\InvalidArgumentException(
                $this->getTranslator()->translate(sprintf(
                    'Invalid data sent to %s.', get_called_class()
                ))
            );
        }
    }
}