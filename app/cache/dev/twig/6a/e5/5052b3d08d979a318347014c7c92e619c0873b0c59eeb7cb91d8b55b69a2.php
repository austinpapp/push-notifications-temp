<?php

/* CivixFrontBundle:Representative:notification.html.twig */
class __TwigTemplate_6ae55052b3d08d979a318347014c7c92e619c0873b0c59eeb7cb91d8b55b69a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "New representative with official title \"";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "\" has been registred.
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative:notification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
