<?php

/* MopaBootstrapBundle:Navbar:navbar.html.twig */
class __TwigTemplate_9ab791d37939a0a4756ade1bc706ec1990d2d30880196802bb976d862aa5ee08 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navbar' => array($this, 'block_navbar'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('navbar', $context, $blocks);
    }

    public function block_navbar($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"navbar";
        echo ((($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasOption", array(0 => "inverse"), "method") && $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "inverse"), "method"))) ? (" navbar-inverse") : (""));
        echo ((($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasOption", array(0 => "fixedTop"), "method") && $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "fixedTop"), "method"))) ? (" navbar-fixed-top") : (""));
        echo ((($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasOption", array(0 => "staticTop"), "method") && $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "staticTop"), "method"))) ? (" navbar-static-top") : (""));
        echo "\">
    <div class=\"navbar-inner\">
        <div class=\"container";
        // line 4
        echo ((($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasOption", array(0 => "isFluid"), "method") && $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "isFluid"), "method"))) ? ("-fluid") : (""));
        echo "\">
            <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </a>
            ";
        // line 10
        if ($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasOption", array(0 => "title"), "method")) {
            echo "<a class=\"brand\" href=\"";
            echo $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "titleRoute"), "method"));
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "title", array()), $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "title"), "method"))) : ($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getOption", array(0 => "title"), "method"))), "html", null, true);
            echo "</a>";
        }
        // line 11
        echo "            <div class=\"nav-collapse\">
                ";
        // line 12
        echo (($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasMenu", array(0 => "leftmenu"), "method")) ? ($this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "leftmenu"), "method"), array("currentClass" => "active", "ancestorClass" => "active", "allow_safe_labels" => "true"))) : (""));
        echo "
                ";
        // line 13
        if ($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasFormView", array(0 => "searchform"), "method")) {
            // line 14
            $context["form_view"] = $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getFormView", array(0 => "searchform"), "method");
            // line 15
            $context["form_type"] = $this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getFormType", array(0 => "searchform"), "method");
            // line 16
            $context["form_attrs"] = $this->getAttribute($this->getAttribute((isset($context["form_view"]) ? $context["form_view"] : $this->getContext($context, "form_view")), "vars", array()), "attr", array());
            // line 17
            echo "<form class=\"navbar-search pull-";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form_attrs"]) ? $context["form_attrs"] : null), "pull", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form_attrs"]) ? $context["form_attrs"] : null), "pull", array()), "left")) : ("left")), "html", null, true);
            echo "\" method=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["form_attrs"]) ? $context["form_attrs"] : null), "method", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["form_attrs"]) ? $context["form_attrs"] : null), "method", array()), "post")) : ("post")), "html", null, true);
            echo "\" action=\"";
            echo $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getFormRoute", array(0 => "searchform"), "method"));
            echo "\">
                    ";
            // line 18
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form_view"]) ? $context["form_view"] : $this->getContext($context, "form_view")), 'form');
            echo "
                    </form>
                ";
        }
        // line 21
        echo "                ";
        echo (($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "hasMenu", array(0 => "rightmenu"), "method")) ? ($this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["navbar"]) ? $context["navbar"] : $this->getContext($context, "navbar")), "getMenu", array(0 => "rightmenu"), "method"), array("currentClass" => "active", "ancestorClass" => "active", "allow_safe_labels" => "true"))) : (""));
        echo "
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Navbar:navbar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  81 => 21,  75 => 18,  66 => 17,  64 => 16,  62 => 15,  60 => 14,  58 => 13,  54 => 12,  51 => 11,  43 => 10,  34 => 4,  26 => 2,  20 => 1,);
    }
}
