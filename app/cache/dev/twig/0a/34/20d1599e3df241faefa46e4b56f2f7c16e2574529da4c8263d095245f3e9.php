<?php

/* CivixFrontBundle:Group:petitionDetails.html.twig */
class __TwigTemplate_0a3420d1599e3df241faefa46e4b56f2f7c16e2574529da4c8263d095245f3e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group:petitionDetails.html.twig", 1);
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
        echo "MicroPetition Details";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<nav class=\"submenu\">
    ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("microPetitionMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
</nav>
<legend>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["petition"]) ? $context["petition"] : $this->getContext($context, "petition")), "title", array()), "html", null, true);
        echo "</legend>
<div class=\"row q-results\">
    ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 12
            echo "        <div class=\"span12\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "option", array()), "html", null, true);
            echo "</div>
        <div class=\"span11\">
            <i style=\"background: ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "color", array()), "html", null, true);
            echo "; width: ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_width", array()), "html", null, true);
            echo "%;\"></i>
        </div>
        <div class=\"span1\">";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_answer", array()), "html", null, true);
            echo "%</div>
        <div class=\"span12\"><hr></div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group:petitionDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 19,  68 => 16,  61 => 14,  55 => 12,  51 => 11,  46 => 9,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
