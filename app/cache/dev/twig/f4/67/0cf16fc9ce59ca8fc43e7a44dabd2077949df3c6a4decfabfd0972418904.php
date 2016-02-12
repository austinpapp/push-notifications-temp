<?php

/* CivixFrontBundle:Group/email:user_group_registered.html.twig */
class __TwigTemplate_f4670cf16fc9ce59ca8fc43e7a44dabd2077949df3c6a4decfabfd0972418904 extends Twig_Template
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
        return "CivixFrontBundle:Group/email:user_group_registered.html.twig";
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
