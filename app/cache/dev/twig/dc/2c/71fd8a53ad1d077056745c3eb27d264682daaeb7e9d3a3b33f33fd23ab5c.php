<?php

/* CivixFrontBundle:Superuser:manageStateGroups.html.twig */
class __TwigTemplate_dc2c71fd8a53ad1d077056745c3eb27d264682daaeb7e9d3a3b33f33fd23ab5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:manageStateGroups.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
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
        echo "State Groups";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"row\">
        <div class=\"span12\">
            <div class=\"btn-group bottom\">
                <button class=\"btn\">";
        // line 9
        echo twig_escape_filter($this->env, (((isset($context["countryGroup"]) ? $context["countryGroup"] : $this->getContext($context, "countryGroup"))) ? ($this->getAttribute((isset($context["countryGroup"]) ? $context["countryGroup"] : $this->getContext($context, "countryGroup")), "officialName", array())) : ("Select the country group")), "html", null, true);
        echo "</button>
                <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                    <span class=\"caret\"></span>
                </button>
                <ul class=\"dropdown-menu\">
                    ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["countryGroups"]) ? $context["countryGroups"] : $this->getContext($context, "countryGroups")));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 15
            echo "                        <li";
            if (((isset($context["countryGroup"]) ? $context["countryGroup"] : $this->getContext($context, "countryGroup")) == $context["group"])) {
                echo " class=\"disabled\"";
            }
            echo ">
                            <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_country_groups_children", array("id" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "officialName", array()), "html", null, true);
            echo "</a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "                </ul>
            </div>
            ";
        // line 21
        if ((isset($context["countryGroup"]) ? $context["countryGroup"] : $this->getContext($context, "countryGroup"))) {
            // line 22
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_group_switch", array("id" => $this->getAttribute((isset($context["countryGroup"]) ? $context["countryGroup"] : $this->getContext($context, "countryGroup")), "id", array()))), "html", null, true);
            echo "\" title=\"Manage\"><i class=\"icon-wrench\"></i>Manage</a>
            ";
        }
        // line 24
        echo "            ";
        if ((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) {
            // line 25
            echo "            <br><br>
            <table class=\"table table-bordered table-striped\">
                <thead>
                    <tr>
                        <th class=\"span1\">";
            // line 29
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Id", "g.id");
            echo "</th>
                        <th class=\"span5\">";
            // line 30
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Official Name", "g.officialName");
            echo "</th>
                        <th class=\"span4\">";
            // line 31
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Location Name", "g.locationName");
            echo "</th>
                        <th class=\"span2\">Options</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 37
                echo "                    <tr>
                        <td>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 39
                if ($this->getAttribute($context["group"], "officialName", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "officialName", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "locationName", array()), "html", null, true);
                }
                echo "</td>
                        <td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "locationName", array()), "html", null, true);
                echo "</td>
                        <td class=\"table-options\">
                           <a href=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_group_switch", array("id" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
                echo "\" title=\"Manage\"><i class=\"icon-wrench\"></i>Manage</a>
                        </td>
                    </tr>
                    ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 46
                echo "                    <tr>
                        <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "                </tbody>
            </table>

            <div class=\"navigation\">
                ";
            // line 54
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
            </div>
            ";
        }
        // line 57
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:manageStateGroups.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 57,  159 => 54,  153 => 50,  144 => 46,  135 => 42,  130 => 40,  122 => 39,  118 => 38,  115 => 37,  110 => 36,  102 => 31,  98 => 30,  94 => 29,  88 => 25,  85 => 24,  79 => 22,  77 => 21,  73 => 19,  62 => 16,  55 => 15,  51 => 14,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
