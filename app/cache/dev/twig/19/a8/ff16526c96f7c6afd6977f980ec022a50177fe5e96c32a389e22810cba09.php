<?php

/* CivixFrontBundle:Group/News:details.html.twig */
class __TwigTemplate_19a8ff16526c96f7c6afd6977f980ec022a50177fe5e96c32a389e22810cba09 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle:News:details.html.twig", "CivixFrontBundle:Group/News:details.html.twig", 1);
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
        return "CivixFrontBundle:Group/News:details.html.twig";
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
