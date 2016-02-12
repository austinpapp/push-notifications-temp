<?php

/* CivixFrontBundle:Superuser:manageUsers.html.twig */
class __TwigTemplate_56a580232168ecd11375378670d1e7c1c4a9904223e905aef07f23ae1eeb6306 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:manageUsers.html.twig", 1);
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
        echo "Manage Users";
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
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Id", "u.id");
        echo "</th>
                        <th class=\"span3\">";
        // line 15
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Username", "u.username");
        echo "</th>
                        <th class=\"span3\">Name</th>
                        <th class=\"span3\">";
        // line 17
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Email", "u.email");
        echo "</th>
                        <th class=\"span2\">Options</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 23
            echo "                    <tr>
                        <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
                        <td>
                            <a style=\"margin-left: 13px;\" href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_reset_user_password", array("id" => $this->getAttribute($context["user"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\">Reset password</a>
                            <form action=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_user_remove", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
            echo "\" method=\"POST\"><input type=\"hidden\" name=\"_token\" value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("remove_user_" . $this->getAttribute($context["user"], "id", array()))), "html", null, true);
            echo "\"><input type=\"submit\" class=\"btn btn-link\" value=\"Remove\" /></form>
                        </td>
                    </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 34
            echo "                    <tr>
                        <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                </tbody>
            </table>

            <div class=\"navigation\">
                ";
        // line 42
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:manageUsers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 42,  119 => 38,  110 => 34,  99 => 30,  95 => 29,  90 => 27,  84 => 26,  80 => 25,  76 => 24,  73 => 23,  68 => 22,  60 => 17,  55 => 15,  51 => 14,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
