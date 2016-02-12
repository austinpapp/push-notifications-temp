<?php

/* CivixFrontBundle:Group/email:invite.html.twig */
class __TwigTemplate_7fa96352c936a2508c08bd19e075f0c45b82794f12395477b6785c6433060ba8 extends Twig_Template
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
        echo "<p>
Well, this is exciting! It looks like you have been invited to join ";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "officialName", array()), "html", null, true);
        echo " on the Powerline platform by the group’s administrator. Please log in to Powerline on your mobile device to accept or reject this invitation. Powerline is designed for mobile – so make sure you have the latest app for Android or iOS today!
</p>
<p>For technical questions, please e-mail support@powerli.ne. For all other questions, please contact the group manager.</p>

<p>
Thanks, <br>
The Powerline Team
</p>
<p>
PS – Only join groups that you trust. When in doubt, check out the group’s profile page before joining to learn more about them.
</p>";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/email:invite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
