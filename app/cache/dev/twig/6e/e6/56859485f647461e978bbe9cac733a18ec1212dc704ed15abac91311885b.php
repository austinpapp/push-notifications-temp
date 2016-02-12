<?php

/* MopaBootstrapBundle::base_css.html.twig */
class __TwigTemplate_6ee656859485f647461e978bbe9cac733a18ec1212dc704ed15abac91311885b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MopaBootstrapBundle::base.html.twig", "MopaBootstrapBundle::base_css.html.twig", 1);
        $this->blocks = array(
            'head_style' => array($this, 'block_head_style'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MopaBootstrapBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head_style($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle::base_css.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 4,  11 => 1,);
    }
}
