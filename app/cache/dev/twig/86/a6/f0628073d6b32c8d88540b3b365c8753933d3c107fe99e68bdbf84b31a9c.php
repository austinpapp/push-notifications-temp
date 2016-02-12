<?php

/* CivixFrontBundle:Representative:incomingAnswers.html.twig */
class __TwigTemplate_86a6f0628073d6b32c8d88540b3b365c8753933d3c107fe99e68bdbf84b31a9c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Representative:incomingAnswers.html.twig", 1);
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
        echo "Incoming Answers";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <table class=\"table table-bordered table-striped\">
            <thead>
                <tr>
                    <th class=\"span1\">";
        // line 11
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "ID", "q.id");
        echo "</th>
                    <th class=\"span7\">";
        // line 12
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Question Subject", "q.subject");
        echo "</th>
                    <th class=\"span4\">";
        // line 13
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Sender", "question.user.username");
        echo "</th>
                    <th class=\"span2\">";
        // line 14
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Published date", "q.publishedAt");
        echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 19
            echo "                <tr>
                    <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "id", array()), "html", null, true);
            echo "</td>
                    <td>
                        <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_representative_incoming_answers_details", array("id" => $this->getAttribute($context["question"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">
                            ";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "subject", array()), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["question"], "user", array()), "username", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["question"], "publishedAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 30
            echo "                <tr>
                    <td colspan=\"5\" style=\"text-align: center\">Table is empty.</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "            </tbody>
        </table>

        <div class=\"navigation\">
            ";
        // line 38
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative:incomingAnswers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 38,  108 => 34,  99 => 30,  91 => 27,  87 => 26,  81 => 23,  77 => 22,  72 => 20,  69 => 19,  64 => 18,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
