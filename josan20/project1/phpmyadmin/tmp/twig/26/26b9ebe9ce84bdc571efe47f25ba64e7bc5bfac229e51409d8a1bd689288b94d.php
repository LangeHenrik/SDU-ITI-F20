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

/* columns_definitions/column_attributes.twig */
class __TwigTemplate_2d0d97a814dc3d199e67a3dd0fa91b428835de448a3d686ae2ad53561831aa3d extends \Twig\Template
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
        // line 2
        $context["ci"] = 0;
        // line 3
        echo "
";
        // line 6
        $context["ci_offset"] =  -1;
        // line 7
        echo "
<td class=\"center\">
    ";
        // line 10
        echo "    ";
        $this->loadTemplate("columns_definitions/column_name.twig", "columns_definitions/column_attributes.twig", 10)->display(twig_to_array(["column_number" =>         // line 11
($context["column_number"] ?? null), "ci" =>         // line 12
($context["ci"] ?? null), "ci_offset" =>         // line 13
($context["ci_offset"] ?? null), "column_meta" =>         // line 14
($context["column_meta"] ?? null), "cfg_relation" =>         // line 15
($context["cfg_relation"] ?? null), "max_rows" =>         // line 16
($context["max_rows"] ?? null)]));
        // line 18
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 19
        echo "</td>
<td class=\"center\">
    ";
        // line 22
        echo "    ";
        $this->loadTemplate("columns_definitions/column_type.twig", "columns_definitions/column_attributes.twig", 22)->display(twig_to_array(["column_number" =>         // line 23
($context["column_number"] ?? null), "ci" =>         // line 24
($context["ci"] ?? null), "ci_offset" =>         // line 25
($context["ci_offset"] ?? null), "column_meta" =>         // line 26
($context["column_meta"] ?? null), "type_upper" =>         // line 27
($context["type_upper"] ?? null)]));
        // line 29
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 30
        echo "</td>
<td class=\"center\">
    ";
        // line 33
        echo "    ";
        $this->loadTemplate("columns_definitions/column_length.twig", "columns_definitions/column_attributes.twig", 33)->display(twig_to_array(["column_number" =>         // line 34
($context["column_number"] ?? null), "ci" =>         // line 35
($context["ci"] ?? null), "ci_offset" =>         // line 36
($context["ci_offset"] ?? null), "length_values_input_size" =>         // line 37
($context["length_values_input_size"] ?? null), "length_to_display" =>         // line 38
($context["length"] ?? null)]));
        // line 40
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 41
        echo "</td>
<td class=\"center\">
    ";
        // line 44
        echo "    ";
        $this->loadTemplate("columns_definitions/column_default.twig", "columns_definitions/column_attributes.twig", 44)->display(twig_to_array(["column_number" =>         // line 45
($context["column_number"] ?? null), "ci" =>         // line 46
($context["ci"] ?? null), "ci_offset" =>         // line 47
($context["ci_offset"] ?? null), "column_meta" =>         // line 48
($context["column_meta"] ?? null), "type_upper" =>         // line 49
($context["type_upper"] ?? null), "default_value" =>         // line 50
($context["default_value"] ?? null), "char_editing" =>         // line 51
($context["char_editing"] ?? null)]));
        // line 53
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 54
        echo "</td>
<td class=\"center\">
  ";
        // line 57
        echo "  <select lang=\"en\" dir=\"ltr\" name=\"field_collation[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\" id=\"field_";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\">
    <option value=\"\"></option>
    ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
            // line 60
            echo "      <optgroup label=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 60), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 60), "html", null, true);
            echo "\">
        ";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 61));
            foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                // line 62
                echo "          <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 62), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 62), "html", null, true);
                echo "\"";
                // line 63
                echo (((twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 63) == (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["column_meta"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["Collation"] ?? null) : null))) ? (" selected") : (""));
                echo ">";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 64), "html", null, true);
                // line 65
                echo "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "      </optgroup>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "  </select>
  ";
        // line 70
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 71
        echo "</td>
<td class=\"center\">
    ";
        // line 74
        echo "    ";
        $this->loadTemplate("columns_definitions/column_attribute.twig", "columns_definitions/column_attributes.twig", 74)->display(twig_to_array(["column_number" =>         // line 75
($context["column_number"] ?? null), "ci" =>         // line 76
($context["ci"] ?? null), "ci_offset" =>         // line 77
($context["ci_offset"] ?? null), "column_meta" =>         // line 78
($context["column_meta"] ?? null), "extracted_columnspec" =>         // line 79
($context["extracted_columnspec"] ?? null), "submit_attribute" =>         // line 80
($context["submit_attribute"] ?? null), "attribute_types" =>         // line 81
($context["attribute_types"] ?? null)]));
        // line 83
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 84
        echo "</td>
<td class=\"center\">
    ";
        // line 87
        echo "    ";
        $this->loadTemplate("columns_definitions/column_null.twig", "columns_definitions/column_attributes.twig", 87)->display(twig_to_array(["column_number" =>         // line 88
($context["column_number"] ?? null), "ci" =>         // line 89
($context["ci"] ?? null), "ci_offset" =>         // line 90
($context["ci_offset"] ?? null), "column_meta" =>         // line 91
($context["column_meta"] ?? null)]));
        // line 93
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 94
        echo "</td>
";
        // line 95
        if (((isset($context["change_column"]) || array_key_exists("change_column", $context)) &&  !twig_test_empty(($context["change_column"] ?? null)))) {
            // line 96
            echo "    ";
            // line 97
            echo "    <td class=\"center\">
        ";
            // line 98
            $this->loadTemplate("columns_definitions/column_adjust_privileges.twig", "columns_definitions/column_attributes.twig", 98)->display(twig_to_array(["column_number" =>             // line 99
($context["column_number"] ?? null), "ci" =>             // line 100
($context["ci"] ?? null), "ci_offset" =>             // line 101
($context["ci_offset"] ?? null), "privs_available" =>             // line 102
($context["privs_available"] ?? null)]));
            // line 104
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 105
            echo "    </td>
";
        }
        // line 107
        if ( !($context["is_backup"] ?? null)) {
            // line 108
            echo "    ";
            // line 109
            echo "    <td class=\"center\">
        ";
            // line 110
            $this->loadTemplate("columns_definitions/column_indexes.twig", "columns_definitions/column_attributes.twig", 110)->display(twig_to_array(["column_number" =>             // line 111
($context["column_number"] ?? null), "ci" =>             // line 112
($context["ci"] ?? null), "ci_offset" =>             // line 113
($context["ci_offset"] ?? null), "column_meta" =>             // line 114
($context["column_meta"] ?? null)]));
            // line 116
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 117
            echo "    </td>
";
        }
        // line 119
        echo "<td class=\"center\">
    ";
        // line 121
        echo "    ";
        $this->loadTemplate("columns_definitions/column_auto_increment.twig", "columns_definitions/column_attributes.twig", 121)->display(twig_to_array(["column_number" =>         // line 122
($context["column_number"] ?? null), "ci" =>         // line 123
($context["ci"] ?? null), "ci_offset" =>         // line 124
($context["ci_offset"] ?? null), "column_meta" =>         // line 125
($context["column_meta"] ?? null)]));
        // line 127
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 128
        echo "</td>
