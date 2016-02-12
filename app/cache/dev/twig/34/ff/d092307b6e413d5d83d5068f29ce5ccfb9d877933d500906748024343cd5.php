<?php

/* CivixFrontBundle:Representative/News:details.html.twig */
class __TwigTemplate_34ffd092307b6e413d5d83d5068f29ce5ccfb9d877933d500906748024343cd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle:News:details.html.twig", "CivixFrontBundle:Representative/News:details.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "CivixFrontBundle:News:details.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative/News:details.html.twig";
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
