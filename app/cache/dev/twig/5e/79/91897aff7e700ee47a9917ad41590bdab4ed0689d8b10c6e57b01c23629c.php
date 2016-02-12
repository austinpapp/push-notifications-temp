<?php

/* CivixFrontBundle:Group/members:fields.html.twig */
class __TwigTemplate_5e7991897aff7e700ee47a9917ad41590bdab4ed0689d8b10c6e57b01c23629c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/members:fields.html.twig", 1);
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
        echo "User's fields";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <div class=\"span12\">
    ";
        // line 8
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isGroupJoinManagementAvailable", array())) {
            // line 9
            echo "        <form enctype=\"multipart/form-data\" class=\"form-horizontal\" role=\"form\" action=\"";
            echo $this->env->getExtension('routing')->getPath("civix_front_group_members");
            echo "\">
             <fieldset>
                <legend>User's fields (";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getOfficialName", array()), "html", null, true);
            echo ")</legend>
               ";
            // line 12
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fieldValues"]) ? $context["fieldValues"] : $this->getContext($context, "fieldValues")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 13
                echo "                <div class=\"control-group\">
                    <label class=\"control-label\" >";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["value"], "field", array()), "fieldName", array()), "html", null, true);
                echo "</label>
                    <div class=\"controls\">
                        <span class=\"input-xlarge uneditable-input\">";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["value"], "fieldValue", array()), "html", null, true);
                echo "</span>
                    </div>
               </div>
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 20
                echo "                    No fields in group
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "               <div class=\"form-actions\">
                    <button class=\"btn\">Back</button>
               </div>
            </fieldset>
        </form>
    ";
        } else {
            // line 28
            echo "        <h5>Not available for free account</h5>
    ";
        }
        // line 30
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/members:fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 30,  91 => 28,  83 => 22,  76 => 20,  67 => 16,  62 => 14,  59 => 13,  54 => 12,  50 => 11,  44 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
