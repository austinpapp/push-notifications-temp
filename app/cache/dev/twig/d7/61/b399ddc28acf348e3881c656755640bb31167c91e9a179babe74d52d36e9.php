<?php

/* CivixFrontBundle::imageField.html.twig */
class __TwigTemplate_d761b399ddc28acf348e3881c656755640bb31167c91e9a179babe74d52d36e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle::imageField.html.twig", 1);
        $this->blocks = array(
            'image_widget' => array($this, 'block_image_widget'),
            'foot_script' => array($this, 'block_foot_script'),
            'head_style' => array($this, 'block_head_style'),
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
    public function block_image_widget($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "
        ";
        // line 7
        echo "
        ";
        // line 8
        if (twig_test_empty($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "data", array()))) {
            // line 9
            echo "        <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
            <div class=\"fileupload-preview thumbnail\" style=\"width: 200px; height: 150px;\"></div>
            <div>
                <span class=\"btn btn-file btn-primary\">
                    <span class=\"fileupload-new\">Select image</span>
                    <span class=\"fileupload-exists\">Change</span>
                    <input ";
            // line 15
            $this->displayBlock("widget_attributes", $context, $blocks);
            echo " type=\"file\" />
                </span>
                <a href=\"#\" class=\"btn fileupload-exists btn-primary\" data-dismiss=\"fileupload\">Remove</a>
            </div>
        </div>
        ";
        } else {
            // line 21
            echo "        <div class=\"fileupload fileupload-exists\" data-provides=\"fileupload\">
            <div class=\"fileupload-preview thumbnail\" style=\"width: 200px; height: 150px;\">
                <img src=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "getParent", array(), "method"), "vars", array()), "data", array()), "image"), "html", null, true);
            echo "\" />
            </div>
            <div>
                <span class=\"btn btn-file btn-primary\">
                    <span class=\"fileupload-new\">Select image</span>
                    <span class=\"fileupload-exists\">Change</span>
                    <input ";
            // line 29
            $this->displayBlock("widget_attributes", $context, $blocks);
            echo " type=\"file\" data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "data", array()), "html", null, true);
            echo "\"/>
                </span>
                <a href=\"#\" class=\"btn fileupload-exists btn-primary remove\" data-dismiss=\"fileupload\">Remove</a>
            </div>
        </div>
        ";
        }
        // line 35
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 37
        echo "
    ";
        // line 38
        $this->displayBlock('foot_script', $context, $blocks);
        // line 46
        echo "    ";
        $this->displayBlock('head_style', $context, $blocks);
        // line 54
        echo "

";
    }

    // line 38
    public function block_foot_script($context, array $blocks = array())
    {
        // line 39
        echo "        ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
        ";
        // line 40
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b27c948_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b27c948_0") : $this->env->getExtension('assets')->getAssetUrl("js/b27c948_bootstrap-fileupload_1.js");
            // line 43
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "b27c948"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b27c948") : $this->env->getExtension('assets')->getAssetUrl("js/b27c948.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 45
        echo "    ";
    }

    // line 46
    public function block_head_style($context, array $blocks = array())
    {
        // line 47
        echo "        ";
        $this->displayParentBlock("head_style", $context, $blocks);
        echo "
        ";
        // line 48
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "a259d4d_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a259d4d_0") : $this->env->getExtension('assets')->getAssetUrl("css/a259d4d_bootstrap-fileupload_1.css");
            // line 51
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        } else {
            // asset "a259d4d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a259d4d") : $this->env->getExtension('assets')->getAssetUrl("css/a259d4d.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
        }
        unset($context["asset_url"]);
        // line 53
        echo "    ";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle::imageField.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 53,  145 => 51,  141 => 48,  136 => 47,  133 => 46,  129 => 45,  115 => 43,  111 => 40,  106 => 39,  103 => 38,  97 => 54,  94 => 46,  92 => 38,  89 => 37,  85 => 35,  74 => 29,  65 => 23,  61 => 21,  52 => 15,  44 => 9,  42 => 8,  39 => 7,  36 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}
