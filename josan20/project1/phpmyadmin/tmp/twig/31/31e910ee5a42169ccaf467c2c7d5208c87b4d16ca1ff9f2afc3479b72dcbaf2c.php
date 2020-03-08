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

/* sql/sql_query_results.twig */
class __TwigTemplate_9780ed7118f680f42bce0b00ceb6bc7771b66fd37f6fbc4b7d05734366f78859 extends \Twig\Template
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
        echo ($context["table_maintenance"] ?? null);
        echo "
<div class=\"sqlqueryresults ajax\">
    ";
        // line 3
        echo ($context["previous_update_query"] ?? null);
        echo "
    ";
        // line 4
        echo ($context["profiling_chart"] ?? null);
        echo "
    ";
        // line 5
        echo ($context["missing_unique_column_message"] ?? null);
        echo "
    ";
        // line 6
        echo ($context["bookmark_created_message"] ?? null);
        echo "
    ";
        // line 7
        echo ($context["table"] ?? null);
        echo "
    ";
        // line 8
        echo ($context["indexes_problems"] ?? null);
        echo "
    ";
        // line 9
        echo ($context["bookmark_support"] ?? null);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "sql/sql_query_results.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 9,  62 => 8,  58 => 7,  54 => 6,  50 => 5,  46 => 4,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sql/sql_query_results.twig", "/Users/josefsanda/Documents/sdu/internet_technology/SDU-ITI-F20/josan20/project1/phpmyadmin/templates/sql/sql_query_results.twig");
    }
}
