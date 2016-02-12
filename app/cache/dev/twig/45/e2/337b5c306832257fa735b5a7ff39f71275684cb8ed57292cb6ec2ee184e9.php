<?php

/* CivixFrontBundle:Group/News:index.html.twig */
class __TwigTemplate_45e2337b5c306832257fa735b5a7ff39f71275684cb8ed57292cb6ec2ee184e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle:News:index.html.twig", "CivixFrontBundle:Group/News:index.html.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "CivixFrontBundle:News:index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/News:index.html.twig";
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
