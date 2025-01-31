<?php
if ( ! defined( 'ABSPATH' ) ||  ! defined( 'slideIT_ADMIN' ) ): exit; endif;

global $slide_it_version, $slide_it_time;

require_once slideIT_ADMIN . 'admin-functions.php';

slide_it_time();

?>
<script>
    // instance of the clipboard
    var wpcShort = new ClipboardJS('.wpc-copy');
</script>

<div style="margin: 10px 20px 0 2px;">

    <div class="wpc header">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <p><?php esc_html_e( 'Hello, You!', 'slide-it-slider-for-woocommerce' );?></p>
    </div>
    <div id="shortcode-field"></div>
    <div class="wpc-shortcode-generator" id="wpc-light">
        <form id="wpc-form">
            <label for="cat-name"><?php esc_html_e( 'Category Name', 'slide-it-slider-for-woocommerce' );?></label>
                <input type="text" list="wpc-cat-list" name="cat-name" id="cat-name" placeholder="e.g. Pet-Shop">
                <datalist id="wpc-cat-list">
                    <?php echo slideIT_show_categories();?>
                </datalist>

            <label for="num-p"><?php esc_html_e( 'Number of products', 'slide-it-slider-for-woocommerce' );?></label>
                <input type="number" name="num-p" id="num-p" step="1" value="5" placeholder="5">
            <div id="shortcode-selectors"> 
                <span>
                    <label for="cards"><?php esc_html_e( 'Card Type', 'slide-it-slider-for-woocommerce' );?></label>
                    <select name="cards" id="cards">
                        <option value="default" selected>Default</option>
                        <option value="seamless" >Seamless</option>
                        <!-- <option value="card-style">Card Style</option> -->
                    </select>
                </span>
                <span>
                    <label for="p-order"><?php esc_html_e( 'Order By Name', 'slide-it-slider-for-woocommerce' );?></label>
                    <select name="p-order" id="p-order">
                        <option value="ASC" selected>Ascendent</option>
                        <option value="DESC">Descendent</option>
                    </select>
                </span>
            </div>
            <button id="submit" type="submit" style="cursor: pointer;"><?php esc_html_e( 'Create !', 'slide-it-slider-for-woocommerce' );?></button>
        </form>
    </div>
</div>
<?php
require_once slideIT_ADMIN . 'slide-it-admin-js.php';