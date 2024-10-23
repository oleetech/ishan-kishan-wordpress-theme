<?php
// Get the current category term
$term = get_queried_object();

// Check if the current category is a subcategory (has a parent)
if ($term->parent != 0) {
    // This is a subcategory, load the subcategory template
    get_template_part('woocommerce/taxonomy', 'product_cat-sub');
} else {
    // This is a main category, load the main category template
    get_template_part('woocommerce/taxonomy', 'product_cat-main');
}
?>
