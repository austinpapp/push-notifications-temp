<?php

/* CivixFrontBundle:News:comment.html.twig */
class __TwigTemplate_7f776bbfee1cd9caf0fd9bae5a0b7e5a6e614732019ec2a8dc581a2524daa26e extends Twig_Template
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
        echo "<dl>
    <dt>";
        // line 2
        if (($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "user", array()) &&  !$this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "privacy", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "user", array()), "officialName", array()), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "user", array()), "username", array()), "html", null, true);
            echo ")";
        } else {
            echo "Someone";
        }
        echo ":</dt>
    <dd class=\"well well-small\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "commentBody", array()), "html", null, true);
        echo "</dd>
    ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "childrenComments", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 5
            echo "        <dd>";
            $this->loadTemplate("CivixFrontBundle:News:comment.html.twig", "CivixFrontBundle:News:comment.html.twig", 5)->display(array_merge($context, array("comment" => $context["child"])));
            echo "</dd>
    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</dl>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:News:comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 7,  54 => 5,  37 => 4,  33 => 3,  22 => 2,  19 => 1,);
    }
}
