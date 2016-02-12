<?php

/* CivixFrontBundle:Superuser:manageLocalGroups.html.twig */
class __TwigTemplate_57311949564c4e2da4cec57c7b0ff01122aff670910b5d57b87da48c84926401 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:manageLocalGroups.html.twig", 1);
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
        echo "Local Groups";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"row\">
        <div class=\"span6\">
            <div class=\"btn-group bottom\">
                <button class=\"btn\">
                    ";
        // line 10
        echo twig_escape_filter($this->env, (((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup"))) ? ((($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "isCountryGroup", array(), "method")) ? ($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "officialName", array())) : ($this->getAttribute($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "parent", array()), "officialName", array())))) : ("Select the country group")), "html", null, true);
        echo "
                </button>
                <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                <span class=\"caret\"></span>
                </button>
                <ul class=\"dropdown-menu\">
                   ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["countryGroups"]) ? $context["countryGroups"] : $this->getContext($context, "countryGroups")));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 17
            echo "                   <li>
                       <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_local_groups_by_parent", array("id" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "officialName", array()), "html", null, true);
            echo "</a>
                   </li>
                   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "                </ul>
            </div>
            ";
        // line 23
        if ((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup"))) {
            // line 24
            echo "                <div class=\"btn-group bottom\">
                    <button class=\"btn\">";
            // line 25
            echo twig_escape_filter($this->env, ((((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")) && $this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "isStateGroup", array(), "method"))) ? ($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "officialName", array())) : ("Select the state group")), "html", null, true);
            echo "</button>
                    <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                        <span class=\"caret\"></span>
                    </button>
                    <ul class=\"dropdown-menu\">
                        ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "isCountryGroup", array(), "method")) ? ($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "children", array())) : ($this->getAttribute($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "parent", array()), "children", array()))));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 31
                echo "                            ";
                if ($this->getAttribute($context["group"], "isStateGroup", array(), "method")) {
                    // line 32
                    echo "                                <li>
                                    <a href=\"";
                    // line 33
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_local_groups_by_parent", array("id" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "officialName", array()), "html", null, true);
                    echo "</a>
                                </li>
                            ";
                }
                // line 36
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                    </ul>
                </div>
            ";
        }
        // line 40
        echo "        </div>
        ";
        // line 41
        if ((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup"))) {
            // line 42
            echo "        <div class=\"span6\">
            <div class=\"filterOfTable\">
                <label> Search:
                    <input type=\"text\" data-filter-input=\"#state-groups\" name=\"localsearch\" />
                </label>
            </div>
        </div>
        ";
        }
        // line 50
        echo "    </div>
 ";
        // line 51
        if ((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup"))) {
            // line 52
            echo "    <div class=\"row\">
        <div class=\"span12\">
            <table class=\"table table-bordered table-striped\" id=\"state-groups\">
                <thead>
                    <tr>
                        <th class=\"span1\">ID</th>
                        <th class=\"span5\">Official Name</th>
                        <th class=\"span4\">Location Name</th>
                        <th class=\"span2\">Options</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 64
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["selectedGroup"]) ? $context["selectedGroup"] : $this->getContext($context, "selectedGroup")), "children", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 65
                echo "                        ";
                if ($this->getAttribute($context["group"], "isLocalGroup", array(), "method")) {
                    // line 66
                    echo "                            <tr data-filter-item=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "officialName", array()), "html", null, true);
                    echo "\">
                                <td>";
                    // line 67
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
                    echo "</td>
                                <td>";
                    // line 68
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "officialName", array()), "html", null, true);
                    echo "</td>
                                <td>";
                    // line 69
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "locationName", array()), "html", null, true);
                    echo "</td>
                                <td class=\"table-options\">
                                    <a href=\"";
                    // line 71
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_local_groups_assign", array("group" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
                    echo "\" title=\"Limits\"><i class=\"icon-wrench\"></i>Assign</a>
                                </td>
                            </tr>
                        ";
                }
                // line 75
                echo "
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "                </tbody>
            </table>
        </div>
    </div>
";
        }
    }

    // line 84
    public function block_foot_script($context, array $blocks = array())
    {
        // line 85
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 86
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "45ac7f3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_45ac7f3_0") : $this->env->getExtension('assets')->getAssetUrl("js/45ac7f3_filter_1.js");
            // line 89
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "45ac7f3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_45ac7f3") : $this->env->getExtension('assets')->getAssetUrl("js/45ac7f3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:manageLocalGroups.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 89,  208 => 86,  203 => 85,  200 => 84,  191 => 77,  184 => 75,  177 => 71,  172 => 69,  168 => 68,  164 => 67,  159 => 66,  156 => 65,  152 => 64,  138 => 52,  136 => 51,  133 => 50,  123 => 42,  121 => 41,  118 => 40,  113 => 37,  107 => 36,  99 => 33,  96 => 32,  93 => 31,  89 => 30,  81 => 25,  78 => 24,  76 => 23,  72 => 21,  61 => 18,  58 => 17,  54 => 16,  45 => 10,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
