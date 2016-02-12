<?php

/* CivixFrontBundle:Superuser:form.html.twig */
class __TwigTemplate_689629f086a760d4282b35f6bc35e2d577d78bda433abbd0d15531cb3014523d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:form.html.twig", 1);
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
        echo twig_escape_filter($this->env, (isset($context["form_title"]) ? $context["form_title"] : $this->getContext($context, "form_title")), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form class=\"form-horizontal\" action=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["form_link"]) ? $context["form_link"] : $this->getContext($context, "form_link")), "html", null, true);
        echo "\" method=\"POST\">
            ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            <div class=\"form-actions\">
                <input type=\"submit\" value=\"Submit\" class=\"btn btn-primary\">
                <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["back_link"]) ? $context["back_link"] : $this->getContext($context, "back_link")), "html", null, true);
        echo "\"
                <button class=\"btn\">Cancel</button>
                </a>
            </div>
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 12,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
