<?php

/* CivixFrontBundle:Petition:edit.html.twig */
class __TwigTemplate_b44e74f96b18674046893d503491c3e737efc83b3241d2ca9b10df1ec2af2c07 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Petition:edit.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
            'foot_script' => array($this, 'block_foot_script'),
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
        echo "Edit petition";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form action=\"\" method=\"POST\" enctype=\"multipart/form-data\">
            <legend>Edit petition</legend>
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "petition", array()), "petitionTitle", array()), 'row');
        echo "
            ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "petition", array()), "petitionBody", array()), 'row');
        echo "
            ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "petition", array()), "isOutsidersSign", array()), 'row');
        echo "

            ";
        // line 14
        $this->loadTemplate("CivixFrontBundle::educational-context.html.twig", "CivixFrontBundle:Petition:edit.html.twig", 14)->display(array_merge($context, array("form" => $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "educationalContext", array()))));
        // line 15
        echo "
            ";
        // line 16
        if ((isset($context["isShowGroupSection"]) ? $context["isShowGroupSection"] : $this->getContext($context, "isShowGroupSection"))) {
            // line 17
            echo "                ";
            $this->loadTemplate("CivixFrontBundle::group-sections.html.twig", "CivixFrontBundle:Petition:edit.html.twig", 17)->display(array_merge($context, array("question" => $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "petition", array()))));
            // line 18
            echo "            ";
        }
        // line 19
        echo "            
            ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
            <div class=\"form-actions\">
                <input type=\"submit\" value=\"Create\" class=\"btn btn-primary\">
                <a class=\"btn\" href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_petition_index"));
        echo "\">Cancel</a>
            </div>

        </form>
    </div>
</div>
";
    }

    // line 31
    public function block_foot_script($context, array $blocks = array())
    {
        // line 32
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 33
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c22feca_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c22feca_0") : $this->env->getExtension('assets')->getAssetUrl("js/c22feca_question.create_1.js");
            // line 36
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "c22feca"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c22feca") : $this->env->getExtension('assets')->getAssetUrl("js/c22feca.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Petition:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 36,  99 => 33,  94 => 32,  91 => 31,  80 => 23,  74 => 20,  71 => 19,  68 => 18,  65 => 17,  63 => 16,  60 => 15,  58 => 14,  53 => 12,  49 => 11,  45 => 10,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
