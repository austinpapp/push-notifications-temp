<?php

/* CivixFrontBundle:Post:new.html.twig */
class __TwigTemplate_c452913534175cefa7a7525c25fd46e190b1d26133b03fc689bf71ecb99615fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Post:new.html.twig", 1);
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
        echo "Create new post";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form action=\"\" method=\"POST\" enctype=\"multipart/form-data\">
            <legend>Create new post</legend>
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
            <div class=\"form-actions\">
                <input type=\"submit\" value=\"Create\" class=\"btn btn-primary\">
                <a class=\"btn\" href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_post_index"));
        echo "\">Cancel</a>
            </div>
        </form>
    </div>
</div>
";
    }

    // line 20
    public function block_foot_script($context, array $blocks = array())
    {
        // line 21
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 22
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "2fb7ce7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2fb7ce7_0") : $this->env->getExtension('assets')->getAssetUrl("js/2fb7ce7_bootstrap-markdown_1.js");
            // line 27
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    <script>
        \$(\"#post_content\").markdown({autofocus:false,savable:false,iconlibrary:'fa'})
    </script>
    ";
            // asset "2fb7ce7_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2fb7ce7_1") : $this->env->getExtension('assets')->getAssetUrl("js/2fb7ce7_markdown_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    <script>
        \$(\"#post_content\").markdown({autofocus:false,savable:false,iconlibrary:'fa'})
    </script>
    ";
            // asset "2fb7ce7_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2fb7ce7_2") : $this->env->getExtension('assets')->getAssetUrl("js/2fb7ce7_to-markdown_3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    <script>
        \$(\"#post_content\").markdown({autofocus:false,savable:false,iconlibrary:'fa'})
    </script>
    ";
        } else {
            // asset "2fb7ce7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2fb7ce7") : $this->env->getExtension('assets')->getAssetUrl("js/2fb7ce7.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    <script>
        \$(\"#post_content\").markdown({autofocus:false,savable:false,iconlibrary:'fa'})
    </script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Post:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 27,  69 => 22,  64 => 21,  61 => 20,  51 => 13,  45 => 10,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
