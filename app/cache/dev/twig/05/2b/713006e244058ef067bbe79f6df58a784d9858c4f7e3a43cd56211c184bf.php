<?php

/* CivixFrontBundle::layout.html.twig */
class __TwigTemplate_052b713006e244058ef067bbe79f6df58a784d9858c4f7e3a43cd56211c184bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MopaBootstrapBundle::base.html.twig", "CivixFrontBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'page_title' => array($this, 'block_page_title'),
            'head_style' => array($this, 'block_head_style'),
            'body' => array($this, 'block_body'),
            'navbar' => array($this, 'block_navbar'),
            'navbar_container' => array($this, 'block_navbar_container'),
            'flashes' => array($this, 'block_flashes'),
            'content' => array($this, 'block_content'),
            'foot_script' => array($this, 'block_foot_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MopaBootstrapBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_8e12363eefa2a1906155bc70381cc79638cf5f3315eb364b4285d54d8b87f9a9"] = $this->loadTemplate("MopaBootstrapBundle::flash.html.twig", "CivixFrontBundle::layout.html.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $this->displayBlock('page_title', $context, $blocks);
        echo " - Powerline";
    }

    public function block_page_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_head_style($context, array $blocks = array())
    {
        // line 9
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0b7dadf_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0b7dadf_0") : $this->env->getExtension('assets')->getAssetUrl("css/0b7dadf_mopabootstrapbundle_1.css");
            // line 17
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
            // asset "0b7dadf_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0b7dadf_1") : $this->env->getExtension('assets')->getAssetUrl("css/0b7dadf_bootstrap-fileupload_2.css");
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
            // asset "0b7dadf_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0b7dadf_2") : $this->env->getExtension('assets')->getAssetUrl("css/0b7dadf_bootstrap-markdown.min_3.css");
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
            // asset "0b7dadf_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0b7dadf_3") : $this->env->getExtension('assets')->getAssetUrl("css/0b7dadf_font-awesome_4.css");
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
            // asset "0b7dadf_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0b7dadf_4") : $this->env->getExtension('assets')->getAssetUrl("css/0b7dadf_main_5.css");
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
            // asset "0b7dadf_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0b7dadf_5") : $this->env->getExtension('assets')->getAssetUrl("css/0b7dadf_main_6.css");
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
        } else {
            // asset "0b7dadf"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0b7dadf") : $this->env->getExtension('assets')->getAssetUrl("css/0b7dadf.css");
            echo "<link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
        }
        unset($context["asset_url"]);
    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
        // line 23
        echo "
";
        // line 24
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("CivixFrontBundle:Default:header"), array());
        // line 25
        echo "
<nav class=\"navigation\">
    ";
        // line 27
        $this->displayBlock('navbar', $context, $blocks);
        // line 30
        echo "</nav>

<div class=\"container\">
    ";
        // line 33
        $this->displayBlock('navbar_container', $context, $blocks);
        // line 36
        echo "
    <div class=\"content-block\">
        <div class=\"flash\">
            ";
        // line 39
        $this->displayBlock('flashes', $context, $blocks);
        // line 42
        echo "        </div>
        <div class=\"content\">
            ";
        // line 44
        $this->displayBlock('content', $context, $blocks);
        // line 46
        echo "        </div>
    </div>
</div>

";
        // line 50
        $this->displayBlock('foot_script', $context, $blocks);
    }

    // line 27
    public function block_navbar($context, array $blocks = array())
    {
        // line 28
        echo "        ";
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("frontendNavbar", array("template" => "CivixFrontBundle:Default:menu.html.twig"));
        echo "
    ";
    }

    // line 33
    public function block_navbar_container($context, array $blocks = array())
    {
        // line 34
        echo "
    ";
    }

    // line 39
    public function block_flashes($context, array $blocks = array())
    {
        // line 40
        echo "            ";
        echo $context["__internal_8e12363eefa2a1906155bc70381cc79638cf5f3315eb364b4285d54d8b87f9a9"]->getsession_flash(false, false, true);
        echo "
            ";
    }

    // line 44
    public function block_content($context, array $blocks = array())
    {
        // line 45
        echo "            ";
    }

    // line 50
    public function block_foot_script($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 52
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "6118127_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6118127_0") : $this->env->getExtension('assets')->getAssetUrl("js/6118127_underscore-min_1.js");
            // line 58
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "6118127_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6118127_1") : $this->env->getExtension('assets')->getAssetUrl("js/6118127_bootstrap-fileupload_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "6118127_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6118127_2") : $this->env->getExtension('assets')->getAssetUrl("js/6118127_auth_3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "6118127_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6118127_3") : $this->env->getExtension('assets')->getAssetUrl("js/6118127_payment.stripe_4.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "6118127"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6118127") : $this->env->getExtension('assets')->getAssetUrl("js/6118127.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 60
        echo "
    ";
        // line 61
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 62
            echo "        <script type=\"text/javascript\">
            sessionStorage.userType = '";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), "html", null, true);
            echo "';
            window.dev = ";
            // line 64
            echo (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "debug", array())) ? ("true") : ("false"));
            echo ";
        </script>
    ";
        } else {
            // line 67
            echo "        <script type=\"text/javascript\">
            sessionStorage.clear();
        </script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 67,  238 => 64,  234 => 63,  231 => 62,  229 => 61,  226 => 60,  194 => 58,  190 => 52,  185 => 51,  182 => 50,  178 => 45,  175 => 44,  168 => 40,  165 => 39,  160 => 34,  157 => 33,  150 => 28,  147 => 27,  143 => 50,  137 => 46,  135 => 44,  131 => 42,  129 => 39,  124 => 36,  122 => 33,  117 => 30,  115 => 27,  111 => 25,  109 => 24,  106 => 23,  103 => 22,  57 => 17,  53 => 9,  50 => 8,  39 => 5,  35 => 1,  33 => 2,  11 => 1,);
    }
}
