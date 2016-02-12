<?php

/* CivixFrontBundle:Representative/News:new.html.twig */
class __TwigTemplate_cf10b79a18663da9fe6ca384b14366acfce562989a525c3e2be0f214fc16e726 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle:News:new.html.twig", "CivixFrontBundle:Representative/News:new.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "CivixFrontBundle:News:new.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative/News:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  11 => 1,);
    }
}
