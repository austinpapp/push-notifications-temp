<?php

/* MopaBootstrapBundle:Form:fields.html.twig */
class __TwigTemplate_206457820568ea8264b7cc7f42cf261d429e33ee2a9e32a68b5b68602ee6b7f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("form_div_layout.html.twig", "MopaBootstrapBundle:Form:fields.html.twig", 1);
        $this->blocks = array(
            'button_attributes' => array($this, 'block_button_attributes'),
            'button_widget' => array($this, 'block_button_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'form_widget_compound' => array($this, 'block_form_widget_compound'),
            'collection_widget' => array($this, 'block_collection_widget'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'date_widget' => array($this, 'block_date_widget'),
            'time_widget' => array($this, 'block_time_widget'),
            'hexcolor_widget' => array($this, 'block_hexcolor_widget'),
            'datetime_widget' => array($this, 'block_datetime_widget'),
            'percent_widget' => array($this, 'block_percent_widget'),
            'money_widget' => array($this, 'block_money_widget'),
            'form_legend' => array($this, 'block_form_legend'),
            'form_label' => array($this, 'block_form_label'),
            'help_label' => array($this, 'block_help_label'),
            'help_label_tooltip' => array($this, 'block_help_label_tooltip'),
            'help_label_popover' => array($this, 'block_help_label_popover'),
            'form_rows_visible' => array($this, 'block_form_rows_visible'),
            'form_row' => array($this, 'block_form_row'),
            'form_message' => array($this, 'block_form_message'),
            'form_help' => array($this, 'block_form_help'),
            'form_widget_add_btn' => array($this, 'block_form_widget_add_btn'),
            'form_widget_remove_btn' => array($this, 'block_form_widget_remove_btn'),
            'collection_button' => array($this, 'block_collection_button'),
            'label_asterisk' => array($this, 'block_label_asterisk'),
            'widget_addon' => array($this, 'block_widget_addon'),
            '_form_errors' => array($this, 'block__form_errors'),
            'form_errors' => array($this, 'block_form_errors'),
            'error_type' => array($this, 'block_error_type'),
            'widget_control_group_start' => array($this, 'block_widget_control_group_start'),
            'widget_control_group_end' => array($this, 'block_widget_control_group_end'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_45a236e4944cbc2e0265b593c4d3114ba80a1c2730c928f293d41ae9047a12e6"] = $this->loadTemplate("MopaBootstrapBundle::flash.html.twig", "MopaBootstrapBundle:Form:fields.html.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_button_attributes($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ("btn " . (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")))));
        // line 7
        echo "    ";
        $this->displayParentBlock("button_attributes", $context, $blocks);
        echo "
";
    }

    // line 10
    public function block_button_widget($context, array $blocks = array())
    {
        // line 11
        ob_start();
        // line 12
        echo "    ";
        if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
            // line 13
            echo "        ";
            $context["label"] = $this->env->getExtension('form')->humanize((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")));
            // line 14
            echo "    ";
        }
        // line 15
        echo "    <button type=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "button")) : ("button")), "html", null, true);
        echo "\" ";
        $this->displayBlock("button_attributes", $context, $blocks);
        echo ">
    ";
        // line 16
        if ( !twig_test_empty((isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon")))) {
            echo " <i class=\"icon-";
            echo twig_escape_filter($this->env, (isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon")), "html", null, true);
            if ( !twig_test_empty((isset($context["icon_color"]) ? $context["icon_color"] : $this->getContext($context, "icon_color")))) {
                echo " icon-";
                echo twig_escape_filter($this->env, (isset($context["icon_color"]) ? $context["icon_color"] : $this->getContext($context, "icon_color")), "html", null, true);
            }
            echo "\"></i> ";
        }
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "</button>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 22
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 23
        ob_start();
        // line 24
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "text")) : ("text"));
        // line 25
        echo "    ";
        if ((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "hidden") &&  !(null === (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "type", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "type", array()), null)) : (null))))) {
            // line 26
            echo "    <div class=\"input-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()), "html", null, true);
            if (((array_key_exists("colorpicker", $context)) ? (_twig_default_filter((isset($context["colorpicker"]) ? $context["colorpicker"] : $this->getContext($context, "colorpicker")), false)) : (false))) {
                echo " colorpicker-component colorpicker-element ";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
                echo "\" id=\"colorpicker-";
                echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
            }
            echo "\">
        ";
            // line 27
            if (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()) == "prepend")) {
                // line 28
                echo "            ";
                $this->displayBlock("widget_addon", $context, $blocks);
                echo "
        ";
            }
            // line 30
            echo "    ";
        }
        // line 31
        echo "    ";
        if ( !((array_key_exists("widget_remove_btn", $context)) ? (_twig_default_filter((isset($context["widget_remove_btn"]) ? $context["widget_remove_btn"] : $this->getContext($context, "widget_remove_btn")), null)) : (null))) {
            // line 32
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " not-removable")));
            // line 33
            echo "    ";
        }
        // line 34
        echo "    <input type=\"";
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "\" ";
        }
        echo "/>
    ";
        // line 35
        if ((((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) != "hidden") &&  !(null === (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "type", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "type", array()), null)) : (null))))) {
            // line 36
            echo "        ";
            if (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()) == "append")) {
                // line 37
                echo "            ";
                $this->displayBlock("widget_addon", $context, $blocks);
                echo "
        ";
            }
            // line 39
            echo "    </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 44
    public function block_form_widget_compound($context, array $blocks = array())
    {
        // line 45
        ob_start();
        // line 46
        echo "    ";
        if (($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null)) {
            // line 47
            echo "        ";
            if ((isset($context["render_fieldset"]) ? $context["render_fieldset"] : $this->getContext($context, "render_fieldset"))) {
                echo "<fieldset>";
            }
            // line 48
            echo "        ";
            if ((isset($context["show_legend"]) ? $context["show_legend"] : $this->getContext($context, "show_legend"))) {
                $this->displayBlock("form_legend", $context, $blocks);
            }
            // line 49
            echo "    ";
        }
        // line 50
        echo "    ";
        $this->displayBlock("form_rows_visible", $context, $blocks);
        echo "
    ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
    ";
        // line 52
        if (($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null)) {
            // line 53
            echo "        ";
            if ((isset($context["render_fieldset"]) ? $context["render_fieldset"] : $this->getContext($context, "render_fieldset"))) {
                echo "</fieldset>";
            }
            // line 54
            echo "    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 58
    public function block_collection_widget($context, array $blocks = array())
    {
        // line 59
        ob_start();
        // line 60
        echo "    ";
        $this->displayBlock("form_widget", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 64
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 65
        ob_start();
        // line 66
        echo "    ";
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => (((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " ") . (((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) ? ("checkbox") : ("radio")))));
        // line 67
        echo "    ";
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => (($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), "class", array()) . " ") . (((isset($context["widget_type"]) ? $context["widget_type"] : $this->getContext($context, "widget_type"))) ? ((isset($context["widget_type"]) ? $context["widget_type"] : $this->getContext($context, "widget_type"))) : ("")))));
        // line 68
        echo "    ";
        $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => trim((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), "class", array()) . " ") . (((array_key_exists("inline", $context) && (isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline")))) ? ("inline") : (""))))));
        // line 69
        echo "    <div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    ";
        // line 70
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 71
            echo "        <label";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
            ";
            // line 72
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget', array("attr" => array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array()), "")) : ("")))));
            echo "
            ";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($context["child"], "vars", array()), "label", array()), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
            echo "
        </label>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 80
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        // line 81
        echo "    ";
        ob_start();
        // line 82
        echo "        ";
        if (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()) == "prepend")) {
            // line 83
            echo "            ";
            $this->displayBlock("widget_addon", $context, $blocks);
            echo "
        ";
        }
        // line 85
        echo "        <select ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if ((isset($context["multiple"]) ? $context["multiple"] : $this->getContext($context, "multiple"))) {
            echo " multiple=\"multiple\"";
        }
        echo ">
            ";
        // line 86
        if ( !(null === (isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value")))) {
            // line 87
            echo "                <option value=\"\"";
            if (((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required")) && twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))))) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["empty_value"]) ? $context["empty_value"] : $this->getContext($context, "empty_value")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
            echo "</option>
            ";
        }
        // line 89
        echo "            ";
        if ((twig_length_filter($this->env, (isset($context["preferred_choices"]) ? $context["preferred_choices"] : $this->getContext($context, "preferred_choices"))) > 0)) {
            // line 90
            echo "                ";
            $context["options"] = (isset($context["preferred_choices"]) ? $context["preferred_choices"] : $this->getContext($context, "preferred_choices"));
            // line 91
            echo "                ";
            $this->displayBlock("choice_widget_options", $context, $blocks);
            echo "
                ";
            // line 92
            if (((twig_length_filter($this->env, (isset($context["choices"]) ? $context["choices"] : $this->getContext($context, "choices"))) > 0) &&  !(null === (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator"))))) {
                // line 93
                echo "                    <option disabled=\"disabled\">";
                echo twig_escape_filter($this->env, (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator")), "html", null, true);
                echo "</option>
                ";
            }
            // line 95
            echo "            ";
        }
        // line 96
        echo "            ";
        $context["options"] = (isset($context["choices"]) ? $context["choices"] : $this->getContext($context, "choices"));
        // line 97
        echo "            ";
        $this->displayBlock("choice_widget_options", $context, $blocks);
        echo "
        </select>
        ";
        // line 99
        if (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()) == "append")) {
            // line 100
            echo "            ";
            $this->displayBlock("widget_addon", $context, $blocks);
            echo "
        ";
        }
        // line 102
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 105
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 106
        ob_start();
        // line 107
        if (( !((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false) && twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label"))))) {
            // line 108
            echo "    ";
            $context["label"] = $this->env->getExtension('form')->humanize((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")));
        }
        // line 110
        if (((($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) != null) && !twig_in_filter("choice", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "block_prefixes", array()))) && (isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render")))) {
            // line 111
            echo "    <label class=\"checkbox";
            if ((array_key_exists("inline", $context) && (isset($context["inline"]) ? $context["inline"] : $this->getContext($context, "inline")))) {
                echo " inline";
            }
            echo "\">
";
        }
        // line 113
        echo "        <input type=\"checkbox\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "\"";
        }
        if ((isset($context["checked"]) ? $context["checked"] : $this->getContext($context, "checked"))) {
            echo " checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('translator')->trans((isset($context["help_inline"]) ? $context["help_inline"] : $this->getContext($context, "help_inline")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
        echo "
";
        // line 114
        if ((($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) != null) && !twig_in_filter("choice", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()), "vars", array()), "block_prefixes", array())))) {
            // line 115
            echo "    ";
            if (((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render")) && twig_in_filter((isset($context["widget_checkbox_label"]) ? $context["widget_checkbox_label"] : $this->getContext($context, "widget_checkbox_label")), array(0 => "both", 1 => "widget")))) {
                // line 116
                echo "        ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                echo "
        ";
                // line 117
                if (((isset($context["widget_checkbox_label"]) ? $context["widget_checkbox_label"] : $this->getContext($context, "widget_checkbox_label")) == "widget")) {
                    // line 118
                    echo "            ";
                    $this->displayBlock("label_asterisk", $context, $blocks);
                    echo "
        ";
                }
                // line 120
                echo "    ";
            }
            // line 121
            echo "    ";
            $context["help_inline"] = false;
            // line 122
            echo "    ";
            if ((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))) {
                // line 123
                echo "    </label>
    ";
            }
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 129
    public function block_date_widget($context, array $blocks = array())
    {
        // line 130
        ob_start();
        // line 131
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 132
            echo "    ";
            if (array_key_exists("datepicker", $context)) {
                // line 133
                echo "        <div class=\"input-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()), "html", null, true);
                echo " date\" ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo " data-date=\"";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "\" data-date-format=\"";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format"))), "html", null, true);
                echo "\" data-form=\"datepicker\">
            ";
                // line 134
                if (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()) == "prepend")) {
                    // line 135
                    echo "                ";
                    $this->displayBlock("widget_addon", $context, $blocks);
                    echo "
            ";
                }
                // line 137
                echo "            ";
                $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . " not-removable grd-white")));
                // line 138
                echo "            <input type=\"text\" ";
                $this->displayBlock("widget_attributes", $context, $blocks);
                echo " value=\"";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "\"  data-form=\"datepicker\" data-date-format=\"";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format"))), "html", null, true);
                echo "\"/>
            ";
                // line 139
                if (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "type", array()) == "append")) {
                    // line 140
                    echo "                ";
                    $this->displayBlock("widget_addon", $context, $blocks);
                    echo "
            ";
                }
                // line 142
                echo "            <script type=\"text/javascript\">
                \$(document).ready(function () {
                    \$(";
                // line 144
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ").datepicker();
                    \$(";
                // line 145
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ").datepicker().on(
                            \"changeDate\",
                            function(event){
                                \$(";
                // line 148
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ").datepicker('hide');
                            }
                    )
                });
            </script>
        </div>
    ";
            } else {
                // line 155
                echo "        ";
                $this->displayBlock("form_widget_simple", $context, $blocks);
                echo "
    ";
            }
        } else {
            // line 158
            echo "        ";
            $context["attrYear"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "inline")) : ("inline")) . " input-small")));
            // line 159
            echo "        ";
            $context["attrMonth"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "inline")) : ("inline")) . " input-mini")));
            // line 160
            echo "        ";
            $context["attrDay"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "inline")) : ("inline")) . " input-mini")));
            // line 161
            echo "
            ";
            // line 162
            echo strtr((isset($context["date_pattern"]) ? $context["date_pattern"] : $this->getContext($context, "date_pattern")), array("{{ year }}" =>             // line 163
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "year", array()), 'widget', array("attr" => (isset($context["attrYear"]) ? $context["attrYear"] : $this->getContext($context, "attrYear")))), "{{ month }}" =>             // line 164
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "month", array()), 'widget', array("attr" => (isset($context["attrMonth"]) ? $context["attrMonth"] : $this->getContext($context, "attrMonth")))), "{{ day }}" =>             // line 165
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "day", array()), 'widget', array("attr" => (isset($context["attrDay"]) ? $context["attrDay"] : $this->getContext($context, "attrDay"))))));
            // line 166
            echo "
        ";
            // line 167
            $this->displayBlock("help", $context, $blocks);
            echo "
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 172
    public function block_time_widget($context, array $blocks = array())
    {
        // line 173
        ob_start();
        // line 174
        echo "    ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 175
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 177
            echo "        ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "inline")) : ("inline"))));
            // line 178
            echo "        <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
            ";
            // line 179
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "hour", array()), 'widget', array("attr" => array("size" => "1", "class" => "input-mini")));
            if ((isset($context["with_minutes"]) ? $context["with_minutes"] : $this->getContext($context, "with_minutes"))) {
                echo ":";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "minute", array()), 'widget', array("attr" => array("size" => "1", "class" => "input-mini")));
            }
            if ((isset($context["with_seconds"]) ? $context["with_seconds"] : $this->getContext($context, "with_seconds"))) {
                echo ":";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "second", array()), 'widget', array("attr" => array("size" => "1", "class" => "input-mini")));
            }
            // line 180
            echo "        </div>
        ";
            // line 181
            $this->displayBlock("help", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 186
    public function block_hexcolor_widget($context, array $blocks = array())
    {
        // line 187
        echo "    ";
        ob_start();
        // line 188
        echo "        ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 190
        echo "        <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('#colorpicker-";
        // line 192
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "').colorpicker();
        });
        </script>
