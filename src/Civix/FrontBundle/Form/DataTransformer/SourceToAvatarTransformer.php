<?php
namespace Civix\FrontBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class SourceToAvatarTransformer implements DataTransformerInterface
{
    /**
     * Transforms first array item to source.
     *
     * @param mixed $avatar
     *
     * @return array
     */
    public function transform($avatar)
    {
        return array('source' => $avatar);
    }

    /**
     * Transforms source to first array item.
     *
     * @param array $source
     *
     * @return mixed
     */
    public function reverseTransform($source)
    {
        return $source['source'];
    }
}
