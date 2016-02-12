<?php

/* CivixFrontBundle:Question:index.html.twig */
class __TwigTemplate_fd18588b19c0fc2ce9650c9512dbc44d9ab7e716493ac47880966e3421253cf6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Question:index.html.twig", 1);
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
        echo "Question";
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
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "ID", "p.id");
        echo "</th>
                    <th class=\"span6\">";
        // line 15
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Question Subject", "p.subject");
        echo "</th>
                    <th class=\"span2\">";
        // line 16
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Created date", "p.createdAt");
        echo "</th>
                    <th class=\"span3\">Options</th>
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
                    <td class=\"table-options\">
                        <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_question_publish"), array("id" => $this->getAttribute($context["question"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Publish</a>
                        <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_question_edit"), array("id" => $this->getAttribute($context["question"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Edit</a>
                        <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_question_delete"), array("id" => $this->getAttribute($context["question"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Remove</a>
                    </td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "                <tr>
                    <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "            </tbody>
        </table>

        <div class=\"navigation\">
            ";
        // line 41
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Question:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 41,  114 => 37,  105 => 33,  96 => 29,  92 => 28,  88 => 27,  83 => 25,  79 => 24,  75 => 23,  72 => 22,  67 => 21,  59 => 16,  55 => 15,  51 => 14,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
