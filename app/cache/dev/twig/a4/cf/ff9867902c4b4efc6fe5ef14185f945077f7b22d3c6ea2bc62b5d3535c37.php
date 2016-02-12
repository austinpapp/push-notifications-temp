<?php

/* CivixCoreBundle:Email:payment_request_payout.html.twig */
class __TwigTemplate_a4cfff9867902c4b4efc6fe5ef14185f945077f7b22d3c6ea2bc62b5d3535c37 extends Twig_Template
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
        echo "
<table>
    <tr>
        <td><strong>Payment Request:</strong></td>
        <td>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "getTitle", array(), "method"), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td><strong>Payout amount:</strong></td>
        <td>\$";
        // line 10
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (((isset($context["marketplaceAmount"]) ? $context["marketplaceAmount"] : $this->getContext($context, "marketplaceAmount")) + (isset($context["customerAmount"]) ? $context["customerAmount"] : $this->getContext($context, "customerAmount"))) / 100), 2, ".", ","), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td><strong>Fees:</strong></td>
        <td>\$";
        // line 14
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((isset($context["marketplaceAmount"]) ? $context["marketplaceAmount"] : $this->getContext($context, "marketplaceAmount")) / 100), 2, ".", ","), "html", null, true);
        echo "</td>
    </tr>
</table>

<p>
    ----------------------------------------------------------- <br>
    Transaction Number: ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : $this->getContext($context, "history")), "getPublicId", array(), "method"), "html", null, true);
        echo " <br>
    Date: ";
        // line 21
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "created_at", array()), "D, d M y H:i:s O"), "html", null, true);
        echo "<br>
    Amount: \$";
        // line 22
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "amount", array()) / 100), "html", null, true);
        echo " <br>
    -----------------------------------------------------------  <br>
</p>
";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:payment_request_payout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 22,  54 => 21,  50 => 20,  41 => 14,  34 => 10,  27 => 6,  21 => 2,  19 => 1,);
    }
}