<td class=\"center\">
    ";
        // line 131
        echo "    ";
        $this->loadTemplate("columns_definitions/column_comment.twig", "columns_definitions/column_attributes.twig", 131)->display(twig_to_array(["column_number" =>         // line 132
($context["column_number"] ?? null), "ci" =>         // line 133
($context["ci"] ?? null), "ci_offset" =>         // line 134
($context["ci_offset"] ?? null), "max_length" =>         // line 135
($context["max_length"] ?? null), "value" => ((((twig_get_attribute($this->env, $this->source,         // line 136
($context["column_meta"] ?? null), "Field", [], "array", true, true, false, 136) && twig_test_iterable(        // line 137
($context["comments_map"] ?? null))) && twig_get_attribute($this->env, $this->source,         // line 138
($context["comments_map"] ?? null), (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["column_meta"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["Field"] ?? null) : null), [], "array", true, true, false, 138))) ? (twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b =         // line 139
($context["comments_map"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[(($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["column_meta"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["Field"] ?? null) : null)] ?? null) : null))) : (""))]));
        // line 141
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 142
        echo "</td>
 ";
        // line 144
        if (($context["is_virtual_columns_supported"] ?? null)) {
            // line 145
            echo "    <td class=\"center\">
        ";
            // line 146
            $this->loadTemplate("columns_definitions/column_virtuality.twig", "columns_definitions/column_attributes.twig", 146)->display(twig_to_array(["column_number" =>             // line 147
($context["column_number"] ?? null), "ci" =>             // line 148
($context["ci"] ?? null), "ci_offset" =>             // line 149
($context["ci_offset"] ?? null), "column_meta" =>             // line 150
($context["column_meta"] ?? null), "char_editing" =>             // line 151
($context["char_editing"] ?? null), "expression" => ((twig_get_attribute($this->env, $this->source,             // line 152
($context["column_meta"] ?? null), "Expression", [], "array", true, true, false, 152)) ? ((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["column_meta"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["Expression"] ?? null) : null)) : ("")), "options" =>             // line 153
($context["options"] ?? null)]));
            // line 155
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 156
            echo "    </td>
";
        }
        // line 159
        if ((isset($context["fields_meta"]) || array_key_exists("fields_meta", $context))) {
            // line 160
            echo "    ";
            $context["current_index"] = 0;
            // line 161
            echo "    ";
            $context["cols"] = (twig_length_filter($this->env, ($context["move_columns"] ?? null)) - 1);
            // line 162
            echo "    ";
            $context["break"] = false;
            // line 163
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ($context["cols"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["mi"]) {
                // line 164
                echo "      ";
                if (((twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["move_columns"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[$context["mi"]] ?? null) : null), "name", [], "any", false, false, false, 164) == (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["column_meta"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["Field"] ?? null) : null)) &&  !($context["break"] ?? null))) {
                    // line 165
                    echo "        ";
                    $context["current_index"] = $context["mi"];
                    // line 166
                    echo "        ";
                    $context["break"] = true;
                    // line 167
                    echo "      ";
                }
                // line 168
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mi'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 169
            echo "
    <td class=\"center\">
        ";
            // line 171
            $this->loadTemplate("columns_definitions/move_column.twig", "columns_definitions/column_attributes.twig", 171)->display(twig_to_array(["column_number" =>             // line 172
($context["column_number"] ?? null), "ci" =>             // line 173
($context["ci"] ?? null), "ci_offset" =>             // line 174
($context["ci_offset"] ?? null), "column_meta" =>             // line 175
($context["column_meta"] ?? null), "move_columns" =>             // line 176
($context["move_columns"] ?? null), "current_index" =>             // line 177
($context["current_index"] ?? null)]));
            // line 179
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 180
            echo "    </td>
";
        }
        // line 182
        echo "
";
        // line 183
        if ((((($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["cfg_relation"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["mimework"] ?? null) : null) && ($context["browse_mime"] ?? null)) && (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["cfg_relation"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["commwork"] ?? null) : null))) {
            // line 184
            echo "    <td class=\"center\">
        ";
            // line 186
            echo "        ";
            $this->loadTemplate("columns_definitions/mime_type.twig", "columns_definitions/column_attributes.twig", 186)->display(twig_to_array(["column_number" =>             // line 187
($context["column_number"] ?? null), "ci" =>             // line 188
($context["ci"] ?? null), "ci_offset" =>             // line 189
($context["ci_offset"] ?? null), "column_meta" =>             // line 190
($context["column_meta"] ?? null), "available_mime" =>             // line 191
($context["available_mime"] ?? null), "mime_map" =>             // line 192
($context["mime_map"] ?? null)]));
            // line 194
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 195
            echo "    </td>
    <td class=\"center\">
        ";
            // line 198
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation.twig", "columns_definitions/column_attributes.twig", 198)->display(twig_to_array(["column_number" =>             // line 199
($context["column_number"] ?? null), "ci" =>             // line 200
($context["ci"] ?? null), "ci_offset" =>             // line 201
($context["ci_offset"] ?? null), "column_meta" =>             // line 202
($context["column_meta"] ?? null), "available_mime" =>             // line 203
($context["available_mime"] ?? null), "mime_map" =>             // line 204
($context["mime_map"] ?? null), "type" => "transformation"]));
            // line 207
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 208
            echo "    </td>
    <td class=\"center\">
        ";
            // line 211
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation_option.twig", "columns_definitions/column_attributes.twig", 211)->display(twig_to_array(["column_number" =>             // line 212
($context["column_number"] ?? null), "ci" =>             // line 213
($context["ci"] ?? null), "ci_offset" =>             // line 214
($context["ci_offset"] ?? null), "column_meta" =>             // line 215
($context["column_meta"] ?? null), "mime_map" =>             // line 216
($context["mime_map"] ?? null), "type_prefix" => ""]));
            // line 219
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 220
            echo "    </td>
    <td class=\"center\">
        ";
            // line 223
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation.twig", "columns_definitions/column_attributes.twig", 223)->display(twig_to_array(["column_number" =>             // line 224
($context["column_number"] ?? null), "ci" =>             // line 225
($context["ci"] ?? null), "ci_offset" =>             // line 226
($context["ci_offset"] ?? null), "column_meta" =>             // line 227
($context["column_meta"] ?? null), "available_mime" =>             // line 228
($context["available_mime"] ?? null), "mime_map" =>             // line 229
($context["mime_map"] ?? null), "type" => "input_transformation"]));
            // line 232
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 233
            echo "    </td>
    <td class=\"center\">
        ";
            // line 236
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation_option.twig", "columns_definitions/column_attributes.twig", 236)->display(twig_to_array(["column_number" =>             // line 237
($context["column_number"] ?? null), "ci" =>             // line 238
($context["ci"] ?? null), "ci_offset" =>             // line 239
($context["ci_offset"] ?? null), "column_meta" =>             // line 240
($context["column_meta"] ?? null), "mime_map" =>             // line 241
($context["mime_map"] ?? null), "type_prefix" => "input_"]));
            // line 244
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 245
            echo "    </td>
