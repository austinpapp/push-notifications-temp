<?php

/* MopaBootstrapBundle::base_initializr.html.twig */
class __TwigTemplate_4bd939d0f6adb059142cd0cb26bd36af54c4484c3226a4ebece964be2ba2b8e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MopaBootstrapBundle::base.html.twig", "MopaBootstrapBundle::base_initializr.html.twig", 1);
        $this->blocks = array(
            'html_tag' => array($this, 'block_html_tag'),
            'head' => array($this, 'block_head'),
            'dns_prefetch' => array($this, 'block_dns_prefetch'),
            'title' => array($this, 'block_title'),
            'head_style' => array($this, 'block_head_style'),
            'head_scripts' => array($this, 'block_head_scripts'),
            'body_start' => array($this, 'block_body_start'),
            'body' => array($this, 'block_body'),
            'navbar' => array($this, 'block_navbar'),
            'container' => array($this, 'block_container'),
            'foot_script' => array($this, 'block_foot_script'),
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

    // line 3
    public function block_html_tag($context, array $blocks = array())
    {
        // line 4
        echo "<!--[if lt IE 7]> <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>    <html class=\"no-js lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>    <html class=\"no-js lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"en\"> <!--<![endif]-->

";
    }

    // line 14
    public function block_head($context, array $blocks = array())
    {
        // line 15
        echo "<head>
    ";
        // line 17
        echo "    <meta charset=\"utf-8\" />

    ";
        // line 21
        echo "    ";
        $this->displayBlock('dns_prefetch', $context, $blocks);
        // line 26
        echo "
    ";
        // line 32
        echo "    <!--[if IE]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" /><![endif]-->

    ";
        // line 36
        echo "    <meta name=\"viewport\" content=\"width=device-width\" />
    <meta name=\"description\" content=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "description", array(), "array"), "html", null, true);
        echo "\" />
    <meta name=\"keywords\" content=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "keywords", array(), "array"), "html", null, true);
        echo "\" />
    <meta name=\"author\" content=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "author_name", array(), "array"), "html", null, true);
        echo "\" />
    ";
        // line 41
        echo "    <link rel=\"author\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "author_url", array(), "array"), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "author_name", array(), "array"), "html", null, true);
        echo "\" />

    ";
        // line 44
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 48
        echo "
    ";
        // line 52
        echo "
    ";
        // line 55
        echo "
    <link rel=\"shortcut icon\" href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    <link rel=\"apple-touch-icon\" href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon.png"), "html", null, true);
        echo "\" />

    ";
        // line 60
        echo "    ";
        if ($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), "sitemap", array(), "array", true, true)) {
            // line 61
            echo "    <link rel=\"sitemap\" type=\"application/xml\" title=\"Sitemap\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "sitemap", array(), "array"), "html", null, true);
            echo "\" />
    ";
        }
        // line 63
        echo "
    ";
        // line 65
        echo "    ";
        if ($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), "feed_atom", array(), "array", true, true)) {
            // line 66
            echo "    <link rel=\"alternate\" type=\"application/atom+xml\" title=\"Atom\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "feed_atom", array(), "array"), "html", null, true);
            echo "\" />
    ";
        }
        // line 68
        echo "    ";
        if ($this->getAttribute((isset($context["meta"]) ? $context["meta"] : null), "feed_rss", array(), "array", true, true)) {
            // line 69
            echo "    <link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "feed_rss", array(), "array"), "html", null, true);
            echo "\" />
    ";
        }
        // line 71
        echo "
    ";
        // line 73
        echo "    ";
        if ($this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "noindex", array(), "array")) {
            // line 74
            echo "        ";
            $context["meta_robots"] = "noindex,";
            // line 75
            echo "    ";
        } else {
            // line 76
            echo "        ";
            $context["meta_robots"] = "";
            // line 77
            echo "    ";
        }
        // line 78
        echo "    ";
        if ($this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "nofollow", array(), "array")) {
            // line 79
            echo "        ";
            $context["meta_robots"] = ((isset($context["meta_robots"]) ? $context["meta_robots"] : $this->getContext($context, "meta_robots")) . "nofollow");
            // line 80
            echo "    ";
        } else {
            // line 81
            echo "        ";
            $context["meta_robots"] = ((isset($context["meta_robots"]) ? $context["meta_robots"] : $this->getContext($context, "meta_robots")) . "follow");
            // line 82
            echo "    ";
        }
        // line 83
        echo "    <meta name=\"robots\" content=\"";
        echo twig_escape_filter($this->env, (isset($context["meta_robots"]) ? $context["meta_robots"] : $this->getContext($context, "meta_robots")), "html", null, true);
        echo "\" />

    ";
        // line 85
        if ($this->getAttribute((isset($context["google"]) ? $context["google"] : null), "wt", array(), "array", true, true)) {
            // line 86
            echo "    <meta name=\"google-site-verification\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["google"]) ? $context["google"] : $this->getContext($context, "google")), "wt", array(), "array"), "html", null, true);
            echo "\" />
    ";
        }
        // line 88
        echo "
    ";
        // line 90
        echo "
    ";
        // line 94
        echo "
    ";
        // line 96
        echo "    ";
        $this->displayBlock('head_style', $context, $blocks);
        // line 110
        echo "
    ";
        // line 111
        $this->displayBlock('head_scripts', $context, $blocks);
        // line 119
        echo "</head>
