<?php

/* CivixFrontBundle:Group/members:members.html.twig */
class __TwigTemplate_db304f8ddc000b94bf0aa04ab8ea8ba3375f92ac6a1f28a75e3db72b6520c882 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/members:members.html.twig", 1);
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
        echo "Group members";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<nav class=\"submenu\">
    ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("groupMemberMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
</nav>
<div class=\"row\">
    <div class=\"span12\">
        <table class=\"table table-bordered table-striped\">
            <thead>
                <tr>
                    <th class=\"span1\">";
        // line 14
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "ID", "u.id");
        echo "</th>
                    <th class=\"span6\">Name</th>
                    <th class=\"span2\">";
        // line 16
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Email", "u.email");
        echo "</th>
                    <th class=\"span3\">
                        Options
                        ";
        // line 19
        if (($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isGroupJoinManagementAvailable", array()) == false)) {
            // line 20
            echo "                            <br> (<i>not available for free account</i>)
                        ";
        }
        // line 22
        echo "                    </th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["gu"]) {
            // line 27
            echo "                    <tr>
                        <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()), "html", null, true);
            echo "</td>
                        <td><a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_members_fields", array("id" => $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()))), "html", null, true);
            echo "\">
                            ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "lastName", array()), "html", null, true);
            echo "
                            </a>
                        </td>
                        <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "email", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 35
            if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isGroupJoinManagementAvailable", array())) {
                // line 36
                echo "                                <form action=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_members_remove", array("id" => $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()))), "html", null, true);
                echo "\" method=\"POST\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("remove_members_" . $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()))), "html", null, true);
                echo "\">
                                    <input type=\"submit\" class=\"btn btn-link\" value=\"Remove\" />
                                </form>
                            ";
            }
            // line 41
            echo "                       </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 44
            echo "                    <tr>
                        <td colspan=\"4\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "            </tbody>
        </table>
        <div class=\"navigation\">
            ";
        // line 51
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/members:members.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 51,  133 => 48,  124 => 44,  117 => 41,  110 => 37,  105 => 36,  103 => 35,  98 => 33,  90 => 30,  86 => 29,  82 => 28,  79 => 27,  74 => 26,  68 => 22,  64 => 20,  62 => 19,  56 => 16,  51 => 14,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
