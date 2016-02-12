<?php

/* MopaBootstrapBundle:Menu:menu.html.twig */
class __TwigTemplate_f4729891be6515912edcc4d9ad71fbd3da995b56c4bd3dee3fad76893aed6cee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", "MopaBootstrapBundle:Menu:menu.html.twig", 1);
        $this->blocks = array(
            'linkElement' => array($this, 'block_linkElement'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_linkElement($context, array $blocks = array())
    {
        // line 4
        $context["macros"] = $this->loadTemplate("knp_menu.html.twig", "MopaBootstrapBundle:Menu:menu.html.twig", 4);
        // line 5
        $context["__internal_cad2287001ccb466d4d621e0da9e982712b4d9b959b164048271a6dda484bbe2"] = $this->loadTemplate("MopaBootstrapBundle::icons.html.twig", "MopaBootstrapBundle:Menu:menu.html.twig", 5);
        // line 6
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "uri", array()), "html", null, true);
        echo "\"";
        echo $context["macros"]->getattributes($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "linkAttributes", array()));
        echo ">";
        if ((($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "extras", array(), "any", false, true), "icon", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "extras", array(), "any", false, true), "icon", array()), false)) : (false))) {
            echo $context["__internal_cad2287001ccb466d4d621e0da9e982712b4d9b959b164048271a6dda484bbe2"]->geticon($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "extras", array()), "icon", array()), (($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "extras", array(), "any", false, true), "icon_white", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "extras", array(), "any", false, true), "icon_white", array()), false)) : (false)));
        }
        $this->displayBlock("label", $context, $blocks);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Menu:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 6,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
