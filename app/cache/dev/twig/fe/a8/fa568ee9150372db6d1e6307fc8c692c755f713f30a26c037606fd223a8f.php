<?php

/* CivixFrontBundle:Group/Sections:view.html.twig */
class __TwigTemplate_fea8fa568ee9150372db6d1e6307fc8c692c755f713f30a26c037606fd223a8f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/Sections:view.html.twig", 1);
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
        echo "Group Section - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "title", array()), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("groupMemberMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    <nav class=\"submenu\">
        <ul class=\"nav nav-pills pull-right\">
            <li class=\"first last\">
                <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_sections_edit", array("id" => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id", array()))), "html", null, true);
        echo "\">Edit</a>
            </li>
            <li>
                <a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("civix_front_group_sections_index");
        echo "\">Back to list</a>
            </li>
        </ul>
    </nav>
    <div class=\"row\">

        <div class=\"span12\">
            <h4>Assign to group section:</h4>
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th class=\"span6\">";
        // line 26
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Name", "u.firstName");
        echo "</th>
                    <th class=\"span2\">";
        // line 27
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Email", "u.email");
        echo "</th>
                    <th class=\"span3\">Options</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 33
            echo "                    <tr>
                        <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
                        <td><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_sections_assign", array("id" => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id", array()), "user_id" => $this->getAttribute($context["user"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\">assign</a></td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 39
            echo "                    <tr>
                        <td colspan=\"3\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                </tbody>
            </table>
            <div class=\"navigation\">
                ";
        // line 46
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
            </div>
        </div>

        <div class=\"span12\">
            <h4>Users assigned to ";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "title", array()), "html", null, true);
        echo "</h4>
            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "users", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 59
            echo "                    <tr>
                        <td>";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
                        <td><a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_sections_remove_user", array("id" => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id", array()), "user_id" => $this->getAttribute($context["user"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\">remove</a></td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 65
            echo "                    <tr>
                        <td colspan=\"3\" style=\"text-align: center\">No users in section.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "            </table>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/Sections:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 69,  166 => 65,  158 => 62,  154 => 61,  148 => 60,  145 => 59,  140 => 58,  130 => 51,  122 => 46,  117 => 43,  108 => 39,  100 => 36,  96 => 35,  90 => 34,  87 => 33,  82 => 32,  74 => 27,  70 => 26,  56 => 15,  50 => 12,  42 => 7,  39 => 6,  36 => 5,  29 => 3,  11 => 1,);
    }
}
