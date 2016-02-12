<?php

/* CivixFrontBundle:Discount:index.html.twig */
class __TwigTemplate_e7fa9e5035f75ba646123b1e1d96a5bf59ddc30ff3ff35b4ea53f123dc6b9e6b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Discount:index.html.twig", 1);
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
        // line 2
        $context["__internal_e805a248fa4d11c4ffca248557822abf4c65b4fbfe708cdd543803b47fb6457d"] = $this->loadTemplate("MopaBootstrapBundle::macros.html.twig", "CivixFrontBundle:Discount:index.html.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_page_title($context, array $blocks = array())
    {
        echo "Discounts Codes";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
<div class=\"row\">
    <div class=\"span12\">
        <table class=\"table table-bordered table-striped\">
            <tr>
                <th class=\"span3\">Coupon</th>
                <th>Created</th>
                <th>Percent off</th>
                <th>Amount off</th>
                <th>Currency</th>
                <th>Duration</th>
                <th>Redeem by</th>
                <th>Max redemptions</th>
                <th>Times redeemed</th>
                <th>Duration in months</th>
                <th>Valid</th>
            </tr>
            ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["coupon"]) {
            // line 25
            echo "                <tr>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "id", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["coupon"], "created", array())), "html", null, true);
            echo "</td>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "percent_off", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "amount_off", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "currency", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "duration", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["coupon"], "redeem_by", array())), "html", null, true);
            echo "</td>
                    <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "max_redemptions", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "times_redeemed", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["coupon"], "duration_in_months", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 36
            echo (($this->getAttribute($context["coupon"], "valid", array())) ? ("Yes") : ("No"));
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coupon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "        </table>
        <div class=\"form-actions\">
            ";
        // line 41
        if ((isset($context["after"]) ? $context["after"] : $this->getContext($context, "after"))) {
            // line 42
            echo "                <a class=\"btn\"
                    href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_discount_index", array("before" => (($this->getAttribute($this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : null), "data", array(), "any", false, true), 0, array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "data", array()), 0, array(), "array"), "id", array())) : ((isset($context["after"]) ? $context["after"] : $this->getContext($context, "after")))))), "html", null, true);
            echo "\">Prev</a>
            ";
        }
        // line 45
        echo "            ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "data", array())) == (isset($context["limit"]) ? $context["limit"] : $this->getContext($context, "limit")))) {
            // line 46
            echo "                <a class=\"btn\"
                   href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_discount_index", array("after" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["coupons"]) ? $context["coupons"] : $this->getContext($context, "coupons")), "data", array()), ((isset($context["limit"]) ? $context["limit"] : $this->getContext($context, "limit")) - 1), array(), "array"), "id", array()))), "html", null, true);
            echo "\">Next</a>
            ";
        }
        // line 49
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Discount:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 49,  136 => 47,  133 => 46,  130 => 45,  125 => 43,  122 => 42,  120 => 41,  116 => 39,  107 => 36,  103 => 35,  99 => 34,  95 => 33,  91 => 32,  87 => 31,  83 => 30,  79 => 29,  75 => 28,  71 => 27,  67 => 26,  64 => 25,  60 => 24,  41 => 7,  38 => 6,  32 => 4,  28 => 1,  26 => 2,  11 => 1,);
    }
}
