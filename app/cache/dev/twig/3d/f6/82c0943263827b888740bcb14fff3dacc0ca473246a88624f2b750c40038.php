<?php

/* CivixFrontBundle:News:details.html.twig */
class __TwigTemplate_3df682c0943263827b888740bcb14fff3dacc0ca473246a88624f2b750c40038 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:News:details.html.twig", 1);
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
        echo "News - comments";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
<div class=\"row\">
    <div class=\"span12\">
        <h4>News - comments</h4>
        ";
        // line 10
        if ((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment"))) {
            // line 11
            echo "            ";
            $this->loadTemplate("CivixFrontBundle:News:comment.html.twig", "CivixFrontBundle:News:details.html.twig", 11)->display(array_merge($context, array("comment" => (isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")))));
            // line 12
            echo "        ";
        }
        // line 13
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:News:details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 13,  49 => 12,  46 => 11,  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
