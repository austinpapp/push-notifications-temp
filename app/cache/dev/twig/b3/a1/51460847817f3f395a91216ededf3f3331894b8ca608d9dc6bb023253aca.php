<?php

/* NelmioApiDocBundle::method.html.twig */
class __TwigTemplate_b3a151460847817f3f395a91216ededf3f3331894b8ca608d9dc6bb023253aca extends Twig_Template
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
        echo "<li class=\"";
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "method", array())), "html", null, true);
        echo " operation\">
    <div class=\"heading toggler";
        // line 2
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "deprecated", array())) {
            echo " deprecated";
        }
        echo "\">
    <h3>
        <span class=\"http_method\">
            <a>";
        // line 5
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "method", array())), "html", null, true);
        echo "</a>
        </span>

        ";
        // line 8
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "deprecated", array())) {
            // line 9
            echo "        <span class=\"deprecated\">
            <a>DEPRECATED</a>
        </span>
        ";
        }
        // line 13
        echo "
        ";
        // line 14
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https", array())) {
            // line 15
            echo "            <span class=\"icon lock\" title=\"HTTPS\"></span>
        ";
        }
        // line 17
        echo "        ";
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "authentication", array())) {
            // line 18
            echo "            <span class=\"icon keys\" title=\"Needs authentication\"></span>
        ";
        }
        // line 20
        echo "
        <span class=\"path\">
            ";
        // line 22
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "host", array(), "any", true, true)) {
            // line 23
            echo (($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "https", array())) ? ("https://") : ("http://"));
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "host", array()), "html", null, true);
        }
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "uri", array()), "html", null, true);
        echo "
        </span>
    </h3>
    <ul class=\"options\">
        ";
        // line 30
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "description", array(), "any", true, true)) {
            // line 31
            echo "            <li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "description", array()), "html", null, true);
            echo "</li>
        ";
        }
        // line 33
        echo "    </ul>
    </div>

    <div class=\"content\" style=\"display: ";
        // line 36
        if ((array_key_exists("displayContent", $context) && ((isset($context["displayContent"]) ? $context["displayContent"] : $this->getContext($context, "displayContent")) == true))) {
            echo "display";
        } else {
            echo "none";
        }
        echo ";\">
        <ul class=\"tabs\">
            <li class=\"selected\" data-pane=\"content\">Documentation</li>
            ";
        // line 39
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : $this->getContext($context, "enableSandbox"))) {
            // line 40
            echo "                <li data-pane=\"sandbox\">Sandbox</li>
            ";
        }
        // line 42
        echo "        </ul>

        <div class=\"panes\">
            <div class=\"pane content selected\">
            ";
        // line 46
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "documentation", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "documentation", array())))) {
            // line 47
            echo "                <h4>Documentation</h4>
                <div>";
            // line 48
            echo $this->env->getExtension('nelmio_api_doc')->markdown($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "documentation", array()));
            echo "</div>
            ";
        }
        // line 50
        echo "
            ";
        // line 51
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "requirements", array())))) {
            // line 52
            echo "                <h4>Requirements</h4>
                <table class=\"fullwidth\">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Requirement</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 63
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "requirements", array()));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 64
                echo "                            <tr>
                                <td>";
                // line 65
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</td>
                                <td>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "requirement", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "dataType", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "                    </tbody>
                </table>
            ";
        }
        // line 74
        echo "
            ";
        // line 75
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "filters", array())))) {
            // line 76
            echo "                <h4>Filters</h4>
                <table class=\"fullwidth\">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
            // line 85
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "filters", array()));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 86
                echo "                        <tr>
                            <td>";
                // line 87
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</td>
                            <td>
                                <table>
                                ";
                // line 90
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["infos"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 91
                    echo "                                    <tr>
                                        <td>";
                    // line 92
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $context["key"]), "html", null, true);
                    echo "</td>
                                        <td>";
                    // line 93
                    echo twig_escape_filter($this->env, trim(strtr(twig_jsonencode_filter($context["value"]), array("\\\\" => "\\")), "\""), "html", null, true);
                    echo "</td>
                                    </tr>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 96
                echo "                                </table>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "                    </tbody>
                </table>
            ";
        }
        // line 103
        echo "
            ";
        // line 104
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parameters", array())))) {
            // line 105
            echo "                <h4>Parameters</h4>
                <table class='fullwidth'>
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Type</th>
                            <th>Required?</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 116
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parameters", array()));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 117
                echo "                            ";
                if ( !$this->getAttribute($context["infos"], "readonly", array())) {
                    // line 118
                    echo "                                <tr>
                                    <td>";
                    // line 119
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 120
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "dataType", array()), "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 121
                    echo (($this->getAttribute($context["infos"], "required", array())) ? ("true") : ("false"));
                    echo "</td>
                                    <td>";
                    // line 122
                    echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                    echo "</td>
                                </tr>
                            ";
                }
                // line 125
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "                    </tbody>
                </table>
            ";
        }
        // line 129
        echo "
            ";
        // line 130
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "response", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "response", array())))) {
            // line 131
            echo "                <h4>Return</h4>
                <table class='fullwidth'>
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Type</th>
                            <th>Versions</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 142
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "response", array()));
            foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                // line 143
                echo "                            <tr>
                                <td>";
                // line 144
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</td>
                                <td>";
                // line 145
                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "dataType", array()), "html", null, true);
                echo "</td>
                                <td>";
                // line 146
                $this->loadTemplate("NelmioApiDocBundle:Components:version.html.twig", "NelmioApiDocBundle::method.html.twig", 146)->display(array("sinceVersion" => $this->getAttribute($context["infos"], "sinceVersion", array()), "untilVersion" => $this->getAttribute($context["infos"], "untilVersion", array())));
                echo "</td>
                                <td>";
                // line 147
                echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                echo "</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 150
            echo "                    </tbody>
                </table>
            ";
        }
        // line 153
        echo "
            ";
        // line 154
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "statusCodes", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "statusCodes", array())))) {
            // line 155
            echo "                <h4>Status Codes</h4>
                <table class=\"fullwidth\">
                    <thead>
                    <tr>
                        <th>Status Code</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
            // line 164
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "statusCodes", array()));
            foreach ($context['_seq'] as $context["status_code"] => $context["descriptions"]) {
                // line 165
                echo "                        <tr>
                            <td><a href=\"http://en.wikipedia.org/wiki/HTTP_";
                // line 166
                echo twig_escape_filter($this->env, $context["status_code"], "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $context["status_code"], "html", null, true);
                echo "<a/></td>
                            <td>
                                <ul>
                                    ";
                // line 169
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($context["descriptions"]);
                foreach ($context['_seq'] as $context["_key"] => $context["description"]) {
                    // line 170
                    echo "                                        <li>";
                    echo twig_escape_filter($this->env, $context["description"], "html", null, true);
                    echo "</li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['description'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 172
                echo "                                </ul>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['status_code'], $context['descriptions'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 176
            echo "                    </tbody>
                </table>
            ";
        }
        // line 179
        echo "
            ";
        // line 180
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "cache", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "cache", array())))) {
            // line 181
            echo "                <h4>Cache</h4>
                <div>";
            // line 182
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "cache", array()), "html", null, true);
            echo "s</div>
            ";
        }
        // line 184
        echo "
            </div>

            ";
        // line 187
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : $this->getContext($context, "enableSandbox"))) {
            // line 188
            echo "                <div class=\"pane sandbox\">
                    <form method=\"";
            // line 189
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "method", array())), "html", null, true);
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "uri", array()), "html", null, true);
            echo "\">
                        <fieldset class=\"parameters\">
                            <legend>Input</legend>
                            ";
            // line 192
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "requirements", array(), "any", true, true)) {
                // line 193
                echo "                                <h4>Requirements</h4>
                                ";
                // line 194
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "requirements", array()));
                foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                    // line 195
                    echo "                                    <p class=\"tuple\">
                                        <input type=\"text\" class=\"key\" value=\"";
                    // line 196
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "\" placeholder=\"Key\" />
                                        <span>=</span>
                                        <input type=\"text\" class=\"value\" placeholder=\"";
                    // line 198
                    if ($this->getAttribute($context["infos"], "description", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                    } else {
                        echo "Value";
                    }
                    echo "\" /> <span class=\"remove\">-</span>
                                    </p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 201
                echo "                            ";
            }
            // line 202
            echo "                            ";
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "filters", array(), "any", true, true)) {
                // line 203
                echo "                                <h4>Filters</h4>
                                ";
                // line 204
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "filters", array()));
                foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                    // line 205
                    echo "                                    <p class=\"tuple\">
                                        <input type=\"text\" class=\"key\" value=\"";
                    // line 206
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "\" placeholder=\"Key\" />
                                        <span>=</span>
                                        <input type=\"text\" class=\"value\" placeholder=\"";
                    // line 208
                    if ($this->getAttribute($context["infos"], "description", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                    } else {
                        echo "Value";
                    }
                    echo "\" /> <span class=\"remove\">-</span>
                                    </p>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 211
                echo "                            ";
            }
            // line 212
            echo "                            ";
            if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "parameters", array(), "any", true, true)) {
                // line 213
                echo "                                <h4>Parameters</h4>
                                ";
                // line 214
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "parameters", array()));
                foreach ($context['_seq'] as $context["name"] => $context["infos"]) {
                    // line 215
                    echo "                                ";
                    if ( !$this->getAttribute($context["infos"], "readonly", array())) {
                        // line 216
                        echo "                                    <p class=\"tuple\">
                                        <input type=\"text\" class=\"key\" value=\"";
                        // line 217
                        echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                        echo "\" placeholder=\"Key\" />
                                        <span>=</span>
                                        <input type=\"text\" class=\"value\" placeholder=\"";
                        // line 219
                        if ($this->getAttribute($context["infos"], "dataType", array())) {
                            echo "[";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "dataType", array()), "html", null, true);
                            echo "] ";
                        }
                        if ($this->getAttribute($context["infos"], "description", array())) {
                            echo twig_escape_filter($this->env, $this->getAttribute($context["infos"], "description", array()), "html", null, true);
                        } else {
                            echo "Value";
                        }
                        echo "\" /> <span class=\"remove\">-</span>
                                    </p>
                                ";
                    }
                    // line 222
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['infos'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 223
                echo "                                <button class=\"add\">New parameter</button>
                            ";
            }
            // line 225
            echo "
                        </fieldset>

                        <fieldset class=\"headers\">
                            <legend>Headers</legend>

                            ";
            // line 231
            if ((isset($context["acceptType"]) ? $context["acceptType"] : $this->getContext($context, "acceptType"))) {
                // line 232
                echo "                                <p class=\"tuple\">
                                    <input type=\"text\" class=\"key\" value=\"Accept\" />
                                    <span>=</span>
                                    <input type=\"text\" class=\"value\" value=\"";
                // line 235
                echo twig_escape_filter($this->env, (isset($context["acceptType"]) ? $context["acceptType"] : $this->getContext($context, "acceptType")), "html", null, true);
                echo "\" /> <span class=\"remove\">-</span>
                                </p>
                            ";
            }
            // line 238
            echo "
                            <p class=\"tuple\">
                                <input type=\"text\" class=\"key\" placeholder=\"Key\" />
                                <span>=</span>
                                <input type=\"text\" class=\"value\" placeholder=\"Value\" /> <span class=\"remove\">-</span>
                            </p>

                            <button class=\"add\">New header</button>
                        </fieldset>

                        <fieldset class=\"request-content\">
                            <legend>Content</legend>

                            <textarea class=\"content\" placeholder=\"Content set here will override the parameters that do not match the url\"></textarea>

                            <p class=\"tuple\">
                                <input type=\"text\" class=\"key content-type\" value=\"Content-Type\" disabled=\"disabled\" />
                                <span>=</span>
                                <input type=\"text\" class=\"value\" placeholder=\"Value\" />
                                <button class=\"set-content-type\">Set header</button> <small>Replaces header if set</small>
                            </p>
                        </fieldset>

                        <div class=\"buttons\">
                            <input type=\"submit\" value=\"Try!\" />
                        </div>
                    </form>

                    <script type=\"text/x-tmpl\" class=\"tuple_template\">
                    <p class=\"tuple\">
                        <input type=\"text\" class=\"key\" placeholder=\"Key\" />
                        <span>=</span>
                        <input type=\"text\" class=\"value\" placeholder=\"Value\" /> <span class=\"remove\">-</span>
                    </p>
                    </script>

                    <div class=\"result\">
                        <h4>Request URL</h4>
                        <pre class=\"url\"></pre>

                        <h4>Response Headers&nbsp;<small>[<a href=\"\" class=\"to-expand\">Expand</a>]</small></h4>
                        <pre class=\"headers to-expand\"></pre>

                        <h4>Response Body&nbsp;<small>[<a href=\"\" class=\"to-raw\">Raw</a>]</small></h4>
                        <pre class=\"response prettyprint\"></pre>
                    </div>
                </div>
            ";
        }
        // line 286
        echo "        </div>
    </div>
</li>
";
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::method.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  620 => 286,  570 => 238,  564 => 235,  559 => 232,  557 => 231,  549 => 225,  545 => 223,  539 => 222,  524 => 219,  519 => 217,  516 => 216,  513 => 215,  509 => 214,  506 => 213,  503 => 212,  500 => 211,  487 => 208,  482 => 206,  479 => 205,  475 => 204,  472 => 203,  469 => 202,  466 => 201,  453 => 198,  448 => 196,  445 => 195,  441 => 194,  438 => 193,  436 => 192,  428 => 189,  425 => 188,  423 => 187,  418 => 184,  413 => 182,  410 => 181,  408 => 180,  405 => 179,  400 => 176,  391 => 172,  382 => 170,  378 => 169,  370 => 166,  367 => 165,  363 => 164,  352 => 155,  350 => 154,  347 => 153,  342 => 150,  333 => 147,  329 => 146,  325 => 145,  321 => 144,  318 => 143,  314 => 142,  301 => 131,  299 => 130,  296 => 129,  291 => 126,  285 => 125,  279 => 122,  275 => 121,  271 => 120,  267 => 119,  264 => 118,  261 => 117,  257 => 116,  244 => 105,  242 => 104,  239 => 103,  234 => 100,  225 => 96,  216 => 93,  212 => 92,  209 => 91,  205 => 90,  199 => 87,  196 => 86,  192 => 85,  181 => 76,  179 => 75,  176 => 74,  171 => 71,  162 => 68,  158 => 67,  154 => 66,  150 => 65,  147 => 64,  143 => 63,  130 => 52,  128 => 51,  125 => 50,  120 => 48,  117 => 47,  115 => 46,  109 => 42,  105 => 40,  103 => 39,  93 => 36,  88 => 33,  82 => 31,  80 => 30,  73 => 26,  70 => 24,  68 => 23,  66 => 22,  62 => 20,  58 => 18,  55 => 17,  51 => 15,  49 => 14,  46 => 13,  40 => 9,  38 => 8,  32 => 5,  24 => 2,  19 => 1,);
    }
}
