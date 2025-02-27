<?php
/**
 * Coded By : aigenseer
 * Copyright 2019, https://github.com/aigenseer
 */

/**
 * [print div tag with qrgenerator for display the qr code with the js lib qr-generator.js]
 * @param  stdobject $post
 */
function qsr_qr_code_generator($post)
{
  ?>
    <div id="qrgenerator" data-url="<?php print get_permalink($post->ID); ?>" />
  <?php
}

/**
 * [add the meta box]
 */
function qsr_add_meta_boxes()
{
    $screens = ['post', 'wporg_cpt', 'page'];
    foreach ($screens as $screen) {
        add_meta_box(
            QSR_SHORTCODE_NAME,
            'Redirect QR-Code',
            'qsr_qr_code_generator',
            $screen,
            'side'
        );
    }
    wp_enqueue_script('qr-generator-script',  plugins_url( '/assets/qr-generator.js', __FILE__ ));
}
add_action('add_meta_boxes', 'qsr_add_meta_boxes');
?>