";
    }

    // line 21
    public function block_dns_prefetch($context, array $blocks = array())
    {
        // line 22
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dns_prefetch"]) ? $context["dns_prefetch"] : $this->getContext($context, "dns_prefetch")));
        foreach ($context['_seq'] as $context["_key"] => $context["domain"]) {
            // line 23
            echo "        <link rel=\"dns-prefetch\" href=\"";
            echo twig_escape_filter($this->env, $context["domain"], "html", null, true);
            echo "\" />
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['domain'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "    ";
    }

    // line 44
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["meta"]) ? $context["meta"] : $this->getContext($context, "meta")), "title", array(), "array"), "html", null, true);
    }

    // line 96
    public function block_head_style($context, array $blocks = array())
    {
        // line 97
        echo "        ";
        $this->displayParentBlock("head_style", $context, $blocks);
        echo "

        ";
        // line 101
        echo "        ";
        if ((isset($context["diagnostic_mode"]) ? $context["diagnostic_mode"] : $this->getContext($context, "diagnostic_mode"))) {
            // line 102
            echo "        ";
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "d75f95d_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d75f95d_0") : $this->env->getExtension('assets')->getAssetUrl("css/screen_diagnostic_diagnostic_1.css");
                // line 106
                echo "            <link href=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />
        ";
            } else {
                // asset "d75f95d"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d75f95d") : $this->env->getExtension('assets')->getAssetUrl("css/screen_diagnostic.css");
                echo "            <link href=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />
        ";
            }
            unset($context["asset_url"]);
            // line 108
            echo "        ";
        }
        // line 109
        echo "    ";
    }

    // line 111
    public function block_head_scripts($context, array $blocks = array())
    {
        // line 112
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ba30769_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba30769_0") : $this->env->getExtension('assets')->getAssetUrl("js/head_compiled_modernizr-2.5.3-respond-1.1.0.min_1.js");
            // line 116
            echo "            <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "ba30769"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba30769") : $this->env->getExtension('assets')->getAssetUrl("js/head_compiled.js");
            echo "            <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 118
        echo "    ";
    }

    // line 122
    public function block_body_start($context, array $blocks = array())
    {
        // line 123
        echo "<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href=\"http://browsehappy.com/\">Upgrade to a different browser</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
";
    }

    // line 126
    public function block_body($context, array $blocks = array())
    {
        // line 127
        echo "    ";
        $this->displayBlock('navbar', $context, $blocks);
        // line 130
        echo "
    ";
        // line 131
        $this->displayBlock('container', $context, $blocks);
        // line 134
        echo "
    ";
        // line 135
        $this->displayBlock('foot_script', $context, $blocks);
    }

    // line 127
    public function block_navbar($context, array $blocks = array())
    {
        // line 128
        echo "    ";
        $this->displayParentBlock("navbar", $context, $blocks);
        echo "
    ";
    }

    // line 131
    public function block_container($context, array $blocks = array())
    {
        // line 132
        echo "    ";
        $this->displayParentBlock("container", $context, $blocks);
        echo "
    ";
    }

    // line 135
    public function block_foot_script($context, array $blocks = array())
    {
        // line 136
        echo "    ";
        // line 138
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script>
        window.jQuery || document.write('<script src=\"../js/libs/jquery-1.7.2.min.js\"><\\/script>')
    </script>

    ";
        // line 145
        echo "    ";
        // line 147
        echo "    ";
        if ($this->getAttribute((isset($context["google"]) ? $context["google"] : null), "analytics", array(), "array", true, true)) {
            // line 148
            echo "    <script>
        var _gaq = [['_setAccount', '";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["google"]) ? $context["google"] : $this->getContext($context, "google")), "analytics", array(), "array"), "html", null, true);
            echo "'], ['_trackPageview']];
        (function(d, t) {
            var g = d.createElement(t),
                s = d.getElementsByTagName(t)[0];
            g.async = g.src = '//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g, s);
        }(document, 'script'));
    </script>
    ";
        }
        // line 158
        echo "
    ";
        // line 163
        echo "
    ";
        // line 165
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0222968_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_0") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-tooltip_1.js");
            // line 185
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_1") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-affix_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_2") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-alert_3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_3") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-button_4.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_4") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-carousel_5.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_5") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-collapse_6.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_6") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-dropdown_7.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_7") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-modal_8.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_8") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-popover_9.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_9") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-scrollspy_10.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_10") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-tab_11.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_11") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_bootstrap-transition_12.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_12") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_mopabootstrap-collection_13.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_13") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_mopabootstrap-subnav_14.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_14") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_html5bp_plugins_15.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_15"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_15") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_html5bp_script_16.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0222968_16"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968_16") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled_eyecon-bootstrap-datepicker_17.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "0222968"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0222968") : $this->env->getExtension('assets')->getAssetUrl("js/foot_compiled.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 187
        echo "\t";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle::base_initializr.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  506 => 187,  396 => 185,  391 => 165,  388 => 163,  385 => 158,  373 => 149,  370 => 148,  367 => 147,  365 => 145,  358 => 138,  356 => 136,  353 => 135,  346 => 132,  343 => 131,  336 => 128,  333 => 127,  329 => 135,  326 => 134,  324 => 131,  321 => 130,  318 => 127,  315 => 126,  310 => 123,  307 => 122,  303 => 118,  289 => 116,  284 => 112,  281 => 111,  277 => 109,  274 => 108,  260 => 106,  255 => 102,  252 => 101,  246 => 97,  243 => 96,  237 => 44,  233 => 25,  224 => 23,  219 => 22,  216 => 21,  211 => 119,  209 => 111,  206 => 110,  203 => 96,  200 => 94,  197 => 90,  194 => 88,  188 => 86,  186 => 85,  180 => 83,  177 => 82,  174 => 81,  171 => 80,  168 => 79,  165 => 78,  162 => 77,  159 => 76,  156 => 75,  153 => 74,  150 => 73,  147 => 71,  141 => 69,  138 => 68,  132 => 66,  129 => 65,  126 => 63,  120 => 61,  117 => 60,  112 => 57,  108 => 56,  105 => 55,  102 => 52,  99 => 48,  93 => 44,  85 => 41,  81 => 39,  77 => 38,  73 => 37,  70 => 36,  66 => 32,  63 => 26,  60 => 21,  56 => 17,  53 => 15,  50 => 14,  41 => 4,  38 => 3,  11 => 1,);
    }
}
