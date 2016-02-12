<?php

/* MopaBootstrapBundle:Modal:modal.html.twig */
class __TwigTemplate_ff862d70cf184126014917689ff63fe3c4182669860fb273db56175e5d1c226b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " modal")));
        // line 2
        echo "<div";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ">
    <div class=\"modal-header\">
        ";
        // line 4
        $this->displayBlock('header', $context, $blocks);
        // line 5
        echo "    </div>
    <div class=\"modal-body\">
        ";
        // line 7
        $this->displayBlock('body', $context, $blocks);
        // line 8
        echo "    </div>
    <div class=\"modal-footer\">
        ";
        // line 10
        $this->displayBlock('footer', $context, $blocks);
        // line 11
        echo "    </div>
</div>
";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
    }

    // line 10
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Modal:modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 10,  66 => 7,  61 => 4,  55 => 11,  53 => 10,  49 => 8,  47 => 7,  43 => 5,  41 => 4,  24 => 2,  22 => 1,);
    }
}
