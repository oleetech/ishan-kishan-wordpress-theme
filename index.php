<?php get_header(  );?>
<?php
// Check if hero.php file exists in the template-parts directory
if ( locate_template( 'template-parts/hero.php', false, false ) ) {
    // Load the hero.php file using get_template_part()
    get_template_part( 'template-parts/hero' );
} else {
    // Default content if hero.php does not exist
    ?>
    <section class="default-hero">
        <h1>Welcome to Our Website!</h1>
        <p>This is a default hero section. Customize your hero section by adding a hero.php file in the template-parts directory.</p>
    </section>
    <?php
}
?>


<?php get_footer();?>