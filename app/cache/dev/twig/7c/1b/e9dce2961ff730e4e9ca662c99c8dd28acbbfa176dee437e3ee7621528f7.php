<?php

/* CivixFrontBundle:Group/fields:groupfields.html.twig */
class __TwigTemplate_7c1be9dce2961ff730e4e9ca662c99c8dd28acbbfa176dee437e3ee7621528f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/fields:groupfields.html.twig", 1);
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
        echo "Create required fields";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script id=\"option-row-tpl\" type=\"text/template\">
    <tr>
        <td><b></b>. ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["requiredFieldsForm"]) ? $context["requiredFieldsForm"] : $this->getContext($context, "requiredFieldsForm")), "fields", array()), "vars", array()), "prototype", array()), 'widget');
        echo "</td>
        <td style=\"text-align: center\"><a href=\"#\" class=\"remove-option\"><i class=\"icon-remove\"></i></a></td>
    </tr>
</script>
    <nav class=\"submenu\">
        ";
        // line 13
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("settingsMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
<div class=\"row\">
    <div class=\"span12\">
        ";
        // line 17
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isGroupJoinManagementAvailable", array())) {
            // line 18
            echo "        <form action=\"";
            echo $this->env->getExtension('routing')->getPath("civix_front_group_fields_update");
            echo "\" method=\"POST\" enctype=\"multipart/form-data\">
             <fieldset>
                <legend>Required fields</legend>
                ";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["requiredFieldsForm"]) ? $context["requiredFieldsForm"] : $this->getContext($context, "requiredFieldsForm")), 'errors');
            echo "
                <table id=\"editable-options-list\" class=\"table table-striped\">
                    <thead>
                        <tr>
                            <th></th>
                            <th class=\"span1\">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class=\"empty-table-message";
            // line 30
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["requiredFieldsForm"]) ? $context["requiredFieldsForm"] : $this->getContext($context, "requiredFieldsForm")), "fields", array())) > 0)) {
                echo " hide";
            }
            echo "\">
                            <td colspan=\"2\" style=\"text-align: center\"><b>Please add a few fields (max 5).</b></td>
                        </tr>
                        ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["requiredFieldsForm"]) ? $context["requiredFieldsForm"] : $this->getContext($context, "requiredFieldsForm")), "fields", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 34
                echo "                        <tr>
                            <td><b>";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</b>. ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["field"], 'widget');
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
                // line 39
                echo "                            ";
                $this->getAttribute($this->getAttribute((isset($context["requiredFieldsForm"]) ? $context["requiredFieldsForm"] : $this->getContext($context, "requiredFieldsForm")), "fields", array()), "setRendered", array(), "method");
                // line 40
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href=\"#\" class=\"add-option\"><i class=\"icon-plus\"></i> Add new field</a></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                ";
            // line 49
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["requiredFieldsForm"]) ? $context["requiredFieldsForm"] : $this->getContext($context, "requiredFieldsForm")), 'rest');
            echo "
                <div class=\"form-actions\">
                    <input type=\"submit\" class=\"btn btn-primary bt\" value=\"Save\" />
                </div>
            </fieldset>
        </form>
        ";
        } else {
            // line 56
            echo "            <h5>Not available for free account</h5>
        ";
        }
        // line 58
        echo "    </div>
</div>
";
    }

    // line 62
    public function block_foot_script($context, array $blocks = array())
    {
        // line 63
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 64
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "89c2569_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_89c2569_0") : $this->env->getExtension('assets')->getAssetUrl("js/89c2569_group.fields_1.js");
            // line 67
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "89c2569"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_89c2569") : $this->env->getExtension('assets')->getAssetUrl("js/89c2569.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/fields:groupfields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 67,  174 => 64,  169 => 63,  166 => 62,  160 => 58,  156 => 56,  146 => 49,  136 => 41,  130 => 40,  127 => 39,  108 => 35,  105 => 34,  87 => 33,  79 => 30,  67 => 21,  60 => 18,  58 => 17,  51 => 13,  43 => 8,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
