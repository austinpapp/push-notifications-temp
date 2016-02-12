<?php

/* CivixCoreBundle:Email:payment_request_publishing_charged.html.twig */
class __TwigTemplate_2781999c4ca8b923fe4385debfa031a054e13133dac5a61ab453f78a86a194af extends Twig_Template
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
        $context["data"] = $this->getAttribute((isset($context["history"]) ? $context["history"] : $this->getContext($context, "history")), "getDataAsArray", array(), "method");
        // line 2
        echo "<p>
    ----------------------------------------------------------- <br>
    Transaction Number: ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : $this->getContext($context, "history")), "getPublicId", array(), "method"), "html", null, true);
        echo " <br>
    Date: ";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "created_at", array()), "D, d M y H:i:s O"), "html", null, true);
        echo "<br>
    Amount: \$";
        // line 6
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amount", array()) / 100), "html", null, true);
        echo " <br>
    -----------------------------------------------------------  <br>
</p>";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:payment_request_publishing_charged.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 6,  29 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
