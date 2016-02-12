<?php

/* CivixFrontBundle:PaymentSettings:createCard.html.twig */
class __TwigTemplate_f5c202b7fbe7abe2983d99e641d9cdd23371b7dcefd73dafb071c056bfd05ae2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:PaymentSettings:createCard.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
            'foot_script' => array($this, 'block_foot_script'),
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
        echo "<div>
    <div class=\"alert alert-error hide\"></div>
    <form class=\"form-horizontal\" id=\"card-form\"></form>
</div>
";
    }

    // line 12
    public function block_foot_script($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "

    <script type=\"text/javascript\" src=\"https://js.balancedpayments.com/v1/balanced.js\"></script>
    <script type=\"text/javascript\">
        balanced.init('/v1/marketplaces/";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["marketplaceToken"]) ? $context["marketplaceToken"] : $this->getContext($context, "marketplaceToken")), "html", null, true);
        echo "');
    </script>
    ";
        // line 19
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "72993fe_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_72993fe_0") : $this->env->getExtension('assets')->getAssetUrl("js/72993fe_payment.balanced_1.js");
            // line 22
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "72993fe"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_72993fe") : $this->env->getExtension('assets')->getAssetUrl("js/72993fe.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 24
        echo "    <script type=\"text/javascript\">
        \$(function () {
            var \$form = \$('#card-form').cardForm({data: {
                    address_line1: '";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "officialAddress", array()), "html", null, true);
        echo "',
                    address_city: '";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "officialCity", array()), "html", null, true);
        echo "',
                    address_state: '";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "officialState", array()), "html", null, true);
        echo "'
                }}).bind('onCardCreate', function (e, data) {
                \$.ajax({
                    type: 'POST',
                    url: '";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentsettings_createcardpost"), array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
        echo "',
                    data: JSON.stringify(data),
                    contentType: \"application/json\",
                    success: function () {
                        window.location = '";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["return_path"]) ? $context["return_path"] : $this->getContext($context, "return_path")), "html", null, true);
        echo "';
                    },
                    error: function () {
                        alert('Error Occurred');
                        \$form.renderCardForm();
                    }
                });
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentSettings:createCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 37,  101 => 33,  94 => 29,  90 => 28,  86 => 27,  81 => 24,  67 => 22,  63 => 19,  58 => 17,  50 => 13,  47 => 12,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
