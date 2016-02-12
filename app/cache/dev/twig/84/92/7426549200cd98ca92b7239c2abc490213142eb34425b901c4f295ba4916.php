<?php

/* CivixFrontBundle:PaymentRequest:follow-up-publish.html.twig */
class __TwigTemplate_84927426549200cd98ca92b7239c2abc490213142eb34425b901c4f295ba4916 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:PaymentRequest:follow-up-publish.html.twig", 1);
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
        echo "Follow Up Payment Requests";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"row\">
        <div class=\"span12\">
            <p><strong>Payment request:</strong> ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymentRequest"]) ? $context["paymentRequest"] : $this->getContext($context, "paymentRequest")), "title", array()), "html", null, true);
        echo " </p>
            <p><strong>Petition:</strong> ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["petition"]) ? $context["petition"] : $this->getContext($context, "petition")), "petitionTitle", array()), "html", null, true);
        echo "</p>
            <p><strong>Signed:</strong> ";
        // line 10
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : $this->getContext($context, "users"))), "html", null, true);
        echo "</p>
        </div>
        <br>
        <br>
        <div class=\"span12\">
            <form method=\"post\">
                ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
                <input name=\"user_count\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : $this->getContext($context, "users"))), "html", null, true);
        echo "\" type=\"hidden\">
                ";
        // line 18
        if ((isset($context["hasCard"]) ? $context["hasCard"] : $this->getContext($context, "hasCard"))) {
            // line 19
            echo "                    <input type=\"submit\" class=\"btn btn-primary\" value=\"Pay & Publish\">
                ";
        } else {
            // line 21
            echo "                    <a class=\"btn btn-primary\" data-open-card-from>Add Card</a>
                ";
        }
        // line 23
        echo "            </form>
        </div>
    </div>

    ";
        // line 27
        echo twig_include($this->env, $context, "CivixFrontBundle:PaymentSettings:stripe.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentRequest:follow-up-publish.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 27,  77 => 23,  73 => 21,  69 => 19,  67 => 18,  63 => 17,  59 => 16,  50 => 10,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
