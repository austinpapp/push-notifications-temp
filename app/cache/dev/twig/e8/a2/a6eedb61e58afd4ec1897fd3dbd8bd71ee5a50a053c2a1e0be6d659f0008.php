<?php

/* CivixFrontBundle:Reports:eventDetails.html.twig */
class __TwigTemplate_e8a2a6eedb61e58afd4ec1897fd3dbd8bd71ee5a50a053c2a1e0be6d659f0008 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Reports:eventDetails.html.twig", 1);
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
        echo "Reports - Events";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"page-header\">
        <h4><small>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "title", array()), "html", null, true);
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
            <div class=\"span2 text-info\"></div>
            </td>
        </tr>
        <tr>
            <td>
            <table class=\"table table-bordered user-line\">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
        ";
            // line 35
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
                // line 36
                echo "            ";
                if (($this->getAttribute($context["loop"], "index", array()) == 6)) {
                    // line 37
                    echo "            <tr>
                <td colspan=\"4\">
                    <button class=\"btn btn-primary\">See More</button>
                </td>
            <tr>
            ";
                }
                // line 43
                echo "            <tr ";
                if (($this->getAttribute($context["loop"], "index", array()) > 5)) {
                    echo "style=\"display:none\"";
                }
                echo ">
                ";
                // line 44
                if (($this->getAttribute($context["answer"], "privacy", array()) == 0)) {
                    // line 45
                    echo "                    <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "username", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 46
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "email", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 47
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "address1", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "address2", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "city", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "state", array()), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "country", array()), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 48
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "phone", array()), "html", null, true);
                    echo "</td>
                ";
                } else {
                    // line 50
                    echo "                    <td>Anonymous</td>
                    <td colspan=\"3\">No permission provided</td>
                ";
                }
                // line 53
                echo "            </tr>
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
            // line 55
            echo "            </tbody>
         </table>
            </td>
        </tr>
        </tbody>
    </table>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "</div>
";
    }

    // line 64
    public function block_foot_script($context, array $blocks = array())
    {
        // line 65
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 66
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0d644e4_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0d644e4_0") : $this->env->getExtension('assets')->getAssetUrl("js/0d644e4_event.report_1.js");
            // line 69
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "0d644e4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0d644e4") : $this->env->getExtension('assets')->getAssetUrl("js/0d644e4.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Reports:eventDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 69,  197 => 66,  192 => 65,  189 => 64,  184 => 62,  172 => 55,  157 => 53,  152 => 50,  147 => 48,  135 => 47,  131 => 46,  126 => 45,  124 => 44,  117 => 43,  109 => 37,  106 => 36,  89 => 35,  70 => 19,  63 => 17,  58 => 15,  52 => 11,  48 => 10,  43 => 8,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
