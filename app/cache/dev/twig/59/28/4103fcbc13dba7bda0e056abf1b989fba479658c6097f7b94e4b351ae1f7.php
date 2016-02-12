<?php

/* MopaBootstrapBundle:Pagination:sortable_link.html.twig */
class __TwigTemplate_59284103fcbc13dba7bda0e056abf1b989fba479658c6097f7b94e4b351ae1f7 extends Twig_Template
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
        $context["link"] = "";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")));
        foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
            // line 3
            echo "    ";
            $context["link"] = ((((((isset($context["link"]) ? $context["link"] : $this->getContext($context, "link")) . " ") . $context["attr"]) . "=\"") . $context["value"]) . "\"");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attr'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "
<a ";
        // line 6
        echo (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link"));
        echo ">";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Pagination:sortable_link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 6,  32 => 5,  25 => 3,  21 => 2,  19 => 1,);
    }
}
