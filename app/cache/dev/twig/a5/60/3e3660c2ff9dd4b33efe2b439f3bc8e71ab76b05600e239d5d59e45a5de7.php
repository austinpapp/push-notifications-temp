<?php

/* CivixFrontBundle:Representative:editProfile.html.twig */
class __TwigTemplate_a5603e3660c2ff9dd4b33efe2b439f3bc8e71ab76b05600e239d5d59e45a5de7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Representative:editProfile.html.twig", 1);
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
        echo "Edit profile";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"span12\">
        <form id=\"avatar-form\" class=\"form-horizontal\" action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("civix_front_representative_crop_avatar");
        echo "\" enctype=\"multipart/form-data\" method=\"POST\">
            ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["avatarForm"]) ? $context["avatarForm"] : $this->getContext($context, "avatarForm")), 'widget');
        echo "
        </form>
    </div>
</div>
<div class=\"row\">
    <div class=\"span12\">
        <form id=\"profile-form\" class=\"form-horizontal\" action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("civix_front_representative_update_profile");
        echo "\" method=\"POST\">
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["profileForm"]) ? $context["profileForm"] : $this->getContext($context, "profileForm")), 'widget');
        echo "
            <div class=\"form-actions\">
                <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\">
            </div>
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Representative:editProfile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 16,  55 => 15,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
