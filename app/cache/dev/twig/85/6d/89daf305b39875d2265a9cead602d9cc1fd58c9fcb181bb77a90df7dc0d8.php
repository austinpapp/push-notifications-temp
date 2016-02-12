<?php

/* MopaBootstrapBundle::base_lessjs.html.twig */
class __TwigTemplate_856d89daf305b39875d2265a9cead602d9cc1fd58c9fcb181bb77a90df7dc0d8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MopaBootstrapBundle::base.html.twig", "MopaBootstrapBundle::base_lessjs.html.twig", 1);
        $this->blocks = array(
            'head_style' => array($this, 'block_head_style'),
            'head_script' => array($this, 'block_head_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MopaBootstrapBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head_style($context, array $blocks = array())
    {
        // line 5
        echo "<link rel=\"stylesheet/less\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("web/less/frontend.less"), "html", null, true);
        echo "\">
";
    }

    // line 8
    public function block_head_script($context, array $blocks = array())
    {
        // line 9
        echo "<script src=\"http://lesscss.googlecode.com/files/less-1.3.0.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle::base_lessjs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  39 => 8,  32 => 5,  29 => 4,  11 => 1,);
    }
}
