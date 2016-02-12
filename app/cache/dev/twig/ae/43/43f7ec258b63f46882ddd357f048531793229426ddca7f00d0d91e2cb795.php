<?php

/* CivixFrontBundle::submenu.html.twig */
class __TwigTemplate_ae4343f7ec258b63f46882ddd357f048531793229426ddca7f00d0d91e2cb795 extends Twig_Template
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
        echo "    ";
        echo ((($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasMenu", array(0 => "options"), "method") && $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "options"), "method"))) ? ($this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "options"), "method"))) : (""));
        echo "

    ";
        // line 5
        echo (($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "menu"), "method")) ? ($this->env->getExtension('knp_menu')->render($this->getAttribute(        // line 6
(isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "menu"), "method"), array("currentClass" => "active", "ancestorClass" => "active", "allow_safe_labels" => true))) : (""));
        // line 9
        echo "
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle::submenu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  35 => 9,  33 => 6,  32 => 5,  26 => 3,  20 => 2,);
    }
}
