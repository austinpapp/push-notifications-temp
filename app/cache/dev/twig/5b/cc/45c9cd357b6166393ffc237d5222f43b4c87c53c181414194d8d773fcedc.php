<?php

/* CivixFrontBundle:PaymentSettings:index.html.twig */
class __TwigTemplate_5bcc45c9cd357b6166393ffc237d5222f43b4c87c53c181414194d8d773fcedc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:PaymentSettings:index.html.twig", 1);
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
        echo "Payment Information";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
<div>
    <h3>Bank Account Information</h3>
    <table class=\"table\">
        ";
        // line 10
        if ((isset($context["bankAccounts"]) ? $context["bankAccounts"] : $this->getContext($context, "bankAccounts"))) {
            // line 11
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["bankAccounts"]) ? $context["bankAccounts"] : $this->getContext($context, "bankAccounts")));
            foreach ($context['_seq'] as $context["_key"] => $context["bankAccount"]) {
                // line 12
                echo "                <tr>
                    <td>";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($context["bankAccount"], "bank_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["bankAccount"], "last4", array()), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bankAccount'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "        ";
        }
        // line 17
        echo "        <tr>
            <td><a class=\"btn btn-primary\" data-open-account-from>";
        // line 18
        echo ((twig_length_filter($this->env, (isset($context["bankAccounts"]) ? $context["bankAccounts"] : $this->getContext($context, "bankAccounts")))) ? ("Change") : ("Add"));
        echo "</a></td>
        </tr>
    </table>
    <br><br><br>
    <h3>Card Information</h3>
    <table class=\"table\">
        ";
        // line 24
        if ((isset($context["cards"]) ? $context["cards"] : $this->getContext($context, "cards"))) {
            // line 25
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cards"]) ? $context["cards"] : $this->getContext($context, "cards")));
            foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
                // line 26
                echo "                <tr>
                    <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($context["card"], "brand", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["card"], "last4", array()), "html", null, true);
                echo "</td>
                    <td>
                        <a class=\"btn btn-danger btn-small\" data-remove-card=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["card"], "id", array()), "html", null, true);
                echo "\">Remove</a>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['card'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "        ";
        }
        // line 34
        echo "        <tr>
            <td colspan=\"2\"><a class=\"btn btn-primary\" data-open-card-from>";
        // line 35
        echo ((twig_length_filter($this->env, (isset($context["cards"]) ? $context["cards"] : $this->getContext($context, "cards")))) ? ("Change") : ("Add"));
        echo "</a></td>
        </tr>
    </table>
</div>

    ";
        // line 40
        echo twig_include($this->env, $context, "CivixFrontBundle:PaymentSettings:stripe.html.twig");
        echo "

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentSettings:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 40,  113 => 35,  110 => 34,  107 => 33,  97 => 29,  90 => 27,  87 => 26,  82 => 25,  80 => 24,  71 => 18,  68 => 17,  65 => 16,  54 => 13,  51 => 12,  46 => 11,  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
