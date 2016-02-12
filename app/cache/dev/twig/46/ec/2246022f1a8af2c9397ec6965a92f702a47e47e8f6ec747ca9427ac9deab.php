<?php

/* CivixFrontBundle:Petition:invite.html.twig */
class __TwigTemplate_46ec2246022f1a8af2c9397ec6965a92f702a47e47e8f6ec747ca9427ac9deab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Petition:invite.html.twig", 1);
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
        echo "Send invites for petitions";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"row\">
        <div class=\"span7\">
            <h4>Invites / ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["price"]) ? $context["price"] : $this->getContext($context, "price")), "html", null, true);
        echo "\$</h4>
            <p>Card: ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "name", array()), "html", null, true);
        echo "</p>
            <form action=\"\" method=\"post\">
                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
                <input type=\"submit\" class=\"btn btn-primary\" value=\"Pay\">
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Petition:invite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 11,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
