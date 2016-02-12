<?php

/* CivixFrontBundle:Reports:membership.html.twig */
class __TwigTemplate_f8990c4053d84157b57c3443dc76269e29898e3ab7c62062b76f82cf279b06ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Reports:membership.html.twig", 1);
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
        echo "Reports - Membership";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
<div class=\"control-group pull-right\">
    <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("civix_front_group_report_downloadmembership");
        echo "\"><button class=\"btn btn-success\">Download</button></a>
</div>
<div class=\"row\">
    <div class=\"span12\">
        <table class=\"table table-bordered table-striped\">
            <thead>
                <tr>
                    ";
        // line 15
        if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_name"), "method")) {
            echo "<th class=\"span2\">Name</th>";
        }
        // line 16
        echo "                    ";
        if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_address"), "method")) {
            echo "<th class=\"span3\">Address</th>";
        }
        // line 17
        echo "                    ";
        if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_email"), "method")) {
            echo "<th class=\"span3\">Email</th>";
        }
        // line 18
        echo "                    ";
        if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_phone"), "method")) {
            echo "<th class=\"span3\">Phone Number</th>";
        }
        // line 19
        echo "                    <th class=\"span1\">Facebook</th>
                    <th class=\"span2\">Group division</th>
                    <th class=\"span2\">Answers</th>
                    <th class=\"span1\">Join date</th>
                    <th class=\"span1\">Followers</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["ug"]) {
            // line 28
            echo "                <tr>
                    ";
            // line 29
            if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_name"), "method")) {
                // line 30
                echo "                        <td>";
                if ($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "getPermissionsName", array(), "method")) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "fullname", array()), "html", null, true);
                }
                echo "</td>
                    ";
            }
            // line 32
            echo "
                    ";
            // line 33
            if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_address"), "method")) {
                // line 34
                echo "                        <td>
                            ";
                // line 35
                if ($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "getPermissionsAddress", array(), "method")) {
                    // line 36
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "address1", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "address2", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "city", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "state", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "country", array()), "html", null, true);
                    echo "
                            ";
                }
                // line 38
                echo "                        </td>
                    ";
            }
            // line 40
            echo "                    ";
            if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_email"), "method")) {
                // line 41
                echo "                        <td>";
                if ($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "getPermissionsEmail", array(), "method")) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "email", array()), "html", null, true);
                }
                echo "</td>
                    ";
            }
            // line 43
            echo "                    ";
            if ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "hasRequiredPermissions", array(0 => "permissions_phone"), "method")) {
                // line 44
                echo "                        <td>";
                if ($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "getPermissionsPhone", array(), "method")) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "phone", array()), "html", null, true);
                }
                echo "</td>
                    ";
            }
            // line 46
            echo "
                    <td>";
            // line 47
            if ($this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "facebookId", array())) {
                echo "Yes";
            } else {
                echo "No";
            }
            echo "</td>
                    <td>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["ug"], "groupDivision", array()), "html", null, true);
            echo "</td>
                    <td>
                        ";
            // line 50
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CivixFrontBundle:Group/Report:fields", array("user" => $this->getAttribute($this->getAttribute(            // line 51
$context["ug"], 0, array()), "user", array()))));
            // line 52
            echo "
                    </td>
                    <td>";
            // line 54
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["ug"], 0, array()), "createdAt", array()), "D, d M Y H:i:s"), "html", null, true);
            echo "</td>
                    <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "followers", array()), "count", array()), "html", null, true);
            echo "</td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 58
            echo "                <tr>
                    <td colspan=\"7\" style=\"text-align: center\">Table is empty.</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ug'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "            </tbody>
        </table>

        <div class=\"navigation\">
            ";
        // line 66
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Reports:membership.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 66,  193 => 62,  184 => 58,  176 => 55,  172 => 54,  168 => 52,  166 => 51,  165 => 50,  160 => 48,  152 => 47,  149 => 46,  141 => 44,  138 => 43,  130 => 41,  127 => 40,  123 => 38,  109 => 36,  107 => 35,  104 => 34,  102 => 33,  99 => 32,  91 => 30,  89 => 29,  86 => 28,  81 => 27,  71 => 19,  66 => 18,  61 => 17,  56 => 16,  52 => 15,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
