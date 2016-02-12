<?php

/* CivixFrontBundle:Group/email:group_registered.html.twig */
class __TwigTemplate_531c71fd7997fc6649358724b1d37cb103ef994e49f9258efc507c2a2b654191 extends Twig_Template
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
        echo "<p>Group name: ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "</p>
<p>Group username: ";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        echo "</p>
<p>Group password: ";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : $this->getContext($context, "password")), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/email:group_registered.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  24 => 2,  19 => 1,);
    }
}
