<?php

/* CivixFrontBundle::educational-context.html.twig */
class __TwigTemplate_12c3a2b9a1c09939245bdea9f80f95af9954014f35281fdf8474376e40ebfb68 extends Twig_Template
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
        echo "<div class=\"row\">
    <div class=\"span11\"><h5>Educational Context</h5></div>
    <div class=\"span1\"><h5>Remove</h5></div>
</div>
<script id=\"educational-item-row-tpl\" type=\"text/template\">
    <td>";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "items", array()), "vars", array()), "prototype", array()), 'row');
        echo "</td>
    <td style=\"text-align: center\"><a href=\"#\" class=\"remove-educational-item\"><i class=\"icon-remove\"></i></a></td>
</script>
<table id=\"educational-context-items\" class=\"table table-striped\">
    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "items", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 11
            echo "
    ";
            // line 12
            if (($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "vars", array()), "value", array()), "isEmpty", array(), "method") == false)) {
                // line 13
                echo "        <tr>
            <td>
                ";
                // line 15
                if ($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "text", array()), "vars", array()), "value", array())) {
                    // line 16
                    echo "                    ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["item"], "text", array()), 'row');
                    echo "
                ";
                } elseif ($this->getAttribute($this->getAttribute($this->getAttribute(                // line 17
$context["item"], "video", array()), "vars", array()), "value", array())) {
                    // line 18
                    echo "                    ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["item"], "video", array()), 'row');
                    echo "
                ";
                } else {
                    // line 20
                    echo "                    ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "image", array()), "vars", array()), "value", array())) {
                        // line 21
                        echo "                        <img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('vich_uploader')->asset($this->getAttribute($this->getAttribute($context["item"], "vars", array()), "value", array()), "imageFile"), "html", null, true);
                        echo "\" />
                    ";
                    }
                    // line 23
                    echo "                    ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["item"], "imageFile", array()), 'row');
                    echo "
                    ";
                    // line 24
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["item"], "image", array()), 'row');
                    echo "
                ";
                }
                // line 26
                echo "            </td>
            <td style=\"text-align: center\"><a href=\"#\" class=\"remove-educational-item\"><i class=\"icon-remove\"></i></a></td>
        </tr>
    ";
            }
            // line 30
            echo "    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 31
            echo "        ";
            $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "items", array()), "setRendered", array(), "method");
            // line 32
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "</table>

<div id=\"educational-add-btn\" class=\"row";
        // line 35
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "items", array())) >= 3)) {
            echo " hide";
        }
        echo "\">
    <div class=\"span2\"><a href=\"#\" id=\"add-educational-text\" data-control=\".text-control\"><i class=\"icon-plus\"></i> Add text</a></div>
    <div class=\"span2\"><a href=\"#\" id=\"add-educational-image\" data-control=\".image-control\"><i class=\"icon-plus\"></i> Add picture</a></div>
    <div class=\"span2\"><a href=\"#\" id=\"add-educational-video\" data-control=\".video-control\"><i class=\"icon-plus\"></i> Add video link</a></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle::educational-context.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 35,  101 => 33,  95 => 32,  92 => 31,  87 => 30,  81 => 26,  76 => 24,  71 => 23,  65 => 21,  62 => 20,  56 => 18,  54 => 17,  49 => 16,  47 => 15,  43 => 13,  41 => 12,  38 => 11,  33 => 10,  26 => 6,  19 => 1,);
    }
}
