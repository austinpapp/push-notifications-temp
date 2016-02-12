<?php

/* CivixFrontBundle:Announcement:index.html.twig */
class __TwigTemplate_e537debf7dfed4eaf0698489a7febd16f3b6bf4afe0bb92c7e1243e22f4c21ab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Announcement:index.html.twig", 1);
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
        echo "Announcements";
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
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_announcement_new"));
        echo "\">Create New Announcement</a>
        </li>
    </ul>
</nav>

<div class=\"row\">
    <div class=\"span12\">
        <h4>New Announcements</h4>
        <table class=\"table table-bordered table-striped\">
            <tr>
                <th class=\"span6\">Message</th>
                <th class=\"span3\">";
        // line 20
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")), "Created date", "a.createdAt");
        echo "</th>
                <th class=\"span3\">Options</th>
            </tr>
            ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["announcement"]) {
            // line 24
            echo "                <tr>
                    <td>";
            // line 25
            echo $this->getAttribute($context["announcement"], "contentParsed", array());
            echo "</td>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["announcement"], "createdAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                    <td class=\"table-options\">
                        <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_announcement_publish"), array("id" => $this->getAttribute($context["announcement"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Publish</a>
                        <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_announcement_edit"), array("id" => $this->getAttribute($context["announcement"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-link\">Edit</a>
                        <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_announcement_delete"), array("id" => $this->getAttribute($context["announcement"], "id", array()), "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
            echo "\" class=\"btn btn-link\">Remove</a>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 34
            echo "                <tr>
                    <td colspan=\"3\" style=\"text-align: center\">No new announcements.</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['announcement'], $context['_parent'], $context['loop']);
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
        <h4>Published Announcements</h4>
        <table class=\"table table-bordered table-striped\">
            <tr>
                <th class=\"span6\">Message</th>
                <th class=\"span3\">";
        // line 49
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")), "Published date", "a.publishedAt");
        echo "</th>
            </tr>
            ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["announcement"]) {
            // line 52
            echo "                <tr>
                    <td>";
            // line 53
            echo $this->getAttribute($context["announcement"], "contentParsed", array());
            echo "</td>
                    <td>";
            // line 54
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["announcement"], "publishedAt", array()), "d-m-Y H:i"), "html", null, true);
            echo "</td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 57
            echo "                <tr>
                    <td colspan=\"3\" style=\"text-align: center\">No published announcements.</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['announcement'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "        </table>

        <div class=\"navigation\">
            ";
        // line 64
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")));
        echo "
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Announcement:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 64,  156 => 61,  147 => 57,  139 => 54,  135 => 53,  132 => 52,  127 => 51,  122 => 49,  111 => 41,  106 => 38,  97 => 34,  88 => 30,  84 => 29,  80 => 28,  75 => 26,  71 => 25,  68 => 24,  63 => 23,  57 => 20,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
