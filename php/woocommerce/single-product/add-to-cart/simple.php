<?php
defined('ABSPATH') || exit;

global $product;

if (!$product->is_purchasable()) return;
?>
<form class="cart product-single__order">
    <?php
    woocommerce_quantity_input([
        'min_value'   => 1,
        'max_value'   => 99,
        'input_value' => 1,
    ]);
    ?>

    <button type="button" class="button preloader-block preloader-block--xs"
        data-open-modal="callBackModal"
        data-product-name="<?php echo esc_attr($product->get_name()); ?>">
        Заказать
    </button>
</form>