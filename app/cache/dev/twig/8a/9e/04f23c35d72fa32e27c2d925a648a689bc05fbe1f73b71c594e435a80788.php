<?php

/* CivixFrontBundle:Payment:transactionSuccess.html.twig */
class __TwigTemplate_8a9e04f23c35d72fa32e27c2d925a648a689bc05fbe1f73b71c594e435a80788 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Payment:transactionSuccess.html.twig", 1);
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
        echo "Transaction success ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    Thanks.
    Please download emails for this <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_payment_emails"), array("reference" => (isset($context["reference"]) ? $context["reference"] : $this->getContext($context, "reference")))), "html", null, true);
        echo "\">link</a>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Payment:transactionSuccess.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
