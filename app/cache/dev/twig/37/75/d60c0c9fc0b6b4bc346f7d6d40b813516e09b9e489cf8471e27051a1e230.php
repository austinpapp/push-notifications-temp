<?php

/* CivixFrontBundle:Superuser:limitQuestionEdit.html.twig */
class __TwigTemplate_3775d60c0c9fc0b6b4bc346f7d6d40b813516e09b9e489cf8471e27051a1e230 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:limitQuestionEdit.html.twig", 1);
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
        echo "Edit limit of question";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form class=\"form-horizontal\" action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["updatePath"]) ? $context["updatePath"] : $this->getContext($context, "updatePath")), array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "id"), "method"))), "html", null, true);
        echo "\" method=\"POST\">
            <fieldset>
                <legend>Edit limit of question</legend>
                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["questionLimitForm"]) ? $context["questionLimitForm"] : $this->getContext($context, "questionLimitForm")), 'errors');
        echo "
                ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["questionLimitForm"]) ? $context["questionLimitForm"] : $this->getContext($context, "questionLimitForm")), "questionLimit", array()), 'row');
        echo "
                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["questionLimitForm"]) ? $context["questionLimitForm"] : $this->getContext($context, "questionLimitForm")), 'rest');
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
        return "CivixFrontBundle:Superuser:limitQuestionEdit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 13,  52 => 12,  48 => 11,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
