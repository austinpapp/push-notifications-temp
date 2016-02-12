<?php

/* CivixFrontBundle:Reports:fields.html.twig */
class __TwigTemplate_b431e615c3f6e5974f1ca8710a4ff3c0f9afce53673b836866d33f9b0149df16 extends Twig_Template
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
            // line 2
            echo "    <b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["value"], "field", array()), "fieldName", array()), "html", null, true);
            echo " </b> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "fieldValue", array()), "html", null, true);
            echo " <br/>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 4
            echo "    No fields in group
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Reports:fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  24 => 2,  19 => 1,);
    }
}
