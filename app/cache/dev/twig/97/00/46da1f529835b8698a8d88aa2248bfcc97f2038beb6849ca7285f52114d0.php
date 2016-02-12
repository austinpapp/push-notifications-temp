<?php

/* CivixFrontBundle:PaymentSettings:account-type.html.twig */
class __TwigTemplate_970046da1f529835b8698a8d88aa2248bfcc97f2038beb6849ca7285f52114d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:PaymentSettings:account-type.html.twig", 1);
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
    <div class=\"row\">
        <div class=\"span12\">
            <form action=\"\" method=\"POST\">
                ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
                <div class=\"form-actions\">
                    <input type=\"submit\" value=\"Submit\" class=\"btn btn-primary\">
                    <a class=\"btn\" href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentsettings_index"));
        echo "\">Cancel</a>
                </div>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentSettings:account-type.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 13,  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
