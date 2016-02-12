<?php

/* CivixFrontBundle:Superuser:manageGroups.html.twig */
class __TwigTemplate_a499b4e8b20008b8a5b71d9b279ab29cfcc16b6cda94b1cd9d3bfa65b5b2806d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:manageGroups.html.twig", 1);
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
        echo "Manage Groups";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("manageMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
            <table class=\"table table-bordered table-striped\">
                <thead>
                    <tr>
                        <th class=\"span1\">";
        // line 14
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Id", "g.id");
        echo "</th>
                        <th class=\"span5\">Official name</th>
                        <th class=\"span4\">Email</th>
                        <th class=\"span2\">Options</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 22
            echo "                    <tr>
                        <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 24
            if ($this->getAttribute($context["group"], "officialName", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "officialName", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "username", array()), "html", null, true);
            }
            echo "</td>
                        <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "managerEmail", array()), "html", null, true);
            echo "</td>
                        <td class=\"table-options\"><form action=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_group_remove", array("id" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
            echo "\" method=\"POST\"><input type=\"hidden\" name=\"_token\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("remove_group_" . $this->getAttribute($context["group"], "id", array()))), "html", null, true);
            echo "\"><input type=\"submit\" class=\"btn btn-link\" value=\"Remove\" /></form>
                            <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_group_limits", array("id" => $this->getAttribute($context["group"], "id", array()))), "html", null, true);
            echo "\" title=\"Limits\"><i class=\"icon-wrench\"></i>Limits</a>
                        </td>
                    </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 31
            echo "                    <tr>
                        <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                </tbody>
            </table>

            <div class=\"navigation\">
                ";
        // line 39
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:manageGroups.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 39,  109 => 35,  100 => 31,  91 => 27,  85 => 26,  81 => 25,  73 => 24,  69 => 23,  66 => 22,  61 => 21,  51 => 14,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
