<?php

/* MopaBootstrapBundle:Pagination:sliding.html.twig */
class __TwigTemplate_2e670ec291de71688485255edf6108c70144e9d3cec2b9eb532dc5d674b3b224 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (((isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")) > 1)) {
            // line 2
            echo "    <div class=\"pagination\">
    ";
            // line 3
            $context["item"] = "MopaBootstrapBundle:Pagination:sliding_item.html.twig";
            // line 4
            echo "
        <ul>
            ";
            // line 6
            $this->loadTemplate((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "MopaBootstrapBundle:Pagination:sliding.html.twig", 6)->display(array_merge($context, array("name" => "first", "text" => "«", "page" => ((            // line 8
array_key_exists("first", $context)) ? ((isset($context["first"]) ? $context["first"] : $this->getContext($context, "first"))) : (null)), "clickable" => (            // line 9
array_key_exists("first", $context) && ((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) != (isset($context["first"]) ? $context["first"] : $this->getContext($context, "first")))))));
            // line 12
            echo "
            ";
            // line 13
            $this->loadTemplate((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "MopaBootstrapBundle:Pagination:sliding.html.twig", 13)->display(array_merge($context, array("name" => "prev", "text" => ("‹ " . $this->env->getExtension('translator')->trans("Previous", array(), "pagination")), "page" => ((            // line 15
array_key_exists("previous", $context)) ? ((isset($context["previous"]) ? $context["previous"] : $this->getContext($context, "previous"))) : (null)), "clickable" =>             // line 16
array_key_exists("previous", $context))));
            // line 19
            echo "
            ";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : $this->getContext($context, "pagesInRange")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 21
                echo "                ";
                $this->loadTemplate((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "MopaBootstrapBundle:Pagination:sliding.html.twig", 21)->display($context);
                // line 22
                echo "            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "
            ";
            // line 25
            $this->loadTemplate((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "MopaBootstrapBundle:Pagination:sliding.html.twig", 25)->display(array_merge($context, array("name" => "next", "text" => ($this->env->getExtension('translator')->trans("Next", array(), "pagination") . " ›"), "page" => ((            // line 28
array_key_exists("next", $context)) ? ((isset($context["next"]) ? $context["next"] : $this->getContext($context, "next"))) : (null)), "clickable" =>             // line 29
array_key_exists("next", $context))));
            // line 32
            echo "
            ";
            // line 34
            $this->loadTemplate((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "MopaBootstrapBundle:Pagination:sliding.html.twig", 34)->display(array_merge($context, array("name" => "last", "text" => "»", "page" => ((            // line 37
array_key_exists("last", $context)) ? ((isset($context["last"]) ? $context["last"] : $this->getContext($context, "last"))) : (null)), "clickable" => (            // line 38
array_key_exists("last", $context) && ((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) != (isset($context["last"]) ? $context["last"] : $this->getContext($context, "last")))))));
            // line 41
            echo "        </ul>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Pagination:sliding.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 41,  90 => 38,  89 => 37,  88 => 34,  85 => 32,  83 => 29,  82 => 28,  81 => 25,  78 => 23,  64 => 22,  61 => 21,  44 => 20,  41 => 19,  39 => 16,  38 => 15,  37 => 13,  34 => 12,  32 => 9,  31 => 8,  30 => 6,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
