<?php

/* CivixFrontBundle:Reports:paymentDetails.html.twig */
class __TwigTemplate_c32e48304da3a431617070579798e491c321cdc411c410941370524378c8c400 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Reports:paymentDetails.html.twig", 1);
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
        echo "Reports - Payment request";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"row\">
    <div class=\"page-header\">
        <h4><small>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["question"]) ? $context["question"] : $this->getContext($context, "question")), "title", array()), "html", null, true);
        echo "</small></h4>
    </div>
    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            if (($this->getAttribute($this->getAttribute($context["item"], "option", array()), "value", array()) != "Ignore")) {
                // line 10
                echo "    <table class=\"table table-bordered\">
        <tbody>
        <tr>
            <td>
            <div class=\"span12\">";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "option", array()), "value", array()), "html", null, true);
                echo "</div>
            <div class=\"span9 progress\">
                <div class=\"bar\" style=\"background: ";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "color", array()), "html", null, true);
                echo "; width: ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "percent_answer", array()), "html", null, true);
                echo "%;\"></div>
            </div>
            <div class=\"span1\">";
                // line 18
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
                        <th>Amount, \$</th>
                        <th>Donation Date</th>
                    </tr>
                </thead>
                <tbody>
        ";
                // line 36
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
                    // line 37
                    echo "            ";
                    if (($this->getAttribute($context["loop"], "index", array()) == 6)) {
                        // line 38
                        echo "            <tr>
                <td colspan=\"6\">
                    <button class=\"btn btn-primary\">See More</button>
                </td>
            <tr>
            ";
                    }
                    // line 44
                    echo "            <tr ";
                    if (($this->getAttribute($context["loop"], "index", array()) > 5)) {
                        echo "style=\"display:none\"";
                    }
                    echo ">
                ";
                    // line 45
                    if (($this->getAttribute($context["answer"], "privacy", array()) == 0)) {
                        // line 46
                        echo "                    <td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "username", array()), "html", null, true);
                        echo "</td>
                    <td>";
                        // line 47
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "email", array()), "html", null, true);
                        echo "</td>
                    <td>";
                        // line 48
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
                        // line 49
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["answer"], "user", array()), "phone", array()), "html", null, true);
                        echo "</td>
                    <td>";
                        // line 50
                        echo twig_escape_filter($this->env, $this->getAttribute($context["answer"], "paymentAmount", array()), "html", null, true);
                        echo "</td>
                    <td>";
                        // line 51
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["answer"], "createdAt", array()), "D, d M Y H:i:s"), "html", null, true);
                        echo "</td>
                ";
                    } else {
                        // line 53
                        echo "                    <td>Anonymous</td>
                    <td colspan=\"5\">No permission provided</td>
                ";
                    }
                    // line 56
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
                // line 58
                echo "            </tbody>
         </table>
            </td>
        </tr>
        </tbody>
    </table>
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "</div>
";
    }

    // line 67
    public function block_foot_script($context, array $blocks = array())
    {
        // line 68
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 69
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0d644e4_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0d644e4_0") : $this->env->getExtension('assets')->getAssetUrl("js/0d644e4_event.report_1.js");
            // line 72
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
        return "CivixFrontBundle:Reports:paymentDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 72,  209 => 69,  204 => 68,  201 => 67,  196 => 65,  183 => 58,  168 => 56,  163 => 53,  158 => 51,  154 => 50,  150 => 49,  138 => 48,  134 => 47,  129 => 46,  127 => 45,  120 => 44,  112 => 38,  109 => 37,  92 => 36,  71 => 18,  64 => 16,  59 => 14,  53 => 10,  48 => 9,  43 => 7,  39 => 5,  36 => 4,  30 => 3,  11 => 1,);
    }
}
