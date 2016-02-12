<?php

/* EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig */
class __TwigTemplate_4a8a19fdd47b0d809aa6fb898b1fb07423d3dce7108a96ef2504178e9f188a94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ewz_recaptcha_widget' => array($this, 'block_ewz_recaptcha_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('ewz_recaptcha_widget', $context, $blocks);
        // line 18
        echo "
";
    }

    // line 1
    public function block_ewz_recaptcha_widget($context, array $blocks = array())
    {
        // line 2
        ob_start();
        // line 3
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "ewz_recaptcha_enabled", array())) {
            // line 4
            echo "        ";
            if ($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "options", array(), "any", true, true)) {
                // line 5
                echo "            <script type=\"text/javascript\">
                var RecaptchaOptions = ";
                // line 6
                echo twig_jsonencode_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), "options", array()));
                echo "
            </script>
        ";
            }
            // line 9
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "url_challenge", array()), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
        <noscript>
            <iframe src=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "url_noscript", array()), "html", null, true);
            echo "\" height=\"300\" width=\"500\"></iframe><br/>
            <textarea name=\"recaptcha_challenge_field\" rows=\"3\" cols=\"40\"></textarea>
            <input type=\"hidden\" name=\"recaptcha_response_field\" value=\"manual_challenge\"/>
        </noscript>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "EWZRecaptchaBundle:Form:ewz_recaptcha_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  47 => 9,  41 => 6,  38 => 5,  35 => 4,  32 => 3,  30 => 2,  27 => 1,  22 => 18,  20 => 1,);
    }
}
