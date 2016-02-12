<?php

/* CivixCoreBundle:Email:registration.html.twig */
class __TwigTemplate_24c8ac53670471f8037e3ee8364ae569f5b76e85f78aa4807281c970d912c4e9 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "firstName", array()), "html", null, true);
        echo ",

<p>
    Welcome to Powerline, the platform for civic engagement and democracy! This revolutionary system empowers citizens like you to have a voice in any kind of community. Together, we’re going to do a lot to change the world. Are you ready to make your contribution? Great!
</p>

<p>
    A few things to keep in mind:
    <br>• Powerline is designed for mobile - so download the app for Android or iOS today!
    <br>• You’re automatically linked to your elected leaders and you should expect to receive occasional notifications from them
    <br>• You’re also automatically linked to your town, state, and country communities – leverage them to start movements with petitions or micropetitions
</p>

<p>
    For technical questions, please e-mail <a href=\"mailto:support@powerli.ne\">support@powerli.ne</a>. Thanks again for joining Powerline and working with us to strengthen democracy everywhere!
</p>


<p>
    Thanks,<br>
    The Powerline Team
</p>";
    }

    public function getTemplateName()
    {
        return "CivixCoreBundle:Email:registration.html.twig";
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
