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

/* display/import/javascript.twig */
class __TwigTemplate_82936756b351c5de712e68e1669bd3d56a105a43885d1a343928237ed6be3ca1 extends \Twig\Template
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
        echo "\$( function() {
    ";
        // line 3
        echo "    \$(\"#buttonGo\").on(\"click\", function() {
        ";
        // line 5
        echo "        \$(\"#upload_form_form\").css(\"display\", \"none\");

        ";
        // line 7
        if ((($context["handler"] ?? null) != "PhpMyAdmin\\Plugins\\Import\\Upload\\UploadNoplugin")) {
            // line 8
            echo "            ";
            // line 9
            echo "            ";
            $context["ajax_url"] = (("import_status.php?id=" . ($context["upload_id"] ?? null)) . PhpMyAdmin\Url::getCommonRaw(["import_status" => 1], "&"));
            // line 12
            echo "            ";
            $context["promot_str"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("The file being uploaded is probably larger than the maximum allowed size or this is a known bug in webkit based (Safari, Google Chrome, Arora etc.) browsers."), false);
            // line 13
            echo "            ";
            $context["statustext_str"] = PhpMyAdmin\Sanitize::escapeJsString(_gettext("%s of %s"));
            // line 14
            echo "            ";
            $context["second_str"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("%s/sec."), false);
            // line 15
            echo "            ";
            $context["remaining_min"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("About %MIN min. %SEC sec. remaining."), false);
            // line 16
            echo "            ";
            $context["remaining_second"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("About %SEC sec. remaining."), false);
            // line 17
            echo "            ";
            $context["processed_str"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("The file is being processed, please be patient."), false);
            // line 18
            echo "            ";
            $context["import_url"] = PhpMyAdmin\Url::getCommonRaw(["import_status" => 1], "&");
            // line 19
            echo "
            ";
            // line 20
            ob_start(function () { return ''; });
            // line 21
            echo "                ";
            ob_start(function () { return ''; });
            // line 22
            echo "                    <div class=\"upload_progress\">
                        <div class=\"upload_progress_bar_outer\">
                            <div class=\"percentage\"></div>
                            <div id=\"status\" class=\"upload_progress_bar_inner\">
                                <div class=\"percentage\"></div>
                            </div>
                        </div>
                        <div>
                            <img src=\"";
            // line 30
            echo twig_escape_filter($this->env, ($context["pma_theme_image"] ?? null), "html", null, true);
            echo "ajax_clock_small.gif\" width=\"16\" height=\"16\" alt=\"ajax clock\"> ";
            echo PhpMyAdmin\Sanitize::jsFormat(_gettext("Uploading your import file…"), false);
            // line 31
            echo "</div>
                        <div id=\"statustext\"></div>
                    </div>
                ";
            $___internal_61f76dd92e4e7eb56460a147961a92b459f41fb48a48fbda03a40745fda66f4a_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 21
            echo twig_spaceless($___internal_61f76dd92e4e7eb56460a147961a92b459f41fb48a48fbda03a40745fda66f4a_);
            // line 35
            echo "            ";
            $context["upload_html"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 36
            echo "
            ";
            // line 38
            echo "            var finished = false;
            var percent  = 0.0;
            var total    = 0;
            var complete = 0;
            var original_title = parent && parent.document ? parent.document.title : false;
            var import_start;

            var perform_upload = function () {
            new \$.getJSON(
                \"";
            // line 47
            echo ($context["ajax_url"] ?? null);
            echo "\",
                {},
                function(response) {
                    finished = response.finished;
                    percent = response.percent;
                    total = response.total;
                    complete = response.complete;

                    if (total==0 && complete==0 && percent==0) {
                        \$(\"#upload_form_status_info\").html('<img src=\"";
            // line 56
            echo twig_escape_filter($this->env, ($context["pma_theme_image"] ?? null), "html", null, true);
            echo "ajax_clock_small.gif\" width=\"16\" height=\"16\" alt=\"ajax clock\"> ";
            echo ($context["promot_str"] ?? null);
            echo "');
                        \$(\"#upload_form_status\").css(\"display\", \"none\");
                    } else {
                        var now = new Date();
                        now = Date.UTC(
                            now.getFullYear(),
                            now.getMonth(),
                            now.getDate(),
                            now.getHours(),
                            now.getMinutes(),
                            now.getSeconds())
                            + now.getMilliseconds() - 1000;
                        var statustext = Functions.sprintf(
                            \"";
            // line 69
            echo ($context["statustext_str"] ?? null);
            echo "\",
                            Functions.formatBytes(
                                complete, 1, Messages.strDecimalSeparator
                            ),
                            Functions.formatBytes(
                                total, 1, Messages.strDecimalSeparator
                            )
                        );

                        if (\$(\"#importmain\").is(\":visible\")) {
                            ";
            // line 80
            echo "                            \$(\"#importmain\").hide();
                            \$(\"#import_form_status\")
                            .html('";
            // line 82
            echo ($context["upload_html"] ?? null);
            echo "')
                            .show();
                            import_start = now;
                        }
                        else if (percent > 9 || complete > 2000000) {
                            ";
            // line 88
            echo "                            var used_time = now - import_start;
                            var seconds = parseInt(((total - complete) / complete) * used_time / 1000);
                            var speed = Functions.sprintf(
                                \"";
            // line 91
            echo ($context["second_str"] ?? null);
            echo "\",
                                Functions.formatBytes(complete / used_time * 1000, 1, Messages.strDecimalSeparator)
                            );

                            var minutes = parseInt(seconds / 60);
                            seconds %= 60;
                            var estimated_time;
                            if (minutes > 0) {
                                estimated_time = \"";
            // line 99
            echo ($context["remaining_min"] ?? null);
            echo "\"
                                    .replace(\"%MIN\", minutes)
                                    .replace(\"%SEC\", seconds);
                            }
                            else {
                                estimated_time = \"";
            // line 104
            echo ($context["remaining_second"] ?? null);
            echo "\"
                                .replace(\"%SEC\", seconds);
                            }

                            statustext += \"<br>\" + speed + \"<br><br>\" + estimated_time;
                        }

                        var percent_str = Math.round(percent) + \"%\";
                        \$(\"#status\").animate({width: percent_str}, 150);
                        \$(\".percentage\").text(percent_str);

                        ";
            // line 116
            echo "                        if (original_title !== false) {
                            parent.document.title
                                = percent_str + \" - \" + original_title;
                        }
                        else {
                            document.title
                                = percent_str + \" - \" + original_title;
                        }
                        \$(\"#statustext\").html(statustext);
                    }

                    if (finished == true) {
                        if (original_title !== false) {
                            parent.document.title = original_title;
                        }
                        else {
                            document.title = original_title;
                        }
                        \$(\"#importmain\").hide();
                        ";
            // line 136
            echo "                        \$(\"#import_form_status\")
                        .html('<img src=\"";
            // line 137
            echo twig_escape_filter($this->env, ($context["pma_theme_image"] ?? null), "html", null, true);
            echo "ajax_clock_small.gif\" width=\"16\" height=\"16\" alt=\"ajax clock\"> ";
            echo ($context["processed_str"] ?? null);
            echo "')
                        .show();
                        \$(\"#import_form_status\").load(\"import_status.php?message=true&";
            // line 139
            echo ($context["import_url"] ?? null);
            echo "\");
                        Navigation.reload();

                        ";
            // line 143
            echo "                    }
                    else {
                        setTimeout(perform_upload, 1000);
                    }
                });
            };
            setTimeout(perform_upload, 1000);
        ";
        } else {
            // line 151
            echo "            ";
            // line 152
            echo "            ";
            ob_start(function () { return ''; });
            // line 153
            echo "<img src=\"";
            echo twig_escape_filter($this->env, ($context["pma_theme_image"] ?? null), "html", null, true);
            // line 154
            echo "ajax_clock_small.gif\" width=\"16\" height=\"16\" alt=\"ajax clock\">";
            // line 155
            echo PhpMyAdmin\Sanitize::jsFormat(_gettext("Please be patient, the file is being uploaded. Details about the upload are not available."), false);
            // line 156
            echo PhpMyAdmin\Util::showDocu("faq", "faq2-9");
            $context["image_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 158
            echo "            \$('#upload_form_status_info').html('";
            echo ($context["image_tag"] ?? null);
            echo "');
            \$(\"#upload_form_status\").css(\"display\", \"none\");
        ";
        }
        // line 161
        echo "    });
});
";
    }

    public function getTemplateName()
    {
        return "display/import/javascript.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 161,  277 => 158,  274 => 156,  272 => 155,  270 => 154,  267 => 153,  264 => 152,  262 => 151,  252 => 143,  246 => 139,  239 => 137,  236 => 136,  215 => 116,  201 => 104,  193 => 99,  182 => 91,  177 => 88,  169 => 82,  165 => 80,  152 => 69,  134 => 56,  122 => 47,  111 => 38,  108 => 36,  105 => 35,  103 => 21,  97 => 31,  93 => 30,  83 => 22,  80 => 21,  78 => 20,  75 => 19,  72 => 18,  69 => 17,  66 => 16,  63 => 15,  60 => 14,  57 => 13,  54 => 12,  51 => 9,  49 => 8,  47 => 7,  43 => 5,  40 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "display/import/javascript.twig", "/Users/josefsanda/Documents/sdu/internet_technology/project_internet/project_internet/phpmyadmin/templates/display/import/javascript.twig");
    }
}
