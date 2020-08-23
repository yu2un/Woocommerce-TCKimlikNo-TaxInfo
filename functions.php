<?php

add_filter( 'woocommerce_checkout_fields' , 'woo_tckimlik_taxinfo' , 30 );
function woo_tckimlik_taxinfo( $fields ) {

     $fields['billing']['billing_tax'] = array(
        'label'     => __('Tax Number / Tax Office', 'woocommerce'),
        'placeholder'   => _x('Tax Number / Tax Office', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true,
        'priority'  => 30
     );

     return $fields;
}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'woo_addfield_tcno_taxinfo', 10, 1 );
function woo_addfield_tcno_taxinfo($order){
    echo '<p><strong>'.__('Tax Info').':</strong> ' . get_post_meta( $order->get_id(), '_billing_tax', true ) . '</p>';
}

?>
