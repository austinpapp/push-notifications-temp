<?php

/* CivixFrontBundle:Payment:buy-petition-emails.html.twig */
class __TwigTemplate_1016f2c5dff8257e9f288e6bf2502c631caccd705ef581fc731870a7ccf0a6c7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Payment:buy-petition-emails.html.twig", 1);
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
        echo "Buy";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"row\">
        ";
        // line 7
        if ((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card"))) {
            // line 8
            echo "            <div class=\"span12\">
                <p><strong>Card:</strong> ";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "brand", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "last4", array()), "html", null, true);
            echo "</p>
            </div>
            <br>
            <div class=\"span12\">
                <form method=\"post\">
                    ";
            // line 14
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
            echo "
                    <input name=\"amount\" value=\"";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")), "html", null, true);
            echo "\" type=\"hidden\">
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"Buy\">
                </form>
            </div>
        ";
        } else {
            // line 20
            echo "            <div class=\"span12\">
                <a class=\"btn btn-primary\" data-open-card-from>Add Card</a>
            </div>
        ";
        }
        // line 24
        echo "    </div>

    ";
        // line 26
        echo twig_include($this->env, $context, "CivixFrontBundle:PaymentSettings:stripe.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Payment:buy-petition-emails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 26,  74 => 24,  68 => 20,  60 => 15,  56 => 14,  46 => 9,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
