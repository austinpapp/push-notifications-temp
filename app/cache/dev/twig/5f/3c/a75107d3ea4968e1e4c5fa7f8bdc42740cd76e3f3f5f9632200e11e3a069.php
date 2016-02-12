<?php

/* CivixFrontBundle:Group:invite.html.twig */
class __TwigTemplate_5f3ca75107d3ea4968e1e4c5fa7f8bdc42740cd76e3f3f5f9632200e11e3a069 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group:invite.html.twig", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
            'foot_script' => array($this, 'block_foot_script'),
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
        echo "Invite";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("groupMemberMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    <div class=\"row\">
        <div class=\"span12\">
            <form action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("civix_front_group_send_invite");
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["inviteForm"]) ? $context["inviteForm"] : $this->getContext($context, "inviteForm")), 'enctype');
        echo ">
                <fieldset>
                    <legend>Invite</legend>
                    ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["inviteForm"]) ? $context["inviteForm"] : $this->getContext($context, "inviteForm")), 'errors');
        echo "
                    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["inviteForm"]) ? $context["inviteForm"] : $this->getContext($context, "inviteForm")), "emails", array()), 'row');
        echo "
                    ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["inviteForm"]) ? $context["inviteForm"] : $this->getContext($context, "inviteForm")), "_token", array()), 'widget');
        echo "
                <fieldset>
                <input type=\"submit\" class=\"btn btn-primary bt\" value=\"Send\" />
            </form>
        </div>
    </div>
";
    }

    // line 24
    public function block_foot_script($context, array $blocks = array())
    {
        // line 25
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 26
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "39feae5_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_39feae5_0") : $this->env->getExtension('assets')->getAssetUrl("js/39feae5_invite.validation_1.js");
            // line 29
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "39feae5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_39feae5") : $this->env->getExtension('assets')->getAssetUrl("js/39feae5.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group:invite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 29,  84 => 26,  79 => 25,  76 => 24,  65 => 16,  61 => 15,  57 => 14,  49 => 11,  42 => 7,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
