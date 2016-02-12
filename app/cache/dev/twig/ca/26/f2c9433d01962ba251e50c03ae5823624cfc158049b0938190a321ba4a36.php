<?php

/* CivixFrontBundle:Superuser:assignLocalGroups.html.twig */
class __TwigTemplate_ca26f2c9433d01962ba251e50c03ae5823624cfc158049b0938190a321ba4a36 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:assignLocalGroups.html.twig", 1);
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
        echo "Local Groups - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "officialName", array()), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form class=\"form-horizontal\" action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_local_groups_assign_save", array("group" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id", array()))), "html", null, true);
        echo "\" method=\"POST\">
            <fieldset>
                <legend>Representatives in local group \"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "officialName", array()), "html", null, true);
        echo "\"</legend>
                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["localGroupForm"]) ? $context["localGroupForm"] : $this->getContext($context, "localGroupForm")), 'errors');
        echo "
                ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["localGroupForm"]) ? $context["localGroupForm"] : $this->getContext($context, "localGroupForm")), "localRepresentatives", array()), 'row');
        echo "
                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["localGroupForm"]) ? $context["localGroupForm"] : $this->getContext($context, "localGroupForm")), 'rest');
        echo "                
                <div class=\"form-actions\">
                    <input type=\"submit\" class=\"btn btn-primary bt\" value=\"Save\" />
                </div>
            </fieldset>
        </form>
        
        
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:assignLocalGroups.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 13,  56 => 12,  52 => 11,  48 => 10,  43 => 8,  39 => 6,  36 => 5,  29 => 3,  11 => 1,);
    }
}
