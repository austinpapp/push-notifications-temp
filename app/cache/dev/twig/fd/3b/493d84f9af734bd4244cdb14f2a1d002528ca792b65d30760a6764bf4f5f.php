<?php

/* CivixFrontBundle:Representative:index.html.twig */
class __TwigTemplate_fd3b493d84f9af734bd4244cdb14f2a1d002528ca792b65d30760a6764bf4f5f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Representative:index.html.twig", 1);
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
        echo "Homepage";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span8\">
        <p>Hello representative manager</p>
    </div>
    <div class=\"span4\">
        ";
        // line 11
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CivixFrontBundle:Representative/Subscription:statusWidget"));
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 11,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
