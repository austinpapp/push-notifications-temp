<?php

/* CivixFrontBundle:Discount:edit.html.twig */
class __TwigTemplate_fd4329d9713aae48a61221b7d9f2b970c7ca003bcffff737b794e0ef40d2babf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Discount:edit.html.twig", 1);
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
        echo "Edit code";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form action=\"\" method=\"POST\" enctype=\"multipart/form-data\">
            <legend>Edit code</legend>
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
            <div class=\"form-actions\">
                <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\">
                <a class=\"btn\" href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("civix_front_superuser_discount_index");
        echo "\">Cancel</a>
            </div>

        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Discount:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 13,  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
