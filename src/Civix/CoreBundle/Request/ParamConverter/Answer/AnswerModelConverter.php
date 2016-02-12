<?php

namespace Civix\CoreBundle\Request\ParamConverter\Answer;

use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManager;
use Civix\CoreBundle\Model\Answer\AnswerModelFactory;
use Civix\CoreBundle\Model\Answer\AnswerModelInterface;

class AnswerModelConverter implements ParamConverterInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports(ConfigurationInterface $configuration)
    {
        if (!$configuration->getName()) {
            return false;
        }
        
        if (!($options = $configuration->getOptions())) {
            return false;
        }
        
        if (!isset($options['entityId']) || !isset($options['typeEntity'])) {
            return false;
        }
        
        if (!$configuration->getClass()) {
            return false;
        }
 
        return $configuration->getClass() === 'Civix\CoreBundle\Model\Answer\AnswerModelInterface';
    }

    public function apply(Request $request, ConfigurationInterface $configuration)
    {
        $options = $configuration->getOptions($configuration);
        $typeEntity = $request->attributes->get($options['typeEntity']);
        $entityId = $request->attributes->get($options['entityId']);

        $answerModel = AnswerModelFactory::createByType($typeEntity);
        if (!($answerModel instanceof AnswerModelInterface)) {
            throw new NotFoundHttpException('Not found');
        }

        $entityForAnswer = $this->entityManager
            ->getRepository($answerModel->getPollClass())
            ->findOneById($entityId);
        
        if (!$entityForAnswer) {
            throw new NotFoundHttpException('Not found');
        }
        
        $answerModel->setPollEntity($entityForAnswer);

        $request->attributes->set($configuration->getName(), $answerModel);
    }
}
