<?php

/* NelmioApiDocBundle:Components:version.html.twig */
class __TwigTemplate_0c82479c7e834ba059f229680bc262d665267bc649dad416c66794d8587d0b78 extends Twig_Template
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
        if ((twig_test_empty((isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion"))) && twig_test_empty((isset($context["untilVersion"]) ? $context["untilVersion"] : $this->getContext($context, "untilVersion"))))) {
            // line 2
            echo "*
";
        } else {
            // line 4
            echo "    ";
            if ( !twig_test_empty((isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion")))) {
                echo "&gt;=";
                echo twig_escape_filter($this->env, (isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion")), "html", null, true);
            }
            // line 5
            echo "    ";
            if ( !twig_test_empty((isset($context["untilVersion"]) ? $context["untilVersion"] : $this->getContext($context, "untilVersion")))) {
                // line 6
                echo "        ";
                if ( !twig_test_empty((isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion")))) {
                    echo ",";
                }
                echo "&lt;=";
                echo twig_escape_filter($this->env, (isset($context["untilVersion"]) ? $context["untilVersion"] : $this->getContext($context, "untilVersion")), "html", null, true);
                echo "
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle:Components:version.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 6,  31 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
