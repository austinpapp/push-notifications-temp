<?php

/* CivixFrontBundle::fields.html.twig */
class __TwigTemplate_d171ef7a4216528316b195429afeffa9dff10c1b20249bb44732022cd4977085 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'crop_image_widget' => array($this, 'block_crop_image_widget'),
            'file_widget' => array($this, 'block_file_widget'),
            'editable_avatar_widget' => array($this, 'block_editable_avatar_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('crop_image_widget', $context, $blocks);
        // line 6
        echo "

";
        // line 8
        $this->displayBlock('file_widget', $context, $blocks);
        // line 16
        echo "

";
        // line 18
        $this->displayBlock('editable_avatar_widget', $context, $blocks);
    }

    // line 1
    public function block_crop_image_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        ";
        $this->displayBlock("form_widget", $context, $blocks);
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 8
    public function block_file_widget($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        ob_start();
        // line 10
        echo "        <span class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
            <span class=\"btn btn-primary btn-small btn-file\"><span class=\"fileupload-new\">Select file</span><span class=\"fileupload-exists\">Change</span><input ";
        // line 11
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " type=\"file\" /></span>
            <span class=\"fileupload-preview\"></span>
        </span>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 18
    public function block_editable_avatar_widget($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        ob_start();
        // line 20
        echo "    <div class=\"edit-avatar-group\">

        ";
        // line 22
        if (twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "value", array()), "getAvatar", array()))) {
            // line 23
            echo "            ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "value", array()), "getType", array(), "method") == "group")) {
                // line 24
                echo "                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/civixfront/img/default_group.png"), "html", null, true);
                echo "\">
            ";
            } elseif (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 25
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "value", array()), "getType", array(), "method") == "representative")) {
                // line 26
                echo "                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/civixfront/img/default_representative.png"), "html", null, true);
                echo "\">
            ";
            } else {
                // line 28
                echo "                <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/civixfront/img/default_superuser.jpg"), "html", null, true);
                echo "\">
            ";
            }
            // line 30
            echo "        ";
        } else {
            // line 31
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "value", array()), "avatar"), "html", null, true);
            echo "\">
        ";
        }
        // line 33
        echo "        <div class=\"actions\">
            ";
        // line 34
        $this->displayBlock("form_widget", $context, $blocks);
        echo "
            <div class=\"clear\"></div>
        </div>
    </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle::fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  116 => 34,  113 => 33,  107 => 31,  104 => 30,  98 => 28,  92 => 26,  90 => 25,  85 => 24,  82 => 23,  80 => 22,  76 => 20,  73 => 19,  70 => 18,  61 => 11,  58 => 10,  55 => 9,  52 => 8,  44 => 3,  41 => 2,  38 => 1,  34 => 18,  30 => 16,  28 => 8,  24 => 6,  22 => 1,);
    }
}
