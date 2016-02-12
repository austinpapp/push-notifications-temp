<?php

/* CivixFrontBundle:Subscription:status-widget.html.twig */
class __TwigTemplate_00cc64cce4aff6960f5c3161e0967687dd92f68cfc597c058a4ebdcc1899f9e9 extends Twig_Template
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
        echo "<div class=\"row\">
    <div class=\"well\">
        <p>
            Account: ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "label", array()), "html", null, true);
        echo "
            ";
        // line 5
        if ((($this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "enabled", array()) == false) && $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "isNotFree", array()))) {
            // line 6
            echo "                (<span style=\"color: red\">canceled</span>)
            ";
        }
        // line 8
        echo "        </p>
        ";
        // line 9
        if ($this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "isActive", array())) {
            // line 10
            echo "            <p>Expire at: ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "expiredAt", array()), "D, d M y H:i:s O"), "html", null, true);
            echo "</p>
        ";
        } elseif ($this->getAttribute(        // line 11
(isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "isNotFree", array())) {
            // line 12
            echo "            <p class=\"warning\">Expired</p>
        ";
        }
        // line 14
        echo "
        <p><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_subscription_index"));
        echo "\">Manage subscription</a></p>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Subscription:status-widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 15,  50 => 14,  46 => 12,  44 => 11,  39 => 10,  37 => 9,  34 => 8,  30 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
