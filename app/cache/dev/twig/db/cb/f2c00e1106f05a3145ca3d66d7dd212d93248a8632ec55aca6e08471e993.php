<?php

/* CivixFrontBundle:Default:header.html.twig */
class __TwigTemplate_dbcbf2c00e1106f05a3145ca3d66d7dd212d93248a8632ec55aca6e08471e993 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header>
    <section>
        <h1>POWERLINE</h1>
    </section>
    <section>
        ";
        // line 6
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 7
            echo "            <div class=\"right-block\">
                <p>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "officialName", array()), "html", null, true);
            echo "</p>
                <p>
                    ";
            // line 10
            if ((isset($context["logoutPath"]) ? $context["logoutPath"] : $this->getContext($context, "logoutPath"))) {
                // line 11
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["logoutPath"]) ? $context["logoutPath"] : $this->getContext($context, "logoutPath")), 1, array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["logoutPath"]) ? $context["logoutPath"] : $this->getContext($context, "logoutPath")), 0, array(), "array"), "html", null, true);
                echo "</a>
                    ";
            } else {
                // line 13
                echo "                        <a href=\"";
                echo $this->env->getExtension('routing')->getPath((("civix_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_logout"));
                echo "\">Sign Out</a>
                    ";
            }
            // line 15
            echo "                </p>
            </div>
            <div class=\"right-block avatar\">
                <figure>
                    <a href=\"";
            // line 19
            echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["paths"]) ? $context["paths"] : $this->getContext($context, "paths")), "profile", array()), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(), "array"));
            echo "\">
                        ";
            // line 20
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "avatar", array())) {
                // line 21
                echo "                            <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "avatar"), "html", null, true);
                echo "\">
                        ";
            } else {
                // line 23
                echo "                            <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl(twig_constant("DEFAULT_AVATAR", $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()))), "html", null, true);
                echo "\">
                        ";
            }
            // line 25
            echo "                    </a>
                </figure>
            </div>
            <div class=\"right-block\">
                <a href=\"";
            // line 29
            echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["paths"]) ? $context["paths"] : $this->getContext($context, "paths")), "settings", array()), $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()), array(), "array"));
            echo "\">
                    <i class=\"icon-settings\"></i>
                </a>
            </div>
        ";
        }
        // line 34
        echo "    </section>
</header>";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Default:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 34,  82 => 29,  76 => 25,  70 => 23,  64 => 21,  62 => 20,  58 => 19,  52 => 15,  46 => 13,  38 => 11,  36 => 10,  31 => 8,  28 => 7,  26 => 6,  19 => 1,);
    }
}
