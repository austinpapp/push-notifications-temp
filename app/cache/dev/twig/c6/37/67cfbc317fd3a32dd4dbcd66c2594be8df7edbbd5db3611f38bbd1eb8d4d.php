<?php

/* CivixFrontBundle:Representative:incomingAnswersDetails.html.twig */
class __TwigTemplate_c63767cfbc317fd3a32dd4dbcd66c2594be8df7edbbd5db3611f38bbd1eb8d4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Representative:incomingAnswersDetails.html.twig", 1);
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
        echo "
<div class=\"row q-results\">
    ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 9
            echo "        <div class=\"span12\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "option", array()), "value", array()), "html", null, true);
            echo "</div>
        <div class=\"span11\">
            <i style=\"background: ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "color", array()), "html", null, true);
            echo "; width: ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_width", array()), "html", null, true);
            echo "%;\"></i>
        </div>
        <div class=\"span1\">";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_answer", array()), "html", null, true);
            echo "%</div>
        <div class=\"span12\"><hr></div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "</div>

<div class=\"row\">
    <div class=\"span12\">
        <table class=\"table table-bordered table-striped\">
            <thead>
                <tr>
                    <th class=\"span3\">User</th>
                    <th class=\"span7\">";
        // line 24
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Comment", "a.comment");
        echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
            // line 29
            echo "                <tr>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "lastName", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "comment", array()), "html", null, true);
            echo "</td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 34
            echo "                <tr>
                    <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "            </tbody>
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
        return "CivixFrontBundle:Representative:incomingAnswersDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 42,  116 => 38,  107 => 34,  99 => 31,  93 => 30,  90 => 29,  85 => 28,  78 => 24,  68 => 16,  59 => 13,  52 => 11,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
