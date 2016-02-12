<?php

/* CivixFrontBundle:Reports:fields.csv.twig */
class __TwigTemplate_7d60692c1b6b81facd255874074c5b62e965b255dce2ce889a3ddcf7f04a81ea extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fieldValues"]) ? $context["fieldValues"] : $this->getContext($context, "fieldValues")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            echo "\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "fieldValue", array()), "html", null, true);
            echo "\",";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            echo "\"No fields in group\",";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "fields", array()), "count", array()) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "fields", array()), "count", array()) > 0)) {
                    echo "\"No fields in group\",";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Reports:fields.csv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
