<?php

/* CivixFrontBundle:Event:index.html.twig */
class __TwigTemplate_b03a331ef4600abbf77417498939bba2a26ee5faf6a54bac6df55fd0b2543af0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Event:index.html.twig", 1);
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
        echo "Events";
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
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_leaderevent_new"));
        echo "\">Create New Event</a>
            </li>
        </ul>
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
            <h4>New Entries</h4>
            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th class=\"span6\">Title</th>
                    <th class=\"span3\">";
        // line 19
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")), "Created date", "pr.createdAt");
        echo "</th>
                    <th class=\"span3\">Options</th>
                </tr>
                ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 23
            echo "                    <tr>
                        <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td class=\"table-options\">
                            <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_leaderevent_publish"), array("id" => $this->getAttribute($context["item"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Publish</a>
                            <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_leaderevent_edit"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Edit</a>
                            <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_leaderevent_delete"), array("id" => $this->getAttribute($context["item"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Remove</a>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "                    <tr>
                        <td colspan=\"3\" style=\"text-align: center\">No new entries.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "            </table>

            <div class=\"navigation\">
                ";
        // line 40
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
        echo "
            </div>
        </div>
        <div class=\"span12\">
            <h4>Published Events</h4>
            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th class=\"span6\">Title</th>
                    <th class=\"span3\">";
        // line 48
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")), "Published date", "pr.publishedAt");
        echo "</th>
                    <th class=\"span3\">Options</th>
                </tr>
                ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 52
            echo "                    <tr>
                        <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 54
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "publishedAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                        <td><a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_report_event"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Results</a></td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 58
            echo "                    <tr>
                        <td colspan=\"43\" style=\"text-align: center\">No published events.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "            </table>

            <div class=\"navigation\">
                ";
        // line 65
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Event:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 65,  160 => 62,  151 => 58,  143 => 55,  139 => 54,  135 => 53,  132 => 52,  127 => 51,  121 => 48,  110 => 40,  105 => 37,  96 => 33,  87 => 29,  83 => 28,  79 => 27,  74 => 25,  70 => 24,  67 => 23,  62 => 22,  56 => 19,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
