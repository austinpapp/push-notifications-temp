<?php

/* CivixFrontBundle:Group/Sections:index.html.twig */
class __TwigTemplate_0ad456182e96a1122e3c01e7317898d2fea2cbf9645eb7709cc67236f00a4642 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/Sections:index.html.twig", 1);
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
        echo "Group Sections";
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
    ";
        // line 9
        if ((twig_length_filter($this->env, (isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections"))) < 5)) {
            // line 10
            echo "    <nav class=\"submenu\">
        <ul class=\"nav nav-pills pull-right\">
            <li class=\"first last\">
                <a href=\"";
            // line 13
            echo $this->env->getExtension('routing')->getPath("civix_front_group_sections_new");
            echo "\">Create new group section</a>
            </li>
        </ul>
    </nav>
    ";
        }
        // line 18
        echo "
<div class=\"row\">
    ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 21
            echo "    <div class=\"span12\">
        <h4><a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_sections_view", array("id" => $this->getAttribute($context["section"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "title", array()), "html", null, true);
            echo "</a></h4>
        <table class=\"table table-bordered table-striped\">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            ";
            // line 28
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute($context["section"], "users", array()), 0, 5));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 29
                echo "                <tr>
                    <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "firstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
                echo "</td>
                </tr>
            ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 34
                echo "                <tr>
                    <td colspan=\"2\" style=\"text-align: center\">No users in section.</td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "            ";
            if (($this->getAttribute($this->getAttribute($context["section"], "users", array()), "count", array(), "method") > 5)) {
                // line 39
                echo "                <tr>
                    <td colspan=\"2\">
                        <p class=\"text-right\"><a href=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_group_sections_view", array("id" => $this->getAttribute($context["section"], "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-link\">View all</a></p>
                    </td>
                </tr>
            ";
            }
            // line 45
            echo "        </table>

    </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 49
            echo "        <div  class=\"span12\" style=\"text-align: center\">No group sections.</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/Sections:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 51,  137 => 49,  129 => 45,  122 => 41,  118 => 39,  115 => 38,  106 => 34,  98 => 31,  92 => 30,  89 => 29,  84 => 28,  73 => 22,  70 => 21,  65 => 20,  61 => 18,  53 => 13,  48 => 10,  46 => 9,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
