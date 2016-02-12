<?php

/* CivixFrontBundle:Petition:index.html.twig */
class __TwigTemplate_90232a7cf2e566324cc86cf633d96b5f29027ad5e383b19b338be422c109e4dc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Petition:index.html.twig", 1);
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
        echo "Petitions";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("petitionMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
            <h4>New Entries</h4>
            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th class=\"span6\">Title</th>
                    <th class=\"span3\">";
        // line 15
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")), "Created date", "p.createdAt");
        echo "</th>
                    <th class=\"span3\">Options</th>
                </tr>
                ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 19
            echo "                    <tr>
                        <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "petitionTitle", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td class=\"table-options\">
                            <a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_petition_publish"), array("id" => $this->getAttribute($context["item"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Publish</a>
                            <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_petition_edit"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Edit</a>
                            <a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_petition_delete"), array("id" => $this->getAttribute($context["item"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Remove</a>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 29
            echo "                    <tr>
                        <td colspan=\"3\" style=\"text-align: center\">No new entries.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "            </table>

            <div class=\"navigation\">
                ";
        // line 36
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
        echo "
            </div>
        </div>
        <div class=\"span12\">
            <h4>Published Petitions</h4>
            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th class=\"span6\">Title</th>
                    <th class=\"span3\">";
        // line 44
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")), "Published date", "p.publishedAt");
        echo "</th>
                    <th>Signed</th>
                    <th></th>
                </tr>
                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 49
            echo "                    <tr>
                        <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], 0, array(), "array"), "petitionTitle", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 51
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], 0, array(), "array"), "publishedAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], 0, array(), "array"), "answersCount", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 53
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array()) == "group")) {
                echo "<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_petition_invite"), array("id" => $this->getAttribute($this->getAttribute($context["item"], 0, array(), "array"), "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
                echo "\">Send invites</a> ";
            }
            // line 54
            echo "                            ";
            if (($this->getAttribute($context["item"], "countEmails", array(), "array") > 0)) {
                // line 55
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_payment_buyemails"), array("petition" => $this->getAttribute($this->getAttribute($context["item"], 0, array(), "array"), "id", array()))), "html", null, true);
                echo "\">Buy emails (";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "countEmails", array(), "array"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, (($this->getAttribute($context["item"], "countEmails", array(), "array") * (isset($context["emailPrice"]) ? $context["emailPrice"] : $this->getContext($context, "emailPrice"))) / 100), "html", null, true);
                echo "\$)</a>
                                <br><a href=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_paymentrequest_followup"), array("petition" => $this->getAttribute($this->getAttribute($context["item"], 0, array(), "array"), "id", array()))), "html", null, true);
                echo "\">Follow-up payment request</a>
                            ";
            }
            // line 58
            echo "                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 61
            echo "                    <tr>
                        <td colspan=\"43\" style=\"text-align: center\">No published petitions.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "            </table>

            <div class=\"navigation\">
                ";
        // line 68
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Petition:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 68,  183 => 65,  174 => 61,  167 => 58,  162 => 56,  153 => 55,  150 => 54,  144 => 53,  140 => 52,  136 => 51,  132 => 50,  129 => 49,  124 => 48,  117 => 44,  106 => 36,  101 => 33,  92 => 29,  83 => 25,  79 => 24,  75 => 23,  70 => 21,  66 => 20,  63 => 19,  58 => 18,  52 => 15,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
