<?php

/* CivixFrontBundle:Default:index.html.twig */
class __TwigTemplate_4502637bf850a7597a78b880e1aa7e922474b959a9dbbe29383051a99f3269c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CivixFrontBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_page_title($context, array $blocks = array())
    {
        echo "Home";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  11 => 1,);
    }
}
