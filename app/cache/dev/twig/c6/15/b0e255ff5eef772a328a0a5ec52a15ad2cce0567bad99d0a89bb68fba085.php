<?php

/* CivixFrontBundle:PaymentRequest:crowdfunding-fields.html.twig */
class __TwigTemplate_c615b0e255ff5eef772a328a0a5ec52a15ad2cce0567bad99d0a89bb68fba085 extends Twig_Template
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isCrowdfunding", array()), 'row');
        echo "
<div id=\"crowdfunding-options\" style=\"display: none\">
    ";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "crowdfundingGoalAmount", array()), 'row');
        echo "
    ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "crowdfundingDeadline", array()), 'row');
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentRequest:crowdfunding-fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 4,  24 => 3,  19 => 1,);
    }
}
