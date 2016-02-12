<?php

/* CivixFrontBundle:Post:index.html.twig */
class __TwigTemplate_8b9563f565be3b9ad71098d7a5d251aab396b7e49d75d062fe3ac994355ea168 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Post:index.html.twig", 1);
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
        echo "Blog posts";
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
        echo $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_post_new"));
        echo "\">Create New Post</a>
            </li>
        </ul>
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
            <h4>New Posts</h4>
            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th class=\"span6\">Title</th>
                    <th class=\"span3\">";
        // line 19
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationNew"]) ? $context["paginationNew"] : $this->getContext($context, "paginationNew")), "Created date", "p.createdAt");
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
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_post_edit"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\">Edit</a>
                             <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_post_publish"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\">Publish</a>
                             <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_post_delete"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\">Delete</a>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 33
            echo "                    <tr>
                        <td colspan=\"3\" style=\"text-align: center\">No new posts.</td>
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
            <h4>Published Posts</h4>
            <table class=\"table table-bordered table-striped\">
                <tr>
                    <th class=\"span6\">Title</th>
                    <th class=\"span3\">";
        // line 48
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationPublished"]) ? $context["paginationPublished"] : $this->getContext($context, "paginationPublished")), "Published date", "p.publishedAt");
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
                        <td>
                            <a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_post_edit"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\">Edit</a>
                            <a href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("civix_front_" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "type", array())) . "_post_delete"), array("id" => $this->getAttribute($context["item"], "id", array()))), "html", null, true);
            echo "\">Delete</a>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 61
            echo "                    <tr>
                        <td colspan=\"43\" style=\"text-align: center\">No published posts.</td>
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
        return "CivixFrontBundle:Post:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 68,  166 => 65,  157 => 61,  148 => 57,  144 => 56,  139 => 54,  135 => 53,  132 => 52,  127 => 51,  121 => 48,  110 => 40,  105 => 37,  96 => 33,  87 => 29,  83 => 28,  79 => 27,  74 => 25,  70 => 24,  67 => 23,  62 => 22,  56 => 19,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
