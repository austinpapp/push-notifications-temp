<?php

/* CivixCoreBundle:Email:payment_request_charged.html.twig */
class __TwigTemplate_3cc0fd82aec5b4721d7f1e4a71a5d1f416e1fdf00b6c3189d8a2fdb112db2dcf extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "firstName", array()), "html", null, true);
        echo ",

<p>
You've made a \$";
        // line 4
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amount", array()) / 100), "html", null, true);
        echo " payment to ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "getUser", array(), "method"), "getOfficialName", array(), "method"), "html", null, true);
        echo ".
This charge will appear on your credit card statement as ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "appears_on_statement_as", array()), "html", null, true);
        echo ".
Please contact your community leadership if you have any questions or concerns regarding this information.
</p>

<p>Thank You!</p>

<p>
----------------------------------------------------------- <br>
";
        // line 13
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "getUser", array(), "method"), "getType", array(), "method")), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "getUser", array(), "method"), "getOfficialName", array(), "method"), "html", null, true);
        echo " <br>
Campaign: ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "getTitle", array(), "method"), "html", null, true);
        echo " <br>
Order Number: ";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["order_number"]) ? $context["order_number"] : $this->getContext($context, "order_number")), "html", null, true);
        echo " <br>
Transaction Number: ";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["transaction_number"]) ? $context["transaction_number"] : $this->getContext($context, "transaction_number")), "html", null, true);
        echo " <br>
Date: ";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "created_at", array()), "D, d M y H:i:s O"), "html", null, true);
        echo "<br>
Amount: \$";
        // line 18
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amount", array()) / 100), "html", null, true);
        echo " <br>
-----------------------------------------------------------  <br>
</p>";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:payment_request_charged.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 18,  60 => 17,  56 => 16,  52 => 15,  48 => 14,  42 => 13,  31 => 5,  25 => 4,  19 => 1,);
    }
}
