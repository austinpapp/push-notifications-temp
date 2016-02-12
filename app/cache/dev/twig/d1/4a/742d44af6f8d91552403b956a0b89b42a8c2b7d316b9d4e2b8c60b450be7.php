<?php

/* CivixFrontBundle:Group/membership:membershipEdit.html.twig */
class __TwigTemplate_d14a742d44af6f8d91552403b956a0b89b42a8c2b7d316b9d4e2b8c60b450be7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Group/membership:membershipEdit.html.twig", 1);
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
        echo "Membership control";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <nav class=\"submenu\">
        ";
        // line 7
        echo $this->env->getExtension('mopa_bootstrap_navbar')->render("settingsMenu", array("template" => "CivixFrontBundle::submenu.html.twig"));
        echo "
    </nav>
    ";
        // line 9
        if ($this->getAttribute((isset($context["package"]) ? $context["package"] : $this->getContext($context, "package")), "isGroupJoinManagementAvailable", array())) {
            // line 10
            echo "        <div class=\"row\">
            <div class=\"span12\">
            <form class=\"form-horizontal\" action=\"";
            // line 12
            echo $this->env->getExtension('routing')->getPath("civix_front_group_membership_save");
            echo "\" method=\"POST\">
                <fieldset>
                    <legend>Edit membership control</legend>
                    ";
            // line 15
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["membershipForm"]) ? $context["membershipForm"] : $this->getContext($context, "membershipForm")), 'errors');
            echo "
                    ";
            // line 16
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["membershipForm"]) ? $context["membershipForm"] : $this->getContext($context, "membershipForm")), 'rest');
            echo "
                    <div class=\"form-actions\">
                        <input type=\"submit\" class=\"btn btn-primary bt\" value=\"Save\" />
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    ";
        } else {
            // line 25
            echo "        <h5>Not available for free account</h5>
    ";
        }
    }

    // line 29
    public function block_foot_script($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "
    ";
        // line 31
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ef11bed_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ef11bed_0") : $this->env->getExtension('assets')->getAssetUrl("js/ef11bed_group.membership_1.js");
            // line 34
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "ef11bed"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ef11bed") : $this->env->getExtension('assets')->getAssetUrl("js/ef11bed.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Group/membership:membershipEdit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 34,  89 => 31,  84 => 30,  81 => 29,  75 => 25,  63 => 16,  59 => 15,  53 => 12,  49 => 10,  47 => 9,  42 => 7,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
