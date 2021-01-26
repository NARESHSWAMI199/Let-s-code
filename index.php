<?php
include('./base.php');
require('./dbconfig.php');
session_start();
require('./views.php');
?>
<div class="container mt-5 ">


    <!-- Name of program -->
    <?php $searched_item = search_value($conn); ?>
    <h2 class=""><?php echo $searched_item['name']; ?> :- </h2>


    <!-- links for other code pages -->
    <div class="row mt-5">
        <!-- /links for other code pages -->
        <div class="col-lg-4 col-md-4 d-none d-md-block d-lg-block col-sm-12">
            <?php $lang = get_lang($conn);
            for ($var = 0; $var < sizeof($lang); $var++) {
                button_search_form($lang[$var][0], $lang[$var][0]);
            }
            ?>
        </div>
        <!-- displaying code -->
        <div class="shadow-sm  col-lg-7 px-sm-1 col-md-7 col-sm-6 " id="d_code">
            <pre class="prettyprint offset-1 border-0 bg-white pb-3 ">
        <button contenteditable="true" class="btn float-right btn-sm btn-outline-primary" id="FailCopy" type="button" onclick="copyToClipboard('#error-details')">Copy</button>
            <pre class="prettyprint offset-1 border-0 bg-white pb-3 " id="error-details">
                <?php echo "<br>", $searched_item['program']; ?>
            </pre>
        </div>

        <!-- /displaying code -->

        <!-- display result of program -->
        <div class="col-lg-8 col-sm-10 offset-lg-4" id="d_code">
            <pre class="prettyprint  border-0 bg-white pb-3 mt-5 " id="error-details">
                <?php echo "<br>", $searched_item['result']; ?>
            </pre>
        </div>
        <!-- /end diplaying results -->

        <!-- search form -->
        <div class='col-12 mt-5'>
            <?php $search_form = search_form($searched_item['lang_name']); ?>
        </div>

        <!-- /search form  -->

        <div id="fb-root" class="col-12 shadow-sm"></div>
        <div class="fb-comments col-12 shadow-sm mb-3 mt-3" data-href="http://localhost/nsfuntu/index.php" data-width="" data-numposts="5"></div>

        <?php $array = get_name($conn, $searched_item['lang_name']);
        for ($var = 0; $var < sizeof($array); $var++) { ?>
            <div class="col-lg-4 col-sm-12 col-md-4 ">
                <?php button_search_form($array[$var][0], $array[$var][1]); ?>
            </div>
        <?php } ?>
    </div>
    <br><br>
</div>
<script>
    $(".fb-comments").attr("data-href", window.location.href);
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=114215202075258";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // use for dynamic location comments
    $(".fb-comments").attr("data-href", window.location.href);

    // using copy clipbord code
    function copyToClipboard(element) {
        var text = $(element).clone().find('br').prepend('\r\n').end().text()
        element = $('<textarea>').appendTo('body').val(text).select()
        document.execCommand('copy')
        element.remove()
    }
</script>
<?php include('./footer.php') ?>

