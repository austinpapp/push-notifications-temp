<?php

/* CivixFrontBundle:Group:petition.html.twig */
class __TwigTemplate_7e2a10adee4310d0e8c1700808e27f5ff6d9e04c708217d30ced6f0dd7a13b78 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group:petition.html.twig", 1);
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
        echo "Micro-petitions";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("microPetitionMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    <div class=\"row\">
        <div class=\"span14\">
            <table class=\"table table-bordered table-striped\">
                <thead>
                <tr>
                    <th class=\"span1\">";
        // line 14
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "ID", "p.id");
        echo "</th>
                    <th class=\"span6\">";
        // line 15
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Title", "p.title");
        echo "</th>
                    <th class=\"span2\">";
        // line 16
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Created date", "p.createdAt");
        echo "</th>
                    <th class=\"span2\">";
        // line 17
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Expire date", "p.expireAt");
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
        foreach ($context['_seq'] as $context["_key"] => $context["petition"]) {
            // line 23
            echo "                    <tr>
                        <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["petition"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["petition"], "title", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["petition"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["petition"], "expireAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td class=\"table-options\">
                            <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_petitions_details", array("id" => $this->getAttribute($context["petition"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Results</a>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "                    <tr>
                        <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['petition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                </tbody>
            </table>

            <div class=\"navigation\">
                
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group:petition.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 37,  105 => 33,  96 => 29,  91 => 27,  87 => 26,  83 => 25,  79 => 24,  76 => 23,  71 => 22,  63 => 17,  59 => 16,  55 => 15,  51 => 14,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
