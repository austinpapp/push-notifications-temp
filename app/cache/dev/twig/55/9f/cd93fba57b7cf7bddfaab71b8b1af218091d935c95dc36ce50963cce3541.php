<?php

/* CivixFrontBundle:Superuser:statesSettings.html.twig */
class __TwigTemplate_559fcd93fba57b7cf7bddfaab71b8b1af218091d935c95dc36ce50963cce3541 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:statesSettings.html.twig", 1);
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
        echo "Update represenatives from Cicero by State";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"row\">
        <div class=\"span12\">
            <form class=\"form-horizontal\" action=\"\" method=\"POST\">
                ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["settingsForm"]) ? $context["settingsForm"] : $this->getContext($context, "settingsForm")), 'widget');
        echo "
                <div class=\"form-actions\">
                    <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\">
                </div>
            </form>

            <table class=\"table table-bordered table-striped\">
                <thead>
                    <tr>
                        <th class=\"span2\">";
        // line 18
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "State", "state");
        echo "</th>
                        <th class=\"span4\">Representatives for update</th>
                        <th class=\"span2\">Last update</th>
                        <th class=\"span2\">Options</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["stateRecord"]) {
            // line 26
            echo "                    <tr>
                        <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["stateRecord"], 0, array(), "array"), "code", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["stateRecord"], "stcount", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["stateRecord"], "lastUpdatedAt", array()), "html", null, true);
            echo "</td>
                        <td class=\"table-options\">
                           ";
            // line 31
            if (($this->getAttribute($context["stateRecord"], "stcount", array()) > 0)) {
                // line 32
                echo "                           <form class=\"form-link\" action=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_settings_states_update", array("state" => $this->getAttribute($this->getAttribute($context["stateRecord"], 0, array(), "array"), "code", array()))), "html", null, true);
                echo "\" method=\"POST\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("state_repr_update_" . $this->getAttribute($this->getAttribute($context["stateRecord"], 0, array(), "array"), "code", array()))), "html", null, true);
                echo "\">
                                <button type=\"submit\" class=\"btn btn-link\">Update</button>
                           </form>
                           ";
            } else {
                // line 37
                echo "                                <button class=\"btn btn-link disabled\">Update</button>
                           ";
            }
            // line 39
            echo "                        </td>
                    </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 42
            echo "                    <tr>
                        <td colspan=\"4\" style=\"text-align: center\">Table is empty.</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stateRecord'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                </tbody>
            </table>

            <div class=\"navigation\">
                ";
        // line 50
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:statesSettings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 50,  120 => 46,  111 => 42,  104 => 39,  100 => 37,  93 => 33,  88 => 32,  86 => 31,  81 => 29,  77 => 28,  73 => 27,  70 => 26,  65 => 25,  55 => 18,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
