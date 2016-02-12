<?php

/* CivixFrontBundle:Default:menu.html.twig */
class __TwigTemplate_ff18b42664c8f4a5f5d283736cae5bfbde0c15e4240a4a4acfedafdee70806f6 extends Twig_Template
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
        // line 1
        $this->displayBlock('navbar', $context, $blocks);
    }

    public function block_navbar($context, array $blocks = array())
    {
        // line 2
        echo "
    <div>
        ";
        // line 4
        echo (($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasMenu", array(0 => "leftmenu"), "method")) ? ($this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "leftmenu"), "method"), array("currentClass" => "active", "ancestorClass" => "active", "allow_safe_labels" => "true"))) : (""));
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Default:menu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  26 => 2,  20 => 1,);
    }
}
