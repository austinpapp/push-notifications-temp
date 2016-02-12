<?php

/* CivixFrontBundle:News:index.html.twig */
class __TwigTemplate_559b4aee3286b837b78ab76e6c3123cce2c0a73d74599754312cb28ea658c644 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:News:index.html.twig", 1);
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
        echo "News";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<nav class=\"submenu\">
    <ul class=\"nav nav-pills pull-right\">
        <li class=\"first last\">
            <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . (isset($context["owner"]) ? $context["owner"] : $this->getContext($context, "owner"))) . "_news_new"));
        echo "\">Create New</a>
        </li>
    </ul>
</nav>

<div class=\"row\">
    <div class=\"span12\">
        <h4>New Entries</h4>
        <table class=\"table table-bordered table-striped\">
            <tr>
                <th class=\"span6\">Subject</th>
                <th class=\"span3\">";
        // line 20
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")), "Created date", "ln.createdAt");
        echo "</th>
                <th class=\"span3\">Options</th>
            </tr>
            ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 24
            echo "                <tr>
                    <td>";
            // line 25
            echo $this->getAttribute($context["item"], "subjectParsed", array());
            echo "</td>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                    <td class=\"table-options\">
                        <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . (isset($context["owner"]) ? $context["owner"] : $this->getContext($context, "owner"))) . "_news_publish"), array("id" => $this->getAttribute($context["item"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Publish</a>
                        <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . (isset($context["owner"]) ? $context["owner"] : $this->getContext($context, "owner"))) . "_news_edit"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Edit</a>
                        <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . (isset($context["owner"]) ? $context["owner"] : $this->getContext($context, "owner"))) . "_news_delete"), array("id" => $this->getAttribute($context["item"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Remove</a>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 34
            echo "                <tr>
                    <td colspan=\"3\" style=\"text-align: center\">No new entries.</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "        </table>

        <div class=\"navigation\">
            ";
        // line 41
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
        echo "
        </div>
    </div>
    <div class=\"span12\">
        <h4>Published News</h4>
        <table class=\"table table-bordered table-striped\">
            <tr>
                <th class=\"span6\">Subject</th>
                <th class=\"span3\">";
        // line 49
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")), "Published date", "ln.publishedAt");
        echo "</th>
                <th>Options</th>
            </tr>
            ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 53
            echo "                <tr>
                    <td>";
            // line 54
            echo $this->getAttribute($context["item"], "subjectParsed", array());
            echo "</td>
                    <td>";
            // line 55
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "publishedAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                    <td><a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . (isset($context["owner"]) ? $context["owner"] : $this->getContext($context, "owner"))) . "_news_details"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Comments</a></td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 59
            echo "                <tr>
                    <td colspan=\"3\" style=\"text-align: center\">No published news.</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "        </table>

        <div class=\"navigation\">
            ";
        // line 66
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        echo "
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:News:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 66,  161 => 63,  152 => 59,  144 => 56,  140 => 55,  136 => 54,  133 => 53,  128 => 52,  122 => 49,  111 => 41,  106 => 38,  97 => 34,  88 => 30,  84 => 29,  80 => 28,  75 => 26,  71 => 25,  68 => 24,  63 => 23,  57 => 20,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
