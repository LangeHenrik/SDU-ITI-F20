<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* columns_definitions/column_virtuality.twig */
class __TwigTemplate_cd05c310afa320632110ec0b3a1fdc606e28cf91fdf17bc9b7e800b32dd177ab extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<select name=\"field_virtuality[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    id=\"field_";
        // line 2
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    class=\"virtuality\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 5
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"
            ";
            // line 6
            $context["key_length"] = twig_length_filter($this->env, $context["key"]);
            // line 7
            if (((twig_get_attribute($this->env, $this->source, ($context["column_meta"] ?? null), "Extra", [], "array", true, true, false, 7) && (            // line 8
$context["key"] != "")) && (twig_slice($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 =             // line 9
($context["column_meta"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["Extra"] ?? null) : null), 0, ($context["key_length"] ?? null)) === $context["key"]))) {
                // line 10
                echo "                selected=\"selected\"";
            }
            // line 11
            echo ">
            ";
            // line 12
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
        </option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "</select>

";
        // line 17
        if ((($context["char_editing"] ?? null) == "textarea")) {
            // line 18
            echo "    ";
            ob_start(function () { return ''; });
            // line 19
            echo "    <textarea name=\"field_expression[";
            echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
            echo "]\"
        cols=\"15\"
        class=\"textfield expression\">
        ";
            // line 22
            echo twig_escape_filter($this->env, ($context["expression"] ?? null), "html", null, true);
            echo "
    </textarea>
    ";
            $___internal_8e1d07ea2cc14c0eae0db150607c19724543ff66da1098dbdb6c2cb924118537_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 18
            echo twig_spaceless($___internal_8e1d07ea2cc14c0eae0db150607c19724543ff66da1098dbdb6c2cb924118537_);
        } else {
            // line 26
            echo "    <input type=\"text\"
        name=\"field_expression[";
            // line 27
            echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
            echo "]\"
        size=\"12\"
        value=\"";
            // line 29
            echo twig_escape_filter($this->env, ($context["expression"] ?? null), "html", null, true);
            echo "\"
        placeholder=\"";
            // line 30
            echo _gettext("Expression");
            echo "\"
        class=\"textfield expression\">
";
        }
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_virtuality.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 30,  112 => 29,  107 => 27,  104 => 26,  101 => 18,  95 => 22,  88 => 19,  85 => 18,  83 => 17,  79 => 15,  70 => 12,  67 => 11,  64 => 10,  62 => 9,  61 => 8,  60 => 7,  58 => 6,  53 => 5,  49 => 4,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/column_virtuality.twig", "/Users/josefsanda/Documents/sdu/internet_technology/project_internet/project_internet/phpmyadmin/templates/columns_definitions/column_virtuality.twig");
    }
}
