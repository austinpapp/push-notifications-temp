<?php

/* CivixCoreBundle:Email:transaction-info.html.twig */
class __TwigTemplate_b771a7a66e5dbba363251cd5c5a7bae9014c3e0d621989dcf2fe60261e5393d6 extends Twig_Template
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
        echo "<p>";
        echo twig_escape_filter($this->env, (isset($context["description"]) ? $context["description"] : $this->getContext($context, "description")), "html", null, true);
        echo "</p>

<p>
    ----------------------------------------------------------- <br>
    Transaction Number: ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : $this->getContext($context, "history")), "getPublicId", array(), "method"), "html", null, true);
        echo " <br>
    Date: ";
        // line 7
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "created_at", array()), "D, d M y H:i:s O"), "html", null, true);
        echo "<br>
    Amount: \$";
        // line 8
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amount", array()) / 100), "html", null, true);
        echo " <br>
    -----------------------------------------------------------  <br>
</p>";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:transaction-info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  33 => 7,  29 => 6,  21 => 2,  19 => 1,);
    }
}
