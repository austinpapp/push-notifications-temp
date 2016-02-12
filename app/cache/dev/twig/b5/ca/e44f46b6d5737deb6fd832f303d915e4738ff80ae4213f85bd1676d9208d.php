<?php

/* CivixFrontBundle:Group/Sections:new.html.twig */
class __TwigTemplate_b5cae44f46b6d5737deb6fd832f303d915e4738ff80ae4213f85bd1676d9208d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/Sections:new.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CivixFrontBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_page_title($context, array $blocks = array())
    {
        echo "Create new group section";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("groupMemberMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
            <form class=\"form-horizontal\" action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("civix_front_group_sections_new");
        echo "\" method=\"POST\">
                ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
                <div class=\"form-actions\">
                    <input type=\"submit\" value=\"Create\" class=\"btn btn-primary\">
                    <a class=\"btn\" href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("civix_front_group_sections_index");
        echo "\">Cancel</a>
                </div>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/Sections:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 15,  52 => 12,  48 => 11,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
