<?php

/* CivixFrontBundle:Group:petitionConfig.html.twig */
class __TwigTemplate_3cc7499568c0c1dced2427783eb2cab731d28efbe8c4dbf635709ca8c4c11489 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group:petitionConfig.html.twig", 1);
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
        echo "Micro-petitions configuration";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("microPetitionMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
        <form class=\"form-horizontal\" action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath((isset($context["updatePath"]) ? $context["updatePath"] : $this->getContext($context, "updatePath")));
        echo "\" method=\"POST\">
            <fieldset>
                <legend>Edit petition's configuration</legend>
                ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["petitionConfigForm"]) ? $context["petitionConfigForm"] : $this->getContext($context, "petitionConfigForm")), 'errors');
        echo "
                ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["petitionConfigForm"]) ? $context["petitionConfigForm"] : $this->getContext($context, "petitionConfigForm")), 'rest');
        echo "
                ";
        // line 16
        if ((isset($context["isChangeConfig"]) ? $context["isChangeConfig"] : $this->getContext($context, "isChangeConfig"))) {
            // line 17
            echo "                <div class=\"form-actions\">
                    <input type=\"submit\" class=\"btn btn-primary bt\" value=\"Save\" />
                </div>
                ";
        }
        // line 21
        echo "            </fieldset>
        </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group:petitionConfig.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 21,  64 => 17,  62 => 16,  58 => 15,  54 => 14,  48 => 11,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
