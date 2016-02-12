<?php

/* CivixFrontBundle:Subscription:subscribe.html.twig */
class __TwigTemplate_ed84f7e52682fc4a2956798c119403fb0edbe562987bf82cc12f631f292a0aec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Subscription:subscribe.html.twig", 1);
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
        echo "    <div class=\"row\" xmlns=\"http://www.w3.org/1999/html\">
        <div class=\"span7\">
            <h4>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "title", array()), "html", null, true);
        echo " / 
                ";
        // line 9
        if (((isset($context["discountPrice"]) ? $context["discountPrice"] : $this->getContext($context, "discountPrice")) == $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "price", array()))) {
            // line 10
            echo "                    \$<span class=\"price-item\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "price", array()), "html", null, true);
            echo "</span>
                ";
        } else {
            // line 12
            echo "                    \$<s class=\"price-item\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "price", array()), "html", null, true);
            echo "</s> \$<span class=\"text-error discount-price-item\">";
            echo twig_escape_filter($this->env, (isset($context["discountPrice"]) ? $context["discountPrice"] : $this->getContext($context, "discountPrice")), "html", null, true);
            echo "</span>
                ";
        }
        // line 14
        echo "            </h4>

            <form action=\"\" method=\"post\">
                ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
                <div class=\"form-actions\">
                    ";
        // line 19
        if ((isset($context["hasCard"]) ? $context["hasCard"] : $this->getContext($context, "hasCard"))) {
            // line 20
            echo "                        <input type=\"submit\" class=\"btn btn-primary\" value=\"Subscribe\">
                    ";
        } else {
            // line 22
            echo "                        <a class=\"btn btn-primary\" data-open-card-from>Add Card</a>
                    ";
        }
        // line 24
        echo "                </div>
            </form>
        </div>
    </div>

    ";
        // line 29
        echo twig_include($this->env, $context, "CivixFrontBundle:PaymentSettings:stripe.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Subscription:subscribe.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 29,  82 => 24,  78 => 22,  74 => 20,  72 => 19,  67 => 17,  62 => 14,  54 => 12,  48 => 10,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
