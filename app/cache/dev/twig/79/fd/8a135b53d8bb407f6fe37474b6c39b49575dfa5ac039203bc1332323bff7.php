<?php

/* CivixFrontBundle:Reports:membership.csv.twig */
class __TwigTemplate_79fd8a135b53d8bb407f6fe37474b6c39b49575dfa5ac039203bc1332323bff7 extends Twig_Template
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
        echo "Name,Contact Information,Facebook,Group division,";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : $this->getContext($context, "fields")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "fieldName", array()), "html", null, true);
            echo ",";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            echo "Answers,";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "Join date,Followers
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        foreach ($context['_seq'] as $context["_key"] => $context["ug"]) {
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "fullname", array()), "html", null, true);
            echo ",\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "address1", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "address2", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "city", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "state", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "country", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "email", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "phone", array()), "html", null, true);
            echo "\",";
            if ($this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "facebookId", array())) {
                echo "Yes";
            } else {
                echo "No";
            }
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["ug"], "groupDivision", array()), "html", null, true);
            echo ",";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CivixFrontBundle:Group/Report:fields", array("user" => $this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "format" => "csv")));
            echo "\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["ug"], 0, array()), "createdAt", array()), "D, d M Y H:i:s"), "html", null, true);
            echo "\",";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["ug"], 0, array()), "user", array()), "followers", array()), "count", array()), "html", null, true);
            echo ",
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ug'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Reports:membership.csv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 3,  37 => 2,  19 => 1,);
    }
}
