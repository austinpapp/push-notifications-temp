<?php

/* CivixFrontBundle:Group/News:edit.html.twig */
class __TwigTemplate_a237c6f95f9cd34870791c14dba675744dbbab6703b1ea2a0e18699bd2aa9d22 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle:News:edit.html.twig", "CivixFrontBundle:Group/News:edit.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "CivixFrontBundle:News:edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/News:edit.html.twig";
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
