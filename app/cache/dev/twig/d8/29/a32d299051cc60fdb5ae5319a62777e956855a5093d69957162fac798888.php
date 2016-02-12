<?php

/* CivixFrontBundle:Question:details.html.twig */
class __TwigTemplate_d829a32d299051cc60fdb5ae5319a62777e956855a5093d69957162fac798888 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Question:details.html.twig", 1);
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
        echo "Question Details";
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

<div class=\"row q-results\">
    ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 12
            echo "        <div class=\"span12\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "option", array()), "value", array()), "html", null, true);
            echo "</div>
        <div class=\"span11\">
            <i style=\"background: ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "color", array()), "html", null, true);
            echo "; width: ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_width", array()), "html", null, true);
            echo "%;\"></i>
        </div>
        <div class=\"span1\">";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_answer", array()), "html", null, true);
            echo "%</div>
        <div class=\"span12\"><hr></div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "</div>

<div class=\"row\">
    <div class=\"span12\">
        <table class=\"table table-bordered table-striped\">
            <thead>
                <tr>
                    <th class=\"span3\">User</th>
                    <th class=\"span7\">";
        // line 27
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Comment", "a.comment");
        echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
            // line 32
            echo "                <tr>
                    <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "lastName", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "comment", array()), "html", null, true);
            echo "</td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 37
            echo "                <tr>
                    <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </tbody>
        </table>

        <div class=\"navigation\">
            ";
        // line 45
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Question:details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 45,  122 => 41,  113 => 37,  105 => 34,  99 => 33,  96 => 32,  91 => 31,  84 => 27,  74 => 19,  65 => 16,  58 => 14,  52 => 12,  48 => 11,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
