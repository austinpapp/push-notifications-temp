<?php

/* CivixCoreBundle:Email:payment_request.html.twig */
class __TwigTemplate_f5985c45e528fea842eb2aed3e7467d8ba4509171024955053bbfd6825db9498 extends Twig_Template
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
        echo "<p>
    ";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "getSubject", array(), "method"), "html", null, true);
        echo "
</p>

<a href=\"https://";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : $this->getContext($context, "domain")), "html", null, true);
        echo "/payment-request/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "getId", array(), "method"), "html", null, true);
        echo "\">See More</a>
";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:payment_request.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 5,  22 => 2,  19 => 1,);
    }
}
