<?php

/* CivixFrontBundle:Superuser/email:representative_approved.html.twig */
class __TwigTemplate_a0fd13e1d9ad029d1aa36a4f45566257dde4a779c450c9d18d7e490de3179994 extends Twig_Template
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
        echo "<p>Representative Registration approved!</p>
<p>Representative name: ";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "</p>
<p>Representative username: ";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        echo "</p>
<p>Representative password: ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : $this->getContext($context, "password")), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser/email:representative_approved.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
