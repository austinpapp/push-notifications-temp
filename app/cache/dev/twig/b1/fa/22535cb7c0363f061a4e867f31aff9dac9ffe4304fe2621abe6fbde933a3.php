<?php

/* CivixFrontBundle:Superuser:manageLimits.html.twig */
class __TwigTemplate_b1fa22535cb7c0363f061a4e867f31aff9dac9ffe4304fe2621abe6fbde933a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:manageLimits.html.twig", 1);
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
        echo "Manage Limits";
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
                        <th class=\"span5\">Type</th>
                        <th class=\"span4\">Limit</th>
                        <th class=\"span2\"></th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["limit"]) {
            // line 21
            echo "                    <tr>
                        <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["limit"], "questionTypeName", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["limit"], "questionLimit", array()), "html", null, true);
            echo "</td>
                        <td> <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_limit_edit", array("id" => $this->getAttribute($context["limit"], "id", array()))), "html", null, true);
            echo "\"
                               title=\"Edit\"><i class=\"icon-pencil\"></i>Edit</a>
                        </td>
                    </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 29
            echo "                    <tr>
                        <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "                </tbody>
            </table>

            <div class=\"navigation\">
                ";
        // line 37
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:manageLimits.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 37,  92 => 33,  83 => 29,  73 => 24,  69 => 23,  65 => 22,  62 => 21,  57 => 20,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
