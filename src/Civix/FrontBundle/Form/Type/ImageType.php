<?php
namespace Civix\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

/**
 * Image form type
 */
class ImageType extends AbstractType
{
    /**
     * Get unique name for form
     *
     * @return string
     */
    public function getName()
    {
        return 'image';
    }

    public function getParent()
    {
        return 'file';
    }
}
