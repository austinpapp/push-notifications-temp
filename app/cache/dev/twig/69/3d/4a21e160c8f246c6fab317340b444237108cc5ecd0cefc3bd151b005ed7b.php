<?php

/* CivixFrontBundle:PaymentSettings:stripe.html.twig */
class __TwigTemplate_693d4a21e160c8f246c6fab317340b444237108cc5ecd0cefc3bd151b005ed7b extends Twig_Template
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
        echo "<script type=\"text/javascript\" src=\"https://js.stripe.com/v2/\"></script>
<script type=\"text/javascript\">
    Stripe.setPublishableKey('";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["stripe_publishable_key"]) ? $context["stripe_publishable_key"] : $this->getContext($context, "stripe_publishable_key")), "html", null, true);
        echo "');
</script>

<div id=\"stripeCardForm\" class=\"modal hide fade\">
    <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h3>Add Card</h3>
    </div>
    <form class=\"form form-horizontal\">
        <div class=\"modal-body\">
            <p class=\"text-error hide\"></p>
                <div class=\"control-group\">
                    <label class=\"control-label\">Name</label>
                    <div class=\"controls\">
                        <input type=\"text\" name=\"name\" required=\"required\" class=\"not-removable\">
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\">Card Number</label>
                    <div class=\"controls\">
                        <input type=\"text\" name=\"card-number\" required=\"required\" class=\"not-removable\">
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\">Security Code</label>
                    <div class=\"controls\">
                        <input type=\"text\" name=\"card-cvc\" required=\"required\" class=\"not-removable\">
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\">Expiration Month</label>
                    <div class=\"controls\">
                        <input type=\"text\" name=\"card-expiry-month\" required=\"required\" class=\"not-removable\">
                    </div>
                </div>
                <div class=\"control-group\">
                    <label class=\"control-label\">Expiration Year</label>
                    <div class=\"controls\">
                        <input type=\"text\" name=\"card-expiry-year\" required=\"required\" class=\"not-removable\">
                    </div>
                </div>
        </div>
        <div class=\"modal-footer\">
            <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
            <button href=\"#\" class=\"btn btn-primary\" type=\"submit\">Add</button>
        </div>
    </form>
</div>

<div id=\"stripeAccountForm\" class=\"modal hide fade\">
    <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h3>Add Bank Account</h3>
    </div>
    <form class=\"form form-horizontal\">
        <div class=\"modal-body\">
            <p class=\"text-error hide\"></p>

            <div class=\"control-group\">
                <label class=\"control-label\">Type</label>
                <div class=\"controls\">
                    <select name=\"type\">
                        <option value=\"individual\">Individual</option>
                        <option value=\"company\">Company</option>
                    </select>
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Business Name</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"business_name\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">First Name</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"first_name\" required=\"required\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Last Name</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"last_name\" required=\"required\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Address line 1</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"address_line1\" required=\"required\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Address line 2 </label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"address_line2\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">City</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"city\" required=\"required\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">State</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"state\" required=\"required\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Postal Code</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"postal_code\" class=\"not-removable\">
                </div>
            </div>

            <div class=\"control-group\">
                <label class=\"control-label\">Country</label>
                <div class=\"controls\">
                    <select name=\"country\">
                        <option></option>
                        <option>AT</option>
                        <option>AU</option>
                        <option>BE</option>
                        <option>CA</option>
                        <option>CH</option>
                        <option>DE</option>
                        <option>DK</option>
                        <option>ES</option>
                        <option>FI</option>
                        <option>GB</option>
                        <option>IE</option>
                        <option>IT</option>
                        <option>LU</option>
                        <option>MX</option>
                        <option>NL</option>
                        <option>NO</option>
                        <option>SE</option>
                        <option>US</option>
                    </select>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Last four digits of the Social Security Number</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"ssn_last_4\" required=\"required\" class=\"not-removable\">
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Currency</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"currency\" value=\"USD\" required=\"required\" class=\"not-removable\" disabled=\"disabled\">
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Routing Number</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"routing_number\" required=\"required\" class=\"not-removable\">
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Account Number</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"account_number\" required=\"required\" class=\"not-removable\">
                </div>
            </div>
        </div>
        <div class=\"modal-footer\">
            <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
            <button href=\"#\" class=\"btn btn-primary\" type=\"submit\">Add</button>
        </div>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "CivixFrontBundle:PaymentSettings:stripe.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
