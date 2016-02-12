<?php

/* CivixCoreBundle:Email:subscription_charged.html.twig */
class __TwigTemplate_f7d753f4ca33c14bd558fd657826a16ac809d3dda874c311de79616712bc6c4d extends Twig_Template
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
    Account: ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getOfficialName", array(), "method"), "html", null, true);
        echo "<br>
    Package: ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "label", array()), "html", null, true);
        echo "<br>
    Expired at: ";
        // line 6
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "expiredAt", array()), "D, d M y H:i:s O"), "html", null, true);
        echo "<br>
    Transaction Number: ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : $this->getContext($context, "history")), "getPublicId", array(), "method"), "html", null, true);
        echo " <br>
    Date: ";
        // line 8
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "created_at", array()), "D, d M y H:i:s O"), "html", null, true);
        echo "<br>
    Amount: \$";
        // line 9
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amount", array()) / 100), "html", null, true);
        echo " <br>
    -----------------------------------------------------------  <br>
</p>";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:subscription_charged.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 9,  41 => 8,  37 => 7,  33 => 6,  29 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
