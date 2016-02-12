<?php

/* CivixFrontBundle:News:new.html.twig */
class __TwigTemplate_2094a9b9b1c0f7a708d9e41c44889e2fa164e998c7526a39291477c71dbc8e96 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:News:new.html.twig", 1);
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
        echo "Create new";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . (isset($context["owner"]) ? $context["owner"] : $this->getContext($context, "owner"))) . "_news_new"));
        echo "\" method=\"POST\" enctype=\"multipart/form-data\">

                ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "question", array()), "subject", array()), 'row');
        echo "

                ";
        // line 12
        $this->loadTemplate("CivixFrontBundle::educational-context.html.twig", "CivixFrontBundle:News:new.html.twig", 12)->display(array_merge($context, array("form" => $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "educationalContext", array()))));
        // line 13
        echo "
                ";
        // line 14
        if ((isset($context["isShowGroupSection"]) ? $context["isShowGroupSection"] : $this->getContext($context, "isShowGroupSection"))) {
            // line 15
            echo "                    ";
            $this->loadTemplate("CivixFrontBundle::group-sections.html.twig", "CivixFrontBundle:News:new.html.twig", 15)->display(array_merge($context, array("question" => $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "question", array()))));
            // line 16
            echo "                ";
        }
        // line 17
        echo "                
                ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
                <div class=\"form-actions\">
                    <input type=\"submit\" value=\"Create\" class=\"btn btn-primary\">
                    <a class=\"btn\" href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . (isset($context["owner"]) ? $context["owner"] : $this->getContext($context, "owner"))) . "_news_index"));
        echo "\">Cancel</a>
                </div>

        </form>
    </div>
</div>
";
    }

    // line 29
    public function block_foot_script($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 31
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c22feca_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c22feca_0") : $this->env->getExtension('assets')->getAssetUrl("js/c22feca_question.create_1.js");
            // line 34
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
        return "CivixFrontBundle:News:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 34,  94 => 31,  89 => 30,  86 => 29,  75 => 21,  69 => 18,  66 => 17,  63 => 16,  60 => 15,  58 => 14,  55 => 13,  53 => 12,  48 => 10,  43 => 8,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
