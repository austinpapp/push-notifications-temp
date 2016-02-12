<?php

/* CivixFrontBundle:PaymentRequest:follow-up.html.twig */
class __TwigTemplate_41e2a74d03301b60147ca4ad3e0cc2529139ad48337077af6f0262e27fe00844 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:PaymentRequest:follow-up.html.twig", 1);
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
        echo "Follow Up Payment Requests";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        <ul class=\"nav nav-pills pull-right\">
            <li class=\"first last\">
                <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentrequest_new"), array("petition" => $this->getAttribute((isset($context["petition"]) ? $context["petition"] : $this->getContext($context, "petition")), "id", array()))), "html", null, true);
        echo "\" target=\"_blank\">Create New Payment Request</a>
            </li>
        </ul>
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
            <h4>Publish payment request for petition signers</h4>
            <h5>\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["petition"]) ? $context["petition"] : $this->getContext($context, "petition")), "petitionTitle", array()), "html", null, true);
        echo "\"</h5>
            ";
        // line 17
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isTargetedPetitionFundraisingAvailable", array())) {
            // line 18
            echo "            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th class=\"span6\">Title</th>
                    <th class=\"span3\">";
            // line 21
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")), "Created date", "pr.createdAt");
            echo "</th>
                    <th class=\"span3\">Options</th>
                </tr>
                ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 25
                echo "                    <tr>
                        <td>";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 27
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
                echo "</td>
                        <td class=\"table-options\">
                            <a href=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentrequest_publishfollowup"), array("id" => $this->getAttribute($context["item"], "id", array()), "petition" => $this->getAttribute((isset($context["petition"]) ? $context["petition"] : $this->getContext($context, "petition")), "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-link\">Publish</a>
                            <a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentrequest_edit"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
                echo "\" class=\"btn btn-link\" target=\"_blank\">Edit</a>
                        </td>
                    </tr>
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 34
                echo "                    <tr>
                        <td colspan=\"3\" style=\"text-align: center\">
                            <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentrequest_new"), array("petition" => $this->getAttribute((isset($context["petition"]) ? $context["petition"] : $this->getContext($context, "petition")), "id", array()))), "html", null, true);
                echo "\" target=\"_blank\">
                                Create
                            </a>
                            new payment request then <a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentrequest_followup"), array("petition" => $this->getAttribute((isset($context["petition"]) ? $context["petition"] : $this->getContext($context, "petition")), "id", array()))), "html", null, true);
                echo "\">reload</a> this page.
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "            </table>

            <div class=\"navigation\">
                ";
            // line 46
            echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
            echo "
            </div>
            ";
        } else {
            // line 49
            echo "                <h5>Not available for free account</h5>
            ";
        }
        // line 51
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentRequest:follow-up.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 51,  131 => 49,  125 => 46,  120 => 43,  110 => 39,  104 => 36,  100 => 34,  91 => 30,  87 => 29,  82 => 27,  78 => 26,  75 => 25,  70 => 24,  64 => 21,  59 => 18,  57 => 17,  53 => 16,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