";
    }

    // line 197
    public function block_datetime_widget($context, array $blocks = array())
    {
        // line 198
        ob_start();
        // line 199
        echo "    ";
        if (((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")) == "single_text")) {
            // line 200
            echo "        ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
    ";
        } else {
            // line 202
            echo "            ";
            $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : (""))));
            // line 203
            echo "            <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
                ";
            // line 204
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date", array()), 'errors');
            echo "
                ";
            // line 205
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time", array()), 'errors');
            echo "
                ";
            // line 206
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date", array()), 'widget', array("attr" => array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array()), "")) : ("")))));
            echo "
                ";
            // line 207
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "time", array()), 'widget', array("attr" => array("class" => (($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "widget_class", array()), "")) : ("")))));
            echo "
            </div>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 213
    public function block_percent_widget($context, array $blocks = array())
    {
        // line 214
        ob_start();
        // line 215
        echo "    ";
        $context["widget_addon"] = twig_array_merge((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), array("text" => (($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "text", array()), "%")) : ("%"))));
        // line 216
        echo "    ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 220
    public function block_money_widget($context, array $blocks = array())
    {
        // line 221
        ob_start();
        // line 222
        echo "    ";
        $context["widget_addon"] = twig_array_merge((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), array("text" => strtr((isset($context["money_pattern"]) ? $context["money_pattern"] : $this->getContext($context, "money_pattern")), array("{{ widget }}" => ""))));
        // line 223
        echo "    ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 229
    public function block_form_legend($context, array $blocks = array())
    {
        // line 230
        ob_start();
        // line 231
        echo "    ";
        if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
            // line 232
            echo "        ";
            $context["label"] = $this->env->getExtension('form')->humanize((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")));
            // line 233
            echo "    ";
        }
        // line 234
        echo "    <legend>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "</legend>
    ";
        // line 235
        if ((isset($context["widget_add_btn"]) ? $context["widget_add_btn"] : $this->getContext($context, "widget_add_btn"))) {
            // line 236
            echo "        ";
            $this->displayBlock("form_widget_add_btn", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 241
    public function block_form_label($context, array $blocks = array())
    {
        // line 242
        if ((!twig_in_filter("checkbox", (isset($context["block_prefixes"]) ? $context["block_prefixes"] : $this->getContext($context, "block_prefixes"))) || twig_in_filter((isset($context["widget_checkbox_label"]) ? $context["widget_checkbox_label"] : $this->getContext($context, "widget_checkbox_label")), array(0 => "label", 1 => "both")))) {
            // line 243
            ob_start();
            // line 244
            echo "    ";
            if ( !((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")) === false)) {
                // line 245
                echo "        ";
                if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
                    // line 246
                    echo "            ";
                    $context["label"] = $this->env->getExtension('form')->humanize((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")));
                    // line 247
                    echo "        ";
                }
                // line 248
                echo "        ";
                if ( !(isset($context["compound"]) ? $context["compound"] : $this->getContext($context, "compound"))) {
                    // line 249
                    echo "            ";
                    $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("for" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))));
                    // line 250
                    echo "        ";
                }
                // line 251
                echo "        ";
                $context["label_attr"] = twig_array_merge((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")), array("class" => (((($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["label_attr"]) ? $context["label_attr"] : null), "class", array()), "")) : ("")) . " control-label") . (((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required"))) ? (" required") : (" optional")))));
                // line 252
                echo "        <label";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["label_attr"]) ? $context["label_attr"] : $this->getContext($context, "label_attr")));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo " ";
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\"";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
        ";
                // line 253
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                echo "
        ";
                // line 254
                $this->displayBlock("label_asterisk", $context, $blocks);
                echo "
        ";
                // line 255
                if ((isset($context["widget_add_btn"]) ? $context["widget_add_btn"] : $this->getContext($context, "widget_add_btn"))) {
                    // line 256
                    echo "            ";
                    $this->displayBlock("form_widget_add_btn", $context, $blocks);
                    echo "
        ";
                }
                // line 258
                echo "        ";
                if ((isset($context["help_label_tooltip_title"]) ? $context["help_label_tooltip_title"] : $this->getContext($context, "help_label_tooltip_title"))) {
                    // line 259
                    echo "            ";
                    $this->displayBlock("help_label_tooltip", $context, $blocks);
                    echo "
        ";
                }
                // line 261
                echo "        ";
                if ((isset($context["help_label_popover_title"]) ? $context["help_label_popover_title"] : $this->getContext($context, "help_label_popover_title"))) {
                    // line 262
                    echo "            ";
                    $this->displayBlock("help_label_popover", $context, $blocks);
                    echo "
        ";
                }
                // line 264
                echo "        ";
                if ((isset($context["help_label"]) ? $context["help_label"] : $this->getContext($context, "help_label"))) {
                    // line 265
                    echo "            ";
                    $this->displayBlock("help_label", $context, $blocks);
                    echo "
        ";
                }
                // line 267
                echo "        </label>
    ";
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
    }

    // line 273
    public function block_help_label($context, array $blocks = array())
    {
        // line 274
        echo "    <p class=\"help-block\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["help_label"]) ? $context["help_label"] : $this->getContext($context, "help_label")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "</p>
";
    }

    // line 277
    public function block_help_label_tooltip($context, array $blocks = array())
    {
        // line 278
        echo "    <p class=\"help-inline\">
        <a href=\"#\" id=\"";
        // line 279
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "_tooltip\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["help_label_tooltip_title"]) ? $context["help_label_tooltip_title"] : $this->getContext($context, "help_label_tooltip_title")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "\" tabindex=\"-1\" data-toggle=\"tooltip\" data-placement=\"";
        echo twig_escape_filter($this->env, (isset($context["help_label_tooltip_placement"]) ? $context["help_label_tooltip_placement"] : $this->getContext($context, "help_label_tooltip_placement")), "html", null, true);
        echo "\"><i class=\"";
        echo twig_escape_filter($this->env, (isset($context["help_label_tooltip_icon"]) ? $context["help_label_tooltip_icon"] : $this->getContext($context, "help_label_tooltip_icon")), "html", null, true);
        echo "\"></i></a>
    </p>
";
    }

    // line 283
    public function block_help_label_popover($context, array $blocks = array())
    {
        // line 284
        echo "    <p class=\"help-inline\">
        <a href=\"#\" id=\"";
        // line 285
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "_popover\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["help_label_popover_title"]) ? $context["help_label_popover_title"] : $this->getContext($context, "help_label_popover_title")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "\" tabindex=\"-1\" data-toggle=\"popover\" data-content=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["help_label_popover_content"]) ? $context["help_label_popover_content"] : $this->getContext($context, "help_label_popover_content")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "\" data-placement=\"";
        echo twig_escape_filter($this->env, (isset($context["help_label_popover_placement"]) ? $context["help_label_popover_placement"] : $this->getContext($context, "help_label_popover_placement")), "html", null, true);
        echo "\" data-trigger=\"hover\" data-html=\"true\"><i class=\"";
        echo twig_escape_filter($this->env, (isset($context["help_label_popover_icon"]) ? $context["help_label_popover_icon"] : $this->getContext($context, "help_label_popover_icon")), "html", null, true);
        echo "\"></i></a>
    </p>
";
    }

    // line 292
    public function block_form_rows_visible($context, array $blocks = array())
    {
        // line 293
        ob_start();
        // line 294
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 295
            echo "        ";
            if (!twig_in_filter("hidden", $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "block_prefixes", array()))) {
                // line 296
                echo "            ";
                if ((twig_in_filter("collection", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array())) &&  !(isset($context["omit_collection_item"]) ? $context["omit_collection_item"] : $this->getContext($context, "omit_collection_item")))) {
                    // line 297
                    echo "            <div class=\"collection-item ";
                    echo twig_escape_filter($this->env, twig_join_filter((($this->getAttribute((isset($context["widget_items_attr"]) ? $context["widget_items_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_items_attr"]) ? $context["widget_items_attr"] : null), "class", array()))) : ("")), " "), "html", null, true);
                    echo "\" id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "id", array()), "html", null, true);
                    echo "_control_group\">
            ";
                }
                // line 299
                echo "            ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'row');
                echo "
            ";
                // line 300
                if ((twig_in_filter("collection", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array())) &&  !(isset($context["omit_collection_item"]) ? $context["omit_collection_item"] : $this->getContext($context, "omit_collection_item")))) {
                    // line 301
                    echo "            </div>
            ";
                }
                // line 303
                echo "        ";
            }
            // line 304
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 308
    public function block_form_row($context, array $blocks = array())
    {
        // line 309
        ob_start();
        // line 310
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), array("class" => ((($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array()), "")) : ("")) . (((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) ? (" error") : ("")))));
        // line 311
        echo "    ";
        $this->displayBlock("widget_control_group_start", $context, $blocks);
        echo "
    ";
        // line 312
        echo $this->env->getExtension('translator')->trans((isset($context["widget_prefix"]) ? $context["widget_prefix"] : $this->getContext($context, "widget_prefix")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget', $context);
        echo " ";
        echo $this->env->getExtension('translator')->trans((isset($context["widget_suffix"]) ? $context["widget_suffix"] : $this->getContext($context, "widget_suffix")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
        echo "
    ";
        // line 313
        if (array_key_exists("widget_remove_btn", $context)) {
            // line 314
            echo "        ";
            $this->displayBlock("form_widget_remove_btn", $context, $blocks);
            echo "
    ";
        }
        // line 316
        $this->displayBlock("form_message", $context, $blocks);
        echo "
    ";
        // line 317
        $this->displayBlock("widget_control_group_end", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 323
    public function block_form_message($context, array $blocks = array())
    {
        // line 324
        ob_start();
        // line 325
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    ";
        // line 326
        $this->displayBlock("form_help", $context, $blocks);
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 332
    public function block_form_help($context, array $blocks = array())
    {
        // line 333
        ob_start();
        // line 334
        if (!twig_in_filter("checkbox", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array()))) {
            // line 335
            echo "    ";
            if ((isset($context["help_inline"]) ? $context["help_inline"] : $this->getContext($context, "help_inline"))) {
                echo "<p class=\"help-inline\">";
                echo $this->env->getExtension('translator')->trans((isset($context["help_inline"]) ? $context["help_inline"] : $this->getContext($context, "help_inline")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
                echo "</p>";
            }
        }
        // line 337
        if ((isset($context["help_block"]) ? $context["help_block"] : $this->getContext($context, "help_block"))) {
            echo "<p class=\"help-block\">";
            echo $this->env->getExtension('translator')->trans((isset($context["help_block"]) ? $context["help_block"] : $this->getContext($context, "help_block")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")));
            echo "</p>";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 341
    public function block_form_widget_add_btn($context, array $blocks = array())
    {
        // line 342
        ob_start();
        // line 343
        echo "    ";
        if ((isset($context["widget_add_btn"]) ? $context["widget_add_btn"] : $this->getContext($context, "widget_add_btn"))) {
            // line 344
            echo "    ";
            $context["button_type"] = "add";
            // line 345
            echo "    ";
            $context["button_values"] = (isset($context["widget_add_btn"]) ? $context["widget_add_btn"] : $this->getContext($context, "widget_add_btn"));
            // line 346
            echo "    ";
            $this->displayBlock("collection_button", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 351
    public function block_form_widget_remove_btn($context, array $blocks = array())
    {
        // line 352
        ob_start();
        // line 353
        echo "    ";
        if ((isset($context["widget_remove_btn"]) ? $context["widget_remove_btn"] : $this->getContext($context, "widget_remove_btn"))) {
            // line 354
            echo "    ";
            $context["button_type"] = "remove";
            // line 355
            echo "    ";
            $context["button_values"] = (isset($context["widget_remove_btn"]) ? $context["widget_remove_btn"] : $this->getContext($context, "widget_remove_btn"));
            // line 356
            echo "    ";
            $this->displayBlock("collection_button", $context, $blocks);
            echo "
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 361
    public function block_collection_button($context, array $blocks = array())
    {
        // line 362
        echo "<a ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "attr", array()));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " data-collection-";
        echo twig_escape_filter($this->env, (isset($context["button_type"]) ? $context["button_type"] : $this->getContext($context, "button_type")), "html", null, true);
        echo "-btn=\"#";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array(), "array"), "html", null, true);
        echo "_control_group\">
";
        // line 363
        if ($this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : null), "icon", array(), "any", true, true)) {
            // line 364
            echo "<i class=\"icon-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "icon", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : null), "icon_color", array(), "any", true, true)) {
                echo "icon-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "icon_color", array()), "html", null, true);
            }
            echo "\"></i>
";
        }
        // line 366
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["button_values"]) ? $context["button_values"] : $this->getContext($context, "button_values")), "label", array()), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
        echo "
</a>

";
    }

    // line 371
    public function block_label_asterisk($context, array $blocks = array())
    {
        // line 372
        if ((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required"))) {
            // line 373
            echo "    ";
            if ((isset($context["render_required_asterisk"]) ? $context["render_required_asterisk"] : $this->getContext($context, "render_required_asterisk"))) {
                echo "<span>*</span>";
            }
        } else {
            // line 375
            echo "    ";
            if ((isset($context["render_optional_text"]) ? $context["render_optional_text"] : $this->getContext($context, "render_optional_text"))) {
                echo "<span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("(optional)", array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
                echo "</span>";
            }
        }
    }

    // line 379
    public function block_widget_addon($context, array $blocks = array())
    {
        // line 380
        ob_start();
        // line 382
        $context["__internal_f2031e90acc129e8b48da9cbe1f6c5d2dc3142ac4e2afd5eacf13e9458d374d6"] = $this->loadTemplate("MopaBootstrapBundle::icons.html.twig", "MopaBootstrapBundle:Form:fields.html.twig", 382);
        // line 383
        echo "<span class=\"add-on\">";
        echo (((($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "text", array()), false)) : (false))) ? ($this->env->getExtension('translator')->trans($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "text", array()), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain")))) : ((((($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "icon", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "icon", array()), false)) : (false))) ? ($context["__internal_f2031e90acc129e8b48da9cbe1f6c5d2dc3142ac4e2afd5eacf13e9458d374d6"]->geticon($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "icon", array()))) : (""))));
        echo " ";
        echo (((($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "html", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : null), "html", array()), false)) : (false))) ? ($this->getAttribute((isset($context["widget_addon"]) ? $context["widget_addon"] : $this->getContext($context, "widget_addon")), "html", array())) : (""));
        echo "</span>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 389
    public function block__form_errors($context, array $blocks = array())
    {
        // line 390
        ob_start();
        // line 391
        echo "    ";
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            // line 392
            echo "    <ul>
        ";
            // line 393
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 394
                echo "            <li>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "message", array()), "html", null, true);
                echo "</li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 396
            echo "    </ul>
    ";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 401
    public function block_form_errors($context, array $blocks = array())
    {
        // line 402
        ob_start();
        // line 403
        if (((isset($context["errors_on_forms"]) ? $context["errors_on_forms"] : $this->getContext($context, "errors_on_forms")) && ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null))) {
            // line 404
            echo "    ";
            // line 405
            echo "    ";
            $context["__internal_5e24c4d9590b3cda0e48bf84be81ec4eb8c1d66834b550f97d91937326cb1548"] = $this->loadTemplate("MopaBootstrapBundle::flash.html.twig", "MopaBootstrapBundle:Form:fields.html.twig", 405);
            // line 406
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 407
                echo "        ";
                echo $context["__internal_5e24c4d9590b3cda0e48bf84be81ec4eb8c1d66834b550f97d91937326cb1548"]->getflash("error", (((null === $this->getAttribute(                // line 410
$context["error"], "messagePluralization", array()))) ? ($this->env->getExtension('translator')->trans($this->getAttribute(                // line 411
$context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messageParameters", array()), "validators")) : ($this->env->getExtension('translator')->transchoice($this->getAttribute(                // line 412
$context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messagePluralization", array()), $this->getAttribute($context["error"], "messageParameters", array()), "validators"))));
                // line 414
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } elseif (        // line 416
(isset($context["error_delay"]) ? $context["error_delay"] : $this->getContext($context, "error_delay"))) {
            // line 417
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 418
                echo "        ";
                if (($this->getAttribute($context["loop"], "index", array()) == 1)) {
                    // line 419
                    echo "            ";
                    if ($this->getAttribute($context["child"], "set", array(0 => "errors", 1 => (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))), "method")) {
                    }
                    // line 420
                    echo "        ";
                }
                // line 421
                echo "    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 423
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                // line 424
                echo "    <span class=\"help-";
                $this->displayBlock("error_type", $context, $blocks);
                echo "\">
        <span class=\"text-error\">
            ";
                // line 426
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 427
                    echo "                ";
                    echo twig_escape_filter($this->env, (((null === $this->getAttribute(                    // line 428
$context["error"], "messagePluralization", array()))) ? ($this->env->getExtension('translator')->trans($this->getAttribute(                    // line 429
$context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messageParameters", array()), "validators")) : ($this->env->getExtension('translator')->transchoice($this->getAttribute(                    // line 430
$context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messagePluralization", array()), $this->getAttribute($context["error"], "messageParameters", array()), "validators"))), "html", null, true);
                    // line 431
                    echo " <br>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 433
                echo "        </span>
    </span>
    ";
            }
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 443
    public function block_error_type($context, array $blocks = array())
    {
        // line 444
        ob_start();
        // line 445
        if ((isset($context["error_type"]) ? $context["error_type"] : $this->getContext($context, "error_type"))) {
            // line 446
            echo "    ";
            echo twig_escape_filter($this->env, (isset($context["error_type"]) ? $context["error_type"] : $this->getContext($context, "error_type")), "html", null, true);
            echo "
";
        } elseif (($this->getAttribute(        // line 447
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null)) {
            // line 448
            echo "    ";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "error_type", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "error_type", array()), "inline")) : ("inline")), "html", null, true);
            echo "
";
        } else {
            // line 450
            echo "inline
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 457
    public function block_widget_control_group_start($context, array $blocks = array())
    {
        // line 458
        ob_start();
        // line 459
        if ((((array_key_exists("widget_control_group", $context)) ? (_twig_default_filter((isset($context["widget_control_group"]) ? $context["widget_control_group"] : $this->getContext($context, "widget_control_group")), false)) : (false)) || ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null))) {
            // line 460
            echo "    ";
            if (array_key_exists("prototype", $context)) {
                // line 461
                echo "        ";
                $context["data_prototype"] = (((twig_in_filter("collection", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array())) &&  !(isset($context["omit_collection_item"]) ? $context["omit_collection_item"] : $this->getContext($context, "omit_collection_item")))) ? ((((((("<div class=\"collection-item " . twig_join_filter((($this->getAttribute((isset($context["widget_items_attr"]) ? $context["widget_items_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_items_attr"]) ? $context["widget_items_attr"] : null), "class", array()))) : ("")), " ")) . "\" id=\"") . $this->getAttribute($this->getAttribute((isset($context["prototype"]) ? $context["prototype"] : $this->getContext($context, "prototype")), "vars", array()), "id", array())) . "_control_group\">") . $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["prototype"]) ? $context["prototype"] : $this->getContext($context, "prototype")), 'row')) . "</div>")) : ($this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["prototype"]) ? $context["prototype"] : $this->getContext($context, "prototype")), 'row')));
                // line 462
                echo "        ";
                $context["data_prototype_name"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "form", array(), "any", false, true), "vars", array(), "any", false, true), "prototype", array(), "any", false, true), "vars", array(), "any", false, true), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "form", array(), "any", false, true), "vars", array(), "any", false, true), "prototype", array(), "any", false, true), "vars", array(), "any", false, true), "name", array()), "__name__")) : ("__name__"));
                // line 463
                echo "        ";
                $context["widget_control_group_attr"] = twig_array_merge(twig_array_merge((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : $this->getContext($context, "widget_control_group_attr")), array("data-prototype" => (isset($context["data_prototype"]) ? $context["data_prototype"] : $this->getContext($context, "data_prototype")), "data-prototype-name" => (isset($context["data_prototype_name"]) ? $context["data_prototype_name"] : $this->getContext($context, "data_prototype_name")), "data-widget-controls" => ((((array_key_exists("widget_controls", $context)) ? (_twig_default_filter((isset($context["widget_controls"]) ? $context["widget_controls"] : $this->getContext($context, "widget_controls")), false)) : (false))) ? ("true") : ("false")))), (isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")));
                // line 464
                echo "    ";
            }
            // line 465
            echo "    ";
            $context["widget_control_group_attr"] = twig_array_merge((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : $this->getContext($context, "widget_control_group_attr")), array("id" => ((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")) . "_control_group"), "class" => ((($this->getAttribute((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : null), "class", array()), "")) : ("")) . " control-group")));
            // line 466
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
                // line 467
                echo "        ";
                $context["widget_control_group_attr"] = twig_array_merge((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : $this->getContext($context, "widget_control_group_attr")), array("class" => ((($this->getAttribute((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : null), "class", array()), "")) : ("")) . " error")));
                // line 468
                echo "    ";
            }
            // line 469
            echo "\t";
            if ((twig_in_filter("collection", $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array())) && $this->getAttribute((isset($context["attr"]) ? $context["attr"] : null), "class", array(), "any", true, true))) {
                // line 470
                echo "\t\t";
                $context["widget_control_group_attr"] = twig_array_merge((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : $this->getContext($context, "widget_control_group_attr")), array("class" => (((($this->getAttribute((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : null), "class", array()), "")) : ("")) . " ") . $this->getAttribute((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")), "class", array()))));
                // line 471
                echo "\t";
            }
            // line 472
            echo "    <div ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["widget_control_group_attr"]) ? $context["widget_control_group_attr"] : $this->getContext($context, "widget_control_group_attr")));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
    ";
            // line 474
            echo "    ";
            if ((((twig_length_filter($this->env, (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))) > 0) && ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) != null)) && !twig_in_filter("field", $this->getAttribute($this->getAttribute(            // line 475
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "block_prefixes", array())))) {
                // line 476
                echo "        ";
                if ((isset($context["show_child_legend"]) ? $context["show_child_legend"] : $this->getContext($context, "show_child_legend"))) {
                    // line 477
                    echo "            ";
                    $this->displayBlock("form_legend", $context, $blocks);
                    echo "
        ";
                } elseif (                // line 478
(isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))) {
                    // line 479
                    echo "            ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
                    echo "
        ";
                }
                // line 481
                echo "    ";
            } else {
                // line 482
                echo "        ";
                if ((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))) {
                    // line 483
                    echo "            ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
                    echo "
        ";
                }
                // line 485
                echo "    ";
            }
            // line 486
            echo "    ";
            if ((((array_key_exists("widget_controls", $context)) ? (_twig_default_filter((isset($context["widget_controls"]) ? $context["widget_controls"] : $this->getContext($context, "widget_controls")), false)) : (false)) || ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null))) {
                // line 487
                echo "        ";
                $context["widget_controls_attr"] = twig_array_merge((isset($context["widget_controls_attr"]) ? $context["widget_controls_attr"] : $this->getContext($context, "widget_controls_attr")), array("class" => ((($this->getAttribute((isset($context["widget_controls_attr"]) ? $context["widget_controls_attr"] : null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["widget_controls_attr"]) ? $context["widget_controls_attr"] : null), "class", array()), "")) : ("")) . " controls")));
                // line 488
                echo "        <div ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["widget_controls_attr"]) ? $context["widget_controls_attr"] : $this->getContext($context, "widget_controls_attr")));
                foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                    echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                    echo "=\"";
                    echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                    echo "\" ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo ">
    ";
            }
        } else {
            // line 491
            echo "    ";
            if ((isset($context["label_render"]) ? $context["label_render"] : $this->getContext($context, "label_render"))) {
                // line 492
                echo "        ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), null)) : (null))) ? array() : array("label" => $_label_)));
                echo "
    ";
            }
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 498
    public function block_widget_control_group_end($context, array $blocks = array())
    {
        // line 499
        ob_start();
        // line 500
        if ((((array_key_exists("widget_control_group", $context)) ? (_twig_default_filter((isset($context["widget_control_group"]) ? $context["widget_control_group"] : $this->getContext($context, "widget_control_group")), false)) : (false)) || ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null))) {
            // line 501
            echo "    ";
            if ((((array_key_exists("widget_controls", $context)) ? (_twig_default_filter((isset($context["widget_controls"]) ? $context["widget_controls"] : $this->getContext($context, "widget_controls")), false)) : (false)) || ($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "parent", array()) == null))) {
                // line 502
                echo "        </div>
    ";
            }
            // line 504
            echo "    </div>
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "MopaBootstrapBundle:Form:fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1447 => 504,  1443 => 502,  1440 => 501,  1438 => 500,  1436 => 499,  1433 => 498,  1423 => 492,  1420 => 491,  1403 => 488,  1400 => 487,  1397 => 486,  1394 => 485,  1388 => 483,  1385 => 482,  1382 => 481,  1376 => 479,  1374 => 478,  1369 => 477,  1366 => 476,  1364 => 475,  1362 => 474,  1346 => 472,  1343 => 471,  1340 => 470,  1337 => 469,  1334 => 468,  1331 => 467,  1328 => 466,  1325 => 465,  1322 => 464,  1319 => 463,  1316 => 462,  1313 => 461,  1310 => 460,  1308 => 459,  1306 => 458,  1303 => 457,  1296 => 450,  1290 => 448,  1288 => 447,  1283 => 446,  1281 => 445,  1279 => 444,  1276 => 443,  1267 => 433,  1260 => 431,  1258 => 430,  1257 => 429,  1256 => 428,  1254 => 427,  1250 => 426,  1244 => 424,  1241 => 423,  1226 => 421,  1223 => 420,  1219 => 419,  1216 => 418,  1198 => 417,  1196 => 416,  1189 => 414,  1187 => 412,  1186 => 411,  1185 => 410,  1183 => 407,  1178 => 406,  1175 => 405,  1173 => 404,  1171 => 403,  1169 => 402,  1166 => 401,  1159 => 396,  1150 => 394,  1146 => 393,  1143 => 392,  1140 => 391,  1138 => 390,  1135 => 389,  1125 => 383,  1123 => 382,  1121 => 380,  1118 => 379,  1108 => 375,  1102 => 373,  1100 => 372,  1097 => 371,  1089 => 366,  1078 => 364,  1076 => 363,  1056 => 362,  1053 => 361,  1044 => 356,  1041 => 355,  1038 => 354,  1035 => 353,  1033 => 352,  1030 => 351,  1021 => 346,  1018 => 345,  1015 => 344,  1012 => 343,  1010 => 342,  1007 => 341,  998 => 337,  990 => 335,  988 => 334,  986 => 333,  983 => 332,  976 => 326,  971 => 325,  969 => 324,  966 => 323,  959 => 317,  955 => 316,  949 => 314,  947 => 313,  939 => 312,  934 => 311,  931 => 310,  929 => 309,  926 => 308,  917 => 304,  914 => 303,  910 => 301,  908 => 300,  903 => 299,  895 => 297,  892 => 296,  889 => 295,  884 => 294,  882 => 293,  879 => 292,  864 => 285,  861 => 284,  858 => 283,  845 => 279,  842 => 278,  839 => 277,  832 => 274,  829 => 273,  821 => 267,  815 => 265,  812 => 264,  806 => 262,  803 => 261,  797 => 259,  794 => 258,  788 => 256,  786 => 255,  782 => 254,  778 => 253,  762 => 252,  759 => 251,  756 => 250,  753 => 249,  750 => 248,  747 => 247,  744 => 246,  741 => 245,  738 => 244,  736 => 243,  734 => 242,  731 => 241,  722 => 236,  720 => 235,  715 => 234,  712 => 233,  709 => 232,  706 => 231,  704 => 230,  701 => 229,  693 => 223,  690 => 222,  688 => 221,  685 => 220,  677 => 216,  674 => 215,  672 => 214,  669 => 213,  660 => 207,  656 => 206,  652 => 205,  648 => 204,  643 => 203,  640 => 202,  634 => 200,  631 => 199,  629 => 198,  626 => 197,  618 => 192,  614 => 190,  608 => 188,  605 => 187,  602 => 186,  594 => 181,  591 => 180,  581 => 179,  576 => 178,  573 => 177,  567 => 175,  564 => 174,  562 => 173,  559 => 172,  551 => 167,  548 => 166,  546 => 165,  545 => 164,  544 => 163,  543 => 162,  540 => 161,  537 => 160,  534 => 159,  531 => 158,  524 => 155,  514 => 148,  508 => 145,  504 => 144,  500 => 142,  494 => 140,  492 => 139,  483 => 138,  480 => 137,  474 => 135,  472 => 134,  461 => 133,  458 => 132,  456 => 131,  454 => 130,  451 => 129,  443 => 123,  440 => 122,  437 => 121,  434 => 120,  428 => 118,  426 => 117,  421 => 116,  418 => 115,  416 => 114,  401 => 113,  393 => 111,  391 => 110,  387 => 108,  385 => 107,  383 => 106,  380 => 105,  375 => 102,  369 => 100,  367 => 99,  361 => 97,  358 => 96,  355 => 95,  349 => 93,  347 => 92,  342 => 91,  339 => 90,  336 => 89,  326 => 87,  324 => 86,  316 => 85,  310 => 83,  307 => 82,  304 => 81,  301 => 80,  295 => 76,  286 => 73,  282 => 72,  266 => 71,  262 => 70,  257 => 69,  254 => 68,  251 => 67,  248 => 66,  246 => 65,  243 => 64,  235 => 60,  233 => 59,  230 => 58,  224 => 54,  219 => 53,  217 => 52,  213 => 51,  208 => 50,  205 => 49,  200 => 48,  195 => 47,  192 => 46,  190 => 45,  187 => 44,  180 => 39,  174 => 37,  171 => 36,  169 => 35,  156 => 34,  153 => 33,  150 => 32,  147 => 31,  144 => 30,  138 => 28,  136 => 27,  125 => 26,  122 => 25,  119 => 24,  117 => 23,  114 => 22,  97 => 16,  90 => 15,  87 => 14,  84 => 13,  81 => 12,  79 => 11,  76 => 10,  69 => 7,  66 => 6,  63 => 5,  59 => 1,  57 => 2,  11 => 1,);
    }
}
