<?php

/* CivixFrontBundle:Group/members:approvals.html.twig */
class __TwigTemplate_7a16ab47ad26ad1ed07885bf2a91ba9d26a83ea6b6ea7be448eec3bb321857a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/members:approvals.html.twig", 1);
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
        ";
        // line 11
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isGroupJoinManagementAvailable", array())) {
            // line 12
            echo "        <table class=\"table table-bordered table-striped\">
            <thead>
                <tr>
                    <th class=\"span1\">";
            // line 15
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "ID", "u.id");
            echo "</th>
                    <th class=\"span6\">Name</th>
                    <th class=\"span2\">";
            // line 17
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Email", "u.email");
            echo "</th>
                    <th class=\"span3\">Options</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["gu"]) {
                // line 23
                echo "                    <tr>
                        <td>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "firstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "lastName", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "email", array()), "html", null, true);
                echo "</td>
                        <td>
                            <form class=\"form-link\" action=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_members_approve", array("id" => $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()))), "html", null, true);
                echo "\" method=\"POST\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("approve_members_" . $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()))), "html", null, true);
                echo "\">
                                <input type=\"submit\" class=\"btn btn-link\" value=\"Approve\" />
                            </form>
                            <form class=\"form-link\" action=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_members_remove", array("id" => $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()))), "html", null, true);
                echo "\" method=\"POST\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("remove_members_" . $this->getAttribute($this->getAttribute($context["gu"], "user", array()), "id", array()))), "html", null, true);
                echo "\">
                                <input type=\"submit\" class=\"btn btn-link\" value=\"Reject\" />
                            </form>
                       </td>
                    </tr>
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 39
                echo "                    <tr>
                        <td colspan=\"4\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "            </tbody>
        </table>
        <div class=\"navigation\">
            ";
            // line 46
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
        </div>
        ";
        } else {
            // line 49
            echo "            <h5>Not available for free account</h5>
        ";
        }
        // line 51
        echo "    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/members:approvals.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 51,  136 => 49,  130 => 46,  125 => 43,  116 => 39,  105 => 33,  101 => 32,  95 => 29,  91 => 28,  86 => 26,  80 => 25,  76 => 24,  73 => 23,  68 => 22,  60 => 17,  55 => 15,  50 => 12,  48 => 11,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
