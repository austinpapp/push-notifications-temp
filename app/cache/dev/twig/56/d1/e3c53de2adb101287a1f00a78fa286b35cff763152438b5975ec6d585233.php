<?php

/* MopaBootstrapBundle::macros.html.twig */
class __TwigTemplate_56d1e3c53de2adb101287a1f00a78fa286b35cff763152438b5975ec6d585233 extends Twig_Template
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
        // line 4
        echo "
";
        // line 9
        echo "

";
    }

    // line 1
    public function getbadge($__text__ = null, $__type__ = null, $__use_raw__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "text" => $__text__,
            "type" => $__type__,
            "use_raw" => $__use_raw__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "<span class=\"badge ";
            echo twig_escape_filter($this->env, ((((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), false)) : (false))) ? (("badge-" . (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")))) : ("")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((((array_key_exists("use_raw", $context)) ? (_twig_default_filter((isset($context["use_raw"]) ? $context["use_raw"] : $this->getContext($context, "use_raw")), false)) : (false))) ? ((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text"))) : ((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text")))), "html", null, true);
            echo "</span>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 5
    public function getlabel($__text__ = null, $__type__ = null, $__use_raw__ = null, $__block__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "text" => $__text__,
            "type" => $__type__,
            "use_raw" => $__use_raw__,
            "block" => $__block__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 6
            $context["tag"] = ((((array_key_exists("block", $context)) ? (_twig_default_filter((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), false)) : (false))) ? ("div") : ("span"));
            // line 7
            echo "<";
            echo twig_escape_filter($this->env, (isset($context["tag"]) ? $context["tag"] : $this->getContext($context, "tag")), "html", null, true);
            echo " class=\"label ";
            echo twig_escape_filter($this->env, ((((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), false)) : (false))) ? (("label-" . (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")))) : ("")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((((array_key_exists("use_raw", $context)) ? (_twig_default_filter((isset($context["use_raw"]) ? $context["use_raw"] : $this->getContext($context, "use_raw")), false)) : (false))) ? ((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text"))) : ((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text")))), "html", null, true);
            echo "</";
            echo twig_escape_filter($this->env, (isset($context["tag"]) ? $context["tag"] : $this->getContext($context, "tag")), "html", null, true);
            echo ">
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 11
    public function getprogressBar($__class__ = null, $__width__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "width" => $__width__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 12
            echo "<div class=\"progress ";
            echo twig_escape_filter($this->env, ((array_key_exists("class", $context)) ? (_twig_default_filter((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "")) : ("")), "html", null, true);
            echo "\">
    <div class=\"bar\" style=\"width: ";
            // line 13
            echo twig_escape_filter($this->env, ((array_key_exists("width", $context)) ? (_twig_default_filter((isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), 0)) : (0)), "html", null, true);
            echo "%;\"></div>
</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle::macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 13,  105 => 12,  93 => 11,  73 => 7,  71 => 6,  57 => 5,  41 => 2,  28 => 1,  22 => 9,  19 => 4,);
    }
}
