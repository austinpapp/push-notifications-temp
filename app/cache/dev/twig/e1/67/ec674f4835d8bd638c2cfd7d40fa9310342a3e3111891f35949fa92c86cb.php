<?php

/* CivixFrontBundle:Payment:form.html.twig */
class __TwigTemplate_e167ec674f4835d8bd638c2cfd7d40fa9310342a3e3111891f35949fa92c86cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CivixFrontBundle::layout.html.twig", "CivixFrontBundle:Payment:form.html.twig", 1);
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
        echo twig_escape_filter($this->env, (isset($context["formTitle"]) ? $context["formTitle"] : $this->getContext($context, "formTitle")), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
    <div class=\"alert alert-error hide\">
    </div>
    <div class=\"form-horizontal\">
         <fieldset>
             <legend>";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["formTitle"]) ? $context["formTitle"] : $this->getContext($context, "formTitle")), "html", null, true);
        echo "</legend>
             ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
             ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'row');
        echo "
             ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "number", array()), 'row');
        echo "
             ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "expirationMonth", array()), 'row');
        echo "
             ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "expirationYear", array()), 'row');
        echo "
             ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cvv", array()), 'row');
        echo "
             
             <form id=\"cardForm\" action=\"\" method=\"POST\">
                ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
             </form>
             <div class=\"form-actions\">
                 <input id=\"cc-submit\" type=\"submit\" class=\"btn btn-primary bt\" value=\"Buy\" />
             </div>
         </fieldset>
   </div>
</div>
";
    }

    // line 30
    public function block_foot_script($context, array $blocks = array())
    {
        // line 31
        echo "    ";
        $this->displayParentBlock("foot_script", $context, $blocks);
        echo "

    <script type=\"text/javascript\" src=\"https://js.balancedpayments.com/v1/balanced.js\"></script>
    <script type=\"text/javascript\">
        balanced.init('/v1/marketplaces/";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["marketplaceToken"]) ? $context["marketplaceToken"] : $this->getContext($context, "marketplaceToken")), "html", null, true);
        echo "');
    </script>
    ";
        // line 37
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "72993fe_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_72993fe_0") : $this->env->getExtension('assets')->getAssetUrl("js/72993fe_payment.balanced_1.js");
            // line 40
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "72993fe"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_72993fe") : $this->env->getExtension('assets')->getAssetUrl("js/72993fe.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:Payment:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 40,  105 => 37,  100 => 35,  92 => 31,  89 => 30,  76 => 20,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  54 => 13,  50 => 12,  46 => 11,  39 => 6,  36 => 5,  30 => 3,  11 => 1,);
    }
}
