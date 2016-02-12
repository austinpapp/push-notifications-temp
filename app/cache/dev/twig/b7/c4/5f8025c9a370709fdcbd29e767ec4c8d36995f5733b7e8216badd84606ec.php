<?php

/* CivixFrontBundle:Group:openPetition.html.twig */
class __TwigTemplate_b7c45f8025c9a370709fdcbd29e767ec4c8d36995f5733b7e8216badd84606ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group:openPetition.html.twig", 1);
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
                    <th class=\"span3\">";
        // line 15
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Title", "p.title");
        echo "</th>
                    <th class=\"span4\">Subject</th>
                    <th class=\"span2\">";
        // line 17
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Created date", "p.createdAt");
        echo "</th>
                    <th class=\"span2\">";
        // line 18
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Expire date", "p.expireAt");
        echo "</th>
                    <th class=\"span2\">Options</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["petition"]) {
            // line 24
            echo "                    <tr>
                        <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["petition"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["petition"], "title", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["petition"], "petitionBody", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["petition"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["petition"], "expireAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td class=\"table-options\">
                            <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_petitions_boost", array("id" => $this->getAttribute($context["petition"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Boost</a>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 35
            echo "                    <tr>
                        <td colspan=\"6\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['petition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
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
        return "CivixFrontBundle:Group:openPetition.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 39,  110 => 35,  101 => 31,  96 => 29,  92 => 28,  88 => 27,  84 => 26,  80 => 25,  77 => 24,  72 => 23,  64 => 18,  60 => 17,  55 => 15,  51 => 14,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
