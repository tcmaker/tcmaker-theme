<?php
function add_brochure_section_menu($post) {

    echo '<input type="hidden" name="taxonomy_noncename" id="taxonomy_noncename" value="' .
            wp_create_nonce( 'taxonomy_theme' ) . '" />';


    // Get all theme taxonomy terms
    $themes = get_terms('theme', 'hide_empty=0');

?>
<select name='post_theme' id='post_theme'>
    <!-- Display themes as options -->
    <?php
        $names = wp_get_object_terms($post->ID, 'theme');
        ?>
        <option class='theme-option' value=''
        <?php if (!count($names)) echo "selected";?>>None</option>
        <?php
    foreach ($themes as $theme) {
        if (!is_wp_error($names) && !empty($names) && !strcmp($theme->slug, $names[0]->slug))
            echo "<option class='theme-option' value='" . $theme->slug . "' selected>" . $theme->name . "</option>\n";
        else
            echo "<option class='theme-option' value='" . $theme->slug . "'>" . $theme->name . "</option>\n";
    }
   ?>
</select>
<?php
}
