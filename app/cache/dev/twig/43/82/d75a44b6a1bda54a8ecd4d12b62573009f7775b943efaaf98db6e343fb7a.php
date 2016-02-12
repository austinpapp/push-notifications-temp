<?php

/* MopaBootstrapBundle:Navbar:subnavbar.html.twig */
class __TwigTemplate_4382d75a44b6a1bda54a8ecd4d12b62573009f7775b943efaaf98db6e343fb7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navbar' => array($this, 'block_navbar'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('navbar', $context, $blocks);
    }

    public function block_navbar($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"subnav ";
        echo ((($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasOption", array(0 => "fixedTop"), "method") && $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "fixedTop"), "method"))) ? ("subnavbar-fixed-top") : (""));
        echo "\">
    ";
        // line 4
        echo (($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "menu"), "method")) ? ($this->env->getExtension('knp_menu')->render($this->getAttribute(        // line 5
(isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "menu"), "method"), array("currentClass" => "active", "ancestorClass" => "active", "allow_safe_labels" => true))) : (""));
        // line 8
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Navbar:subnavbar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  32 => 5,  31 => 4,  26 => 3,  20 => 2,);
    }
}
