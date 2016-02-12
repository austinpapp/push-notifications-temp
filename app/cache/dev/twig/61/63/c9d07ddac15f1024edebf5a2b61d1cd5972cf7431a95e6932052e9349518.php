<?php

/* CivixFrontBundle::group-sections.html.twig */
class __TwigTemplate_6163c9d07ddac15f1024edebf5a2b61d1cd5972cf7431a95e6932052e9349518 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<hr/>
<div class=\"row\">
    <div class=\"span11\"><h5>Group Sections</h5></div>
</div>
";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "groupSections", array()), 'row');
        echo "
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle::group-sections.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 1,);
    }
}
