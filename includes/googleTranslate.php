<script type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        let systemLan = navigator.language || navigator.userLanguage;
        new google.translate.TranslateElement({
            pageLanguage: systemLan.substr(0, 2),
            defaultLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }
            , 'google_translate_element');
    }
</script>
<!-- Hiding google translate banner -->
<?php
if ($title == "Home" && !strstr($_SERVER['REQUEST_URI'], "account")) {
    ?>
    <style>
        body {
            top: 0px !important;
        }

        .skiptranslate iframe,
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf.VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
            display: none;
        }
    </style>
    <?php
} else {
    ?>
    <style>
        body {
            top: 0px !important;
        }

        .skiptranslate,
        #google_translate_element,
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf.VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
            display: none;
        }
    </style>
    <div id="google_translate_element" class="py-2 px-5"></div>
    <?php
}
?>