<?php

/* CivixFrontBundle:Group/Sections:edit.html.twig */
class __TwigTemplate_1f590006a8344f93cef744876e42fdb042b3408ef183fb1a9b8d1fad8429b235 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/Sections:edit.html.twig", 1);
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
        echo "Edit group section";
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
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_sections_edit", array("id" => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id", array()))), "html", null, true);
        echo "\" method=\"POST\">
                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
                <div class=\"form-actions\">
                    <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\">
                    <a class=\"btn\" href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("civix_front_group_sections_index");
        echo "\">Cancel</a>
                    <div style=\"float: right\">
                        <a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_sections_delete", array("id" => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
        echo "\" class=\"btn btn-danger\">Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/Sections:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 18,  59 => 16,  53 => 13,  49 => 12,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
