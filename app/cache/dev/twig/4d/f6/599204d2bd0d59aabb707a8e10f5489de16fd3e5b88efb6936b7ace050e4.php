<?php

/* CivixFrontBundle:PaymentRequest:show-funds.html.twig */
class __TwigTemplate_4df6599204d2bd0d59aabb707a8e10f5489de16fd3e5b88efb6936b7ace050e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:PaymentRequest:show-funds.html.twig", 1);
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
        echo "Funds";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <div class=\"row\">
            <div class=\"span3\">Amount</div>
            <div class=\"span5\">\$";
        // line 10
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((isset($context["amount"]) ? $context["amount"] : $this->getContext($context, "amount")) / 100), 2, ".", ","), "html", null, true);
        echo "</div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentRequest:show-funds.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
