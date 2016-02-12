<?php

/* CivixCoreBundle:Email:beta_request.html.twig */
class __TwigTemplate_760d02d3d8c63c3c82300cc9691f537e33cb416a08a5b044fa9bc2fe3273a0f1 extends Twig_Template
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
        echo "The following requested beta use:
<br><br>
<strong>Email:</strong> ";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "email", array()), "html", null, true);
        echo " <br>
<strong>Company:</strong> ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "company", array()), "html", null, true);
        echo " <br><br>
Thank you";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:beta_request.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  23 => 3,  19 => 1,);
    }
}
