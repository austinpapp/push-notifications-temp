<?php

/* CivixFrontBundle:Representative:cropAvatar.html.twig */
class __TwigTemplate_41f45d369832de77d431cafbc89518e0296342594af7775493c393ff5b2bd888 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Representative:cropAvatar.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
            'head_style' => array($this, 'block_head_style'),
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
        echo "Crop profile avatar";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form class=\"form-horizontal\" method=\"POST\" action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("civix_front_representative_update_avatar");
        echo "\">
            <fieldset>
                <legend>Crop and save avatar</legend>
                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["cropImageForm"]) ? $context["cropImageForm"] : $this->getContext($context, "cropImageForm")), 'widget');
        echo "
                <div class=\"crop-area\">
                    <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute($this->getAttribute((isset($context["avatarForm"]) ? $context["avatarForm"] : $this->getContext($context, "avatarForm")), "vars", array()), "data", array()), "avatarSource"), "html", null, true);
        echo "\">
                </div>
                <div class=\"crop-preview-area\">
                    <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute($this->getAttribute((isset($context["avatarForm"]) ? $context["avatarForm"] : $this->getContext($context, "avatarForm")), "vars", array()), "data", array()), "avatarSource"), "html", null, true);
        echo "\">
                </div>
                <div class=\"clearfix\"></div>
                <div class=\"form-actions\">
                    <button class=\"btn btn-primary\">Save avatar</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
";
    }

    // line 28
    public function block_head_style($context, array $blocks = array())
    {
        // line 29
        $this->displayParentBlock("head_style", $context, $blocks);
        echo "
";
        // line 30
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4b0af89_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4b0af89_0") : $this->env->getExtension('assets')->getAssetUrl("css/4b0af89_jquery.jcrop_1.css");
            // line 33
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />
";
        } else {
            // asset "4b0af89"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4b0af89") : $this->env->getExtension('assets')->getAssetUrl("css/4b0af89.css");
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
    }

    // line 37
    public function block_foot_script($context, array $blocks = array())
    {
        // line 38
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
";
        // line 39
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "31f5365_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_31f5365_0") : $this->env->getExtension('assets')->getAssetUrl("js/31f5365_jquery.jcrop_1.js");
            // line 43
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "31f5365_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_31f5365_1") : $this->env->getExtension('assets')->getAssetUrl("js/31f5365_avatar.crop_2.js");
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "31f5365"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_31f5365") : $this->env->getExtension('assets')->getAssetUrl("js/31f5365.js");
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative:cropAvatar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 43,  110 => 39,  106 => 38,  103 => 37,  87 => 33,  83 => 30,  79 => 29,  76 => 28,  61 => 16,  55 => 13,  50 => 11,  44 => 8,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
    }
}
