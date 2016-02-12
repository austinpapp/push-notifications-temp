<?php

/* CivixFrontBundle:Superuser:approvals.html.twig */
class __TwigTemplate_6590b8a5f31ceb1124c04a96a6fd954df5c724dae1a7b8a28fc5d8c88c0b99e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Superuser:approvals.html.twig", 1);
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
        echo "Approvals";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<section>
    <div class=\"row-fluid\">
        <div class=\"span12\">
            <h3>Manage approvals</h3>
        </div>
    </div>
    <div class=\"row-fluid\">
        <div class=\"span12\">
            <table class=\"table table-striped table-bordered\">
                <tr>
                    ";
        // line 17
        echo "                    <th>";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Id", "repr.id");
        echo "</th>
                    <th>Name</th>
                    <th";
        // line 19
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "repr.officialTitle"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Official Title", "repr.officialTitle");
        echo "</th>
                    <th>Official Phone</th>
                    <th>Email</th>
                    <th></th>
                </tr>

                ";
        // line 26
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        foreach ($context['_seq'] as $context["_key"] => $context["repr"]) {
            // line 27
            echo "                    <tr>
                        <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["repr"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["repr"], "firstname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["repr"], "lastname", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["repr"], "officialTitle", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["repr"], "officialPhone", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["repr"], "email", array()), "html", null, true);
            echo "</td>
                        <td>
                            <div class=\"form-link\">
                                <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_representative_edit", array("id" => $this->getAttribute($context["repr"], "id", array()))), "html", null, true);
            echo "\"
                                    title=\"Edit\"><i class=\"icon-pencil\"></i>Edit</a>
                            </div>
                            <form class=\"form-link\" action=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_representative_delete", array("id" => $this->getAttribute($context["repr"], "id", array()))), "html", null, true);
            echo "\" method=\"POST\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("representative_delete_" . $this->getAttribute($context["repr"], "id", array()))), "html", null, true);
            echo "\">
                                <i class=\"icon-trash\"></i>
                                <input type=\"submit\" class=\"btn-link\" value=\"Remove\" />
                            </form>
                            <form class=\"form-link\" action=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("civix_front_superuser_representative_approve", array("id" => $this->getAttribute($context["repr"], "id", array()))), "html", null, true);
            echo "\" method=\"POST\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken(("representative_approve_" . $this->getAttribute($context["repr"], "id", array()))), "html", null, true);
            echo "\">
                                <i class=\"icon-ok\"></i>
                                <input type=\"submit\" class=\"btn-link\" value=\"Approve\" />
                            </form>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['repr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "            </table>
            ";
        // line 53
        echo "            <div class=\"navigation\">
                ";
        // line 54
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
            </div>
            </table>
        </div>
    </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Superuser:approvals.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 54,  138 => 53,  135 => 51,  122 => 44,  118 => 43,  111 => 39,  107 => 38,  101 => 35,  95 => 32,  91 => 31,  87 => 30,  81 => 29,  77 => 28,  74 => 27,  69 => 26,  56 => 19,  50 => 17,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
