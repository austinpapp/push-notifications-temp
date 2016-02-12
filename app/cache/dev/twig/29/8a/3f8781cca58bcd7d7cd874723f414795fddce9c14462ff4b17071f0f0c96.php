<?php

/* CivixFrontBundle:Representative:login.html.twig */
class __TwigTemplate_298a3f8781cca58bcd7d7cd874723f414795fddce9c14462ff4b17071f0f0c96 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Representative:login.html.twig", 1);
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
        echo "Representative login";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form class=\"form-horizontal\" action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("civix_front_representative_login_check");
        echo "\" method=\"POST\">
            <input type=\"hidden\" id=\"csrf_token\" name=\"_csrf_token\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
            <fieldset>
                <legend>Representative login</legend>
                ";
        // line 12
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 13
            echo "                    <div class=\"alert alert-error\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
                ";
        }
        // line 15
        echo "                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"username\">Login</label>
                    <div class=\"controls\">
                        <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\" for=\"password\">Password</label>
                    <div class=\"controls\">
                        <input type=\"password\" id=\"password\" name=\"_password\" />
                    </div>
                </div>
                <div class=\"form-actions\">
                    <input class=\"btn btn-primary\" type=\"submit\" name=\"login\" value=\"Sign In\" /> or <a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("civix_front_representative_registration");
        echo "\">Registration</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 28,  65 => 18,  60 => 15,  54 => 13,  52 => 12,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
