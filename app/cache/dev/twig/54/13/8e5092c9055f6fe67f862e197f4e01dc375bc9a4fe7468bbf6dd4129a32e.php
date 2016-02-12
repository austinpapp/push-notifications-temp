<?php

/* CivixFrontBundle:PaymentRequest:edit.html.twig */
class __TwigTemplate_54138e5092c9055f6fe67f862e197f4e01dc375bc9a4fe7468bbf6dd4129a32e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:PaymentRequest:edit.html.twig", 1);
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
        echo "Edit Payment Request";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form action=\"\" method=\"POST\" enctype=\"multipart/form-data\">
            <legend>Edit Payment Request</legend>
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()), "title", array()), 'row');
        echo "
            ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()), "subject", array()), 'row');
        echo "

            ";
        // line 13
        $this->loadTemplate("CivixFrontBundle:PaymentRequest:crowdfunding-fields.html.twig", "CivixFrontBundle:PaymentRequest:edit.html.twig", 13)->display(array_merge($context, array("form" => $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()))));
        // line 14
        echo "
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()), "isAllowOutsiders", array()), 'row');
        echo "

            <script id=\"option-row-tpl\" type=\"text/template\">
                <tr>
                    <td class=\"form-horizontal\"><b></b>. ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()), "options", array()), "vars", array()), "prototype", array()), 'widget');
        echo "</td>
                    <td style=\"text-align: center\"><a href=\"#\" class=\"remove-option\"><i class=\"icon-remove\"></i></a></td>
                </tr>
            </script>
            <table id=\"editable-options-list\" class=\"table table-striped\">
                <thead>
                <tr>
                    <th>Options</th>
                    <th class=\"span1\">Remove</th>
                </tr>
                </thead>
                <tbody>
                <tr class=\"empty-table-message";
        // line 31
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()), "options", array())) > 0)) {
            echo " hide";
        }
        echo "\">
                    <td colspan=\"2\" style=\"text-align: center\"><b>Please add a few options.</b></td>
                </tr>
                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()), "options", array()));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 35
            echo "                    <tr>
                        <td><b>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</b>. ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["option"], 'widget');
            echo "</td>
                        <td style=\"text-align: center\"><a href=\"#\" class=\"remove-option\"><i class=\"icon-remove\"></i></a></td>
                    </tr>
                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 40
            echo "                    ";
            $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()), "options", array()), "setRendered", array(), "method");
            // line 41
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                </tbody>
                <tfoot>
                <tr>
                    <td><a href=\"#\" class=\"add-option\"><i class=\"icon-plus\"></i> Add new option</a></td>
                    <td></td>
                </tr>
                </tfoot>
            </table>

            ";
        // line 51
        $this->loadTemplate("CivixFrontBundle::educational-context.html.twig", "CivixFrontBundle:PaymentRequest:edit.html.twig", 51)->display(array_merge($context, array("form" => $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "educationalContext", array()))));
        // line 52
        echo "
            ";
        // line 53
        if ((isset($context["isShowGroupSection"]) ? $context["isShowGroupSection"] : $this->getContext($context, "isShowGroupSection"))) {
            // line 54
            echo "                ";
            $this->loadTemplate("CivixFrontBundle::group-sections.html.twig", "CivixFrontBundle:PaymentRequest:edit.html.twig", 54)->display(array_merge($context, array("question" => $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "paymentRequest", array()))));
            // line 55
            echo "            ";
        }
        // line 56
        echo "            
            ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
            <div class=\"form-actions\">
                <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\">
                <a class=\"btn\" href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentrequest_index"));
        echo "\">Cancel</a>
            </div>

        </form>
    </div>
</div>
";
    }

    // line 68
    public function block_foot_script($context, array $blocks = array())
    {
        // line 69
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 70
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c22feca_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c22feca_0") : $this->env->getExtension('assets')->getAssetUrl("js/c22feca_question.create_1.js");
            // line 73
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "c22feca"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c22feca") : $this->env->getExtension('assets')->getAssetUrl("js/c22feca.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentRequest:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 73,  190 => 70,  185 => 69,  182 => 68,  171 => 60,  165 => 57,  162 => 56,  159 => 55,  156 => 54,  154 => 53,  151 => 52,  149 => 51,  138 => 42,  132 => 41,  129 => 40,  110 => 36,  107 => 35,  89 => 34,  81 => 31,  66 => 19,  59 => 15,  56 => 14,  54 => 13,  49 => 11,  45 => 10,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
