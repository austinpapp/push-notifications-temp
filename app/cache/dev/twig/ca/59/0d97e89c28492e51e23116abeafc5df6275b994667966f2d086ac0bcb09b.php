<?php

/* CivixFrontBundle:Reports:questionDetails.html.twig */
class __TwigTemplate_ca590d97e89c28492e51e23116abeafc5df6275b994667966f2d086ac0bcb09b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Reports:questionDetails.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
            'foot_script' => array($this, 'block_foot_script'),
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
        echo "Reports - Questions";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"page-header\">
        <h4><small>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "subject", array()), "html", null, true);
        echo "</small></h4>
    </div>
    ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 11
            echo "    <table class=\"table table-bordered\">
        <tbody>
        <tr>
            <td>
            <div class=\"span12\">";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "option", array()), "value", array()), "html", null, true);
            echo "</div>
            <div class=\"span9 progress\">
                <div class=\"bar\" style=\"background: ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "color", array()), "html", null, true);
            echo "; width: ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_answer", array()), "html", null, true);
            echo "%;\"></div>
            </div>
            <div class=\"span1\">";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_answer", array()), "html", null, true);
            echo "%</div>
            <div class=\"span2 text-info\"><i class=\"icon-comment\"></i> ";
            // line 20
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "option", array()), "answers", array())), "html", null, true);
            echo " Comments</div>
            </td>
        </tr>
        ";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["item"], "option", array()), "answers", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                // line 24
                echo "            ";
                if (($this->getAttribute($context["loop"], "index", array()) == 6)) {
                    // line 25
                    echo "            <tr>
                <td>
                    <div class=\"span2 offset10\"><button class=\"btn btn-primary\">See More</button></div>
                </td>
            <tr>
            ";
                }
                // line 31
                echo "            <tr ";
                if (($this->getAttribute($context["loop"], "index", array()) > 5)) {
                    echo "style=\"display:none\"";
                }
                echo ">
                <td>
                     <div class=\"span12\"><span class=\"text-info\">";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "username", array()), "html", null, true);
                echo "</span> ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "comment", array()), "html", null, true);
                echo "</div>
                </td>
            </tr>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "        </tbody>
    </table>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "</div>
";
    }

    // line 42
    public function block_foot_script($context, array $blocks = array())
    {
        // line 43
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 44
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ad32e0d_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ad32e0d_0") : $this->env->getExtension('assets')->getAssetUrl("js/ad32e0d_question.report_1.js");
            // line 47
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "ad32e0d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ad32e0d") : $this->env->getExtension('assets')->getAssetUrl("js/ad32e0d.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Reports:questionDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 47,  157 => 44,  152 => 43,  149 => 42,  144 => 40,  136 => 37,  116 => 33,  108 => 31,  100 => 25,  97 => 24,  80 => 23,  74 => 20,  70 => 19,  63 => 17,  58 => 15,  52 => 11,  48 => 10,  43 => 8,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