";
        }
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_attributes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  430 => 245,  427 => 244,  425 => 241,  424 => 240,  423 => 239,  422 => 238,  421 => 237,  419 => 236,  415 => 233,  412 => 232,  410 => 229,  409 => 228,  408 => 227,  407 => 226,  406 => 225,  405 => 224,  403 => 223,  399 => 220,  396 => 219,  394 => 216,  393 => 215,  392 => 214,  391 => 213,  390 => 212,  388 => 211,  384 => 208,  381 => 207,  379 => 204,  378 => 203,  377 => 202,  376 => 201,  375 => 200,  374 => 199,  372 => 198,  368 => 195,  365 => 194,  363 => 192,  362 => 191,  361 => 190,  360 => 189,  359 => 188,  358 => 187,  356 => 186,  353 => 184,  351 => 183,  348 => 182,  344 => 180,  341 => 179,  339 => 177,  338 => 176,  337 => 175,  336 => 174,  335 => 173,  334 => 172,  333 => 171,  329 => 169,  323 => 168,  320 => 167,  317 => 166,  314 => 165,  311 => 164,  306 => 163,  303 => 162,  300 => 161,  297 => 160,  295 => 159,  291 => 156,  288 => 155,  286 => 153,  285 => 152,  284 => 151,  283 => 150,  282 => 149,  281 => 148,  280 => 147,  279 => 146,  276 => 145,  274 => 144,  271 => 142,  268 => 141,  266 => 139,  265 => 138,  264 => 137,  263 => 136,  262 => 135,  261 => 134,  260 => 133,  259 => 132,  257 => 131,  253 => 128,  250 => 127,  248 => 125,  247 => 124,  246 => 123,  245 => 122,  243 => 121,  240 => 119,  236 => 117,  233 => 116,  231 => 114,  230 => 113,  229 => 112,  228 => 111,  227 => 110,  224 => 109,  222 => 108,  220 => 107,  216 => 105,  213 => 104,  211 => 102,  210 => 101,  209 => 100,  208 => 99,  207 => 98,  204 => 97,  202 => 96,  200 => 95,  197 => 94,  194 => 93,  192 => 91,  191 => 90,  190 => 89,  189 => 88,  187 => 87,  183 => 84,  180 => 83,  178 => 81,  177 => 80,  176 => 79,  175 => 78,  174 => 77,  173 => 76,  172 => 75,  170 => 74,  166 => 71,  164 => 70,  161 => 69,  154 => 67,  147 => 65,  145 => 64,  142 => 63,  136 => 62,  132 => 61,  125 => 60,  121 => 59,  111 => 57,  107 => 54,  104 => 53,  102 => 51,  101 => 50,  100 => 49,  99 => 48,  98 => 47,  97 => 46,  96 => 45,  94 => 44,  90 => 41,  87 => 40,  85 => 38,  84 => 37,  83 => 36,  82 => 35,  81 => 34,  79 => 33,  75 => 30,  72 => 29,  70 => 27,  69 => 26,  68 => 25,  67 => 24,  66 => 23,  64 => 22,  60 => 19,  57 => 18,  55 => 16,  54 => 15,  53 => 14,  52 => 13,  51 => 12,  50 => 11,  48 => 10,  44 => 7,  42 => 6,  39 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/column_attributes.twig", "/Users/josefsanda/Documents/sdu/internet_technology/project_internet/project_internet/phpmyadmin/templates/columns_definitions/column_attributes.twig");
    }
}
