<?php

/* MopaBootstrapBundle:Pagination:sliding_item.html.twig */
class __TwigTemplate_f07a90de0e56b8c90c28731c09556f9d73bc1c54942920beb09dd36e6223871b extends Twig_Template
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
        echo "<li class=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("name", $context)) ? ((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))) : ("")), "html", null, true);
        echo " ";
        echo ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")))) ? ("active") : (""));
        echo " ";
        echo (((array_key_exists("clickable", $context) &&  !(isset($context["clickable"]) ? $context["clickable"] : $this->getContext($context, "clickable")))) ? ("disabled") : (""));
        echo "\">
    ";
        // line 2
        if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) != (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current"))) && ( !array_key_exists("clickable", $context) || (isset($context["clickable"]) ? $context["clickable"] : $this->getContext($context, "clickable"))))) {
            // line 3
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page"))))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? ((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text"))) : ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "</a>
    ";
        } else {
            // line 5
            echo "        <span>";
            echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? ((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text"))) : ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "</span>
    ";
        }
        // line 7
        echo "</li>";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Pagination:sliding_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 7,  38 => 5,  30 => 3,  28 => 2,  19 => 1,);
    }
}
