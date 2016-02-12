<?php

/* CivixFrontBundle:Subscription:index.html.twig */
class __TwigTemplate_831bdfed829f10bf7323627bb655fc604c71c9fdec0e925c565a5c0bc0777df4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Subscription:index.html.twig", 1);
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
        echo "Subscriptions";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if ($this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "isNotFree", array(), "method")) {
            // line 7
            echo "        <div class=\"row\">
            <div class=\"well span3\">
                <p>
                    Account: ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "label", array()), "html", null, true);
            echo "
                    ";
            // line 11
            if (($this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "enabled", array()) == false)) {
                // line 12
                echo "                        (<span style=\"color: red\">canceled</span>)
                    ";
            }
            // line 14
            echo "                </p>
                ";
            // line 15
            if ($this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "isActive", array())) {
                // line 16
                echo "                    <p>Expire at: ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "expiredAt", array()), "D, d M y H:i:s O"), "html", null, true);
                echo "</p>
                ";
            } elseif ($this->getAttribute(            // line 17
(isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "isNotFree", array())) {
                // line 18
                echo "                    <p class=\"warning\">Expired</p>
                ";
            }
            // line 20
            echo "                ";
            if ($this->getAttribute((isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription")), "enabled", array())) {
                // line 21
                echo "                    <p><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_subscription_cancelsubscription"), array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
                echo "\">Cancel subscription</a></p>
                ";
            }
            // line 23
            echo "            </div>
        </div>
    ";
        }
        // line 26
        echo "    <div class=\"row\">
        ";
        // line 27
        $context["package"] = $this->getAttribute((isset($context["packages"]) ? $context["packages"] : $this->getContext($context, "packages")), twig_constant("PACKAGE_TYPE_FREE", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))), array(), "array");
        // line 28
        echo "        <div class=\"span4\">
            <div class=\"well\">
                <h3>Get Started</h3>
                <h4>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "title", array()), "html", null, true);
        echo "</h4>
                <p>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "price", array()), "html", null, true);
        echo "\$/month</p>
                <br>
            </div>
            <div>
                <p>
                    Audience: Unlimited <br>
                    Size: Unlimited
                </p>
            </div>
        </div>
        ";
        // line 42
        $context["package"] = $this->getAttribute((isset($context["packages"]) ? $context["packages"] : $this->getContext($context, "packages")), twig_constant("PACKAGE_TYPE_SILVER", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))), array(), "array");
        // line 43
        echo "        <div class=\"span4\">
            <div class=\"well\">
                <h3>For Controls</h3>
                <h4>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "title", array()), "html", null, true);
        echo "</h4>
                <p>";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "price", array()), "html", null, true);
        echo "\$/month</p>
                <br>
            </div>
            <div>
                <p>
                    Audience: Not Business <br>
                    Size: Under 1000 users
                </p>
                ";
        // line 55
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isBuyAvailable", array())) {
            // line 56
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_subscription_subscribe"), array("id" => twig_constant("PACKAGE_TYPE_SILVER", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))))), "html", null, true);
            echo "\"
                   class=\"btn btn-primary\">Buy</a>
                ";
        }
        // line 59
        echo "
            </div>
        </div>
        ";
        // line 62
        $context["package"] = $this->getAttribute((isset($context["packages"]) ? $context["packages"] : $this->getContext($context, "packages")), twig_constant("PACKAGE_TYPE_GOLD", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))), array(), "array");
        // line 63
        echo "        <div class=\"span4\">
            <div class=\"well\">
                <h3>For Growth</h3>
                <h4>";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "title", array()), "html", null, true);
        echo "</h4>
                <p>";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "price", array()), "html", null, true);
        echo "\$/month</p>
                <br>
            </div>
            <div>
                <p>
                    Audience: Unlimited <br>
                    Size: Under 5000 users
                </p>
                ";
        // line 75
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isBuyAvailable", array())) {
            // line 76
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_subscription_subscribe"), array("id" => twig_constant("PACKAGE_TYPE_GOLD", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))))), "html", null, true);
            echo "\" class=\"btn btn-primary\">Buy</a>
                ";
        }
        // line 78
        echo "            </div>
        </div>
    </div>
    <br><br>
    <div class=\"row\">
        ";
        // line 83
        $context["package"] = $this->getAttribute((isset($context["packages"]) ? $context["packages"] : $this->getContext($context, "packages")), twig_constant("PACKAGE_TYPE_PLATINUM", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))), array(), "array");
        // line 84
        echo "        <div class=\"span4\">
            <div class=\"well\">
                <h3>For Insights</h3>
                <h4>";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "title", array()), "html", null, true);
        echo "</h4>
                <p>";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "price", array()), "html", null, true);
        echo "\$/month</p>
                <br>
            </div>
            <div>
                <p>
                    Audience: Not Business <br>
                    Size: Unlimited
                </p>
                ";
        // line 96
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isBuyAvailable", array())) {
            // line 97
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_subscription_subscribe"), array("id" => twig_constant("PACKAGE_TYPE_PLATINUM", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))))), "html", null, true);
            echo "\" class=\"btn btn-primary\">Buy</a>
                ";
        }
        // line 99
        echo "            </div>
        </div>
        ";
        // line 101
        $context["package"] = $this->getAttribute((isset($context["packages"]) ? $context["packages"] : $this->getContext($context, "packages")), twig_constant("PACKAGE_TYPE_COMMERCIAL", (isset($context["subscription"]) ? $context["subscription"] : $this->getContext($context, "subscription"))), array(), "array");
        // line 102
        echo "        <div class=\"span4\">
            <div class=\"well\">
                <h3>For Business</h3>
                <h4>";
        // line 105
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "title", array()), "html", null, true);
        echo "</h4>
                <p>Contact Us</p>
                <br>
            </div>
            <div>
                <p>
                    Audience: Business Only <br>
                    Size: Unlimited
                </p>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Subscription:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 105,  222 => 102,  220 => 101,  216 => 99,  210 => 97,  208 => 96,  197 => 88,  193 => 87,  188 => 84,  186 => 83,  179 => 78,  173 => 76,  171 => 75,  160 => 67,  156 => 66,  151 => 63,  149 => 62,  144 => 59,  137 => 56,  135 => 55,  124 => 47,  120 => 46,  115 => 43,  113 => 42,  100 => 32,  96 => 31,  91 => 28,  89 => 27,  86 => 26,  81 => 23,  75 => 21,  72 => 20,  68 => 18,  66 => 17,  61 => 16,  59 => 15,  56 => 14,  52 => 12,  50 => 11,  46 => 10,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
