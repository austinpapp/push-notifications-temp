<?php

/* CivixFrontBundle:Question:response.html.twig */
class __TwigTemplate_001062b1a8ac4736527bfb633a9401532132d403b659e94dcad25fcb1d25fe60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Question:response.html.twig", 1);
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
        echo "Question Response";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<nav class=\"submenu\">
    ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("questionMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
</nav>
<div class=\"row\">
    <div class=\"span12\">
        <table class=\"table table-bordered table-striped\">
            <thead>
                <tr>
                    <th class=\"span1\">";
        // line 14
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "ID", "q.id");
        echo "</th>
                    <th class=\"span7\">";
        // line 15
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Question Subject", "q.subject");
        echo "</th>
                    <th class=\"span2\">";
        // line 16
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Created date", "q.createdAt");
        echo "</th>
                    <th class=\"span2\">";
        // line 17
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Published date", "q.publishedAt");
        echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 22
            echo "                <tr>
                    <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "id", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "subject", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["question"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["question"], "publishedAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 29
            echo "                <tr>
                    <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "            </tbody>
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
        return "CivixFrontBundle:Question:response.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 37,  107 => 33,  98 => 29,  90 => 26,  86 => 25,  82 => 24,  78 => 23,  75 => 22,  70 => 21,  63 => 17,  59 => 16,  55 => 15,  51 => 14,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
