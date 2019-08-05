<?php

namespace Vendidero\Germanized\Shipments\DataStores;
use WC_Data_Store_WP;
use WC_Object_Data_Store_Interface;

defined( 'ABSPATH' ) || exit;

/**
 * WC Order Item Data Store
 *
 * @version  3.0.0
 */
class ShipmentItem extends WC_Data_Store_WP implements WC_Object_Data_Store_Interface {

    /**
     * Data stored in meta keys, but not considered "meta" for an order.
     *
     * @since 3.0.0
     * @var array
     */
    protected $internal_meta_keys = array(
        '_width',
        '_length',
        '_height',
        '_weight',
        '_sku'
    );

    protected $core_props = array(
        'shipment_id',
        'order_item_id',
        'quantity',
        'name',
        'product_id'
    );

    /**
     * Meta type. This should match up with
     * the types available at https://developer.wordpress.org/reference/functions/add_metadata/.
     * WP defines 'post', 'user', 'comment', and 'term'.
     *
     * @var string
     */
    protected $meta_type = 'gzd_shipment_item';

    /**
     * This only needs set if you are using a custom metadata type (for example payment tokens.
     * This should be the name of the field your table uses for associating meta with objects.
     * For example, in payment_tokenmeta, this would be payment_token_id.
     *
     * @var string
     */
    protected $object_id_field_for_meta = 'shipment_item_id';

    /**
     * Create a new shipment item in the database.
     *
     * @since 3.0.0
     * @param WC_GZD_Shipment_Item $item Shipment item object.
     */
    public function create( &$item ) {
        global $wpdb;

        $wpdb->insert(
            $wpdb->gzd_shipment_items, array(
                'shipment_id'                 => $item->get_shipment_id(),
                'shipment_item_quantity'      => $item->get_quantity(),
                'shipment_item_order_item_id' => $item->get_order_item_id(),
                'shipment_item_product_id'    => $item->get_product_id(),
                'shipment_item_name'          => $item->get_name(),
            )
        );

        $item->set_id( $wpdb->insert_id );
        $this->save_item_data( $item );
        $item->save_meta_data();
        $item->apply_changes();
        $this->clear_cache( $item );

        do_action( 'woocommerce_gzd_new_shipment_item', $item->get_id(), $item, $item->get_shipment_id() );
    }

    /**
     * Update a shipment item in the database.
     *
     * @since 3.0.0
     * @param WC_GZD_Shipment_Item $item Shipment item object.
     */
    public function update( &$item ) {
        global $wpdb;

        $changes = $item->get_changes();

        if ( array_intersect( $this->core_props, array_keys( $changes ) ) ) {
            $wpdb->update(
                $wpdb->gzd_shipment_items, array(
                'shipment_id'                 => $item->get_shipment_id(),
                'shipment_item_order_item_id' => $item->get_order_item_id(),
                'shipment_item_quantity'      => $item->get_quantity(),
                'shipment_item_product_id'    => $item->get_product_id(),
                'shipment_item_name'          => $item->get_name(),
            ), array( 'shipment_item_id' => $item->get_id() )
            );
        }

        $this->save_item_data( $item );
        $item->save_meta_data();
        $item->apply_changes();
        $this->clear_cache( $item );

        do_action( 'woocommerce_gzd_shipment_item', $item->get_id(), $item, $item->get_shipment_id() );
    }

    /**
     * Remove a shipment item from the database.
     *
     * @since 3.0.0
     * @param WC_GZD_Shipment_Item $item Shipment item object.
     * @param array         $args Array of args to pass to the delete method.
     */
    public function delete( &$item, $args = array() ) {
        if ( $item->get_id() ) {
            global $wpdb;
            do_action( 'woocommerce_gzd_before_delete_shipment_item', $item->get_id() );
            $wpdb->delete( $wpdb->gzd_shipment_items, array( 'shipment_item_id' => $item->get_id() ) );
            $wpdb->delete( $wpdb->gzd_shipment_itemmeta, array( 'shipment_item_id' => $item->get_id() ) );
            do_action( 'woocommerce_gzd_delete_shipment_item', $item->get_id() );
            $this->clear_cache( $item );
        }
    }

    /**
     * Read a shipment item from the database.
     *
     * @since 3.0.0
     *
     * @param WC_GZD_Shipment_Item $item Shipment item object.
     *
     * @throws Exception If invalid shipment item.
     */
    public function read( &$item ) {
        global $wpdb;

        $item->set_defaults();

        // Get from cache if available.
        $data = wp_cache_get( 'item-' . $item->get_id(), 'shipment-items' );

        if ( false === $data ) {
            $data = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->gzd_shipment_items} WHERE shipment_item_id = %d LIMIT 1;", $item->get_id() ) );
            wp_cache_set( 'item-' . $item->get_id(), $data, 'shipment-items' );
        }

        if ( ! $data ) {
            throw new Exception( _x( 'Invalid shipment item.', 'shipments', 'woocommerce-germanized' ) );
        }

        $item->set_props(
            array(
                'shipment_id'   => $data->shipment_id,
                'order_item_id' => $data->shipment_item_order_item_id,
                'quantity'      => $data->shipment_item_quantity,
                'product_id'    => $data->shipment_item_product_id,
                'name'          => $data->shipment_item_name
            )
        );

        $this->read_item_data( $item );
        $item->read_meta_data();
        $item->set_object_read( true );
    }

    /**
     * Read extra data associated with the shipment item.
     *
     * @param WC_GZD_Shipment_Item $item Shipment item object.
     * @since 3.0.0
     */
    protected function read_item_data( &$item ) {
        $props = array();

        foreach( $this->internal_meta_keys as $meta_key ) {
            $props[ substr( $meta_key, 1 ) ] = get_metadata( 'gzd_shipment_item', $item->get_id(), $meta_key, true );
        }

        $item->set_props( $props );
    }

    /**
     * Update meta data in, or delete it from, the database.
     *
     * Avoids storing meta when it's either an empty string or empty array.
     * Other empty values such as numeric 0 and null should still be stored.
     * Data-stores can force meta to exist using `must_exist_meta_keys`.
     *
     * Note: WordPress `get_metadata` function returns an empty string when meta data does not exist.
     *
     * @param WC_Data $object The WP_Data object (WC_Coupon for coupons, etc).
     * @param string  $meta_key Meta key to update.
     * @param mixed   $meta_value Value to save.
     *
     * @since 3.6.0 Added to prevent empty meta being stored unless required.
     *
     * @return bool True if updated/deleted.
     */
    protected function update_or_delete_meta( $object, $meta_key, $meta_value ) {
        if ( in_array( $meta_value, array( array(), '' ), true ) && ! in_array( $meta_key, $this->must_exist_meta_keys, true ) ) {
            $updated = delete_metadata( 'gzd_shipment_item', $object->get_id(), $meta_key );
        } else {
            $updated = update_metadata( 'gzd_shipment_item', $object->get_id(), $meta_key, $meta_value );
        }

        return (bool) $updated;
    }

    /**
     * Saves an item's data to the database / item meta.
     * Ran after both create and update, so $item->get_id() will be set.
     *
     * @since 3.0.0
     * @param WC_GZD_Shipment_Item $item Shipment item object.
     */
    public function save_item_data( &$item ) {
        $updated_props     = array();
        $meta_key_to_props = array();

        foreach( $this->internal_meta_keys as $meta_key ) {

            $prop_name = substr( $meta_key, 1 );

            if ( in_array( $prop_name, $this->core_props ) ) {
                continue;
            }

            $meta_key_to_props[ $meta_key ] = $prop_name;
        }

        $props_to_update = $this->get_props_to_update( $item, $meta_key_to_props, 'shipment_item' );

        foreach ( $props_to_update as $meta_key => $prop ) {

            $value = $item->{"get_$prop"}( 'edit' );
            $value = is_string( $value ) ? wp_slash( $value ) : $value;

            switch ( $prop ) {

            }

            $updated = $this->update_or_delete_meta( $item, $meta_key, $value );

            if ( $updated ) {
                $updated_props[] = $prop;
            }
        }

        do_action( 'woocommerce_gzd_shipment_item_object_updated_props', $item, $updated_props );
    }

    /**
     * Clear meta cache.
     *
     * @param WC_GZD_Shipment_Item $item Shipment item object.
     */
    public function clear_cache( &$item ) {
        wp_cache_delete( 'item-' . $item->get_id(), 'shipment-items' );
        wp_cache_delete( 'shipment-items-' . $item->get_shipment_id(), 'shipments' );
        wp_cache_delete( $item->get_id(), $this->meta_type . '_meta' );
    }

    /**
     * Table structure is slightly different between meta types, this function will return what we need to know.
     *
     * @since  3.0.0
     * @return array Array elements: table, object_id_field, meta_id_field
     */
    protected function get_db_info() {
        global $wpdb;

        $meta_id_field   = 'meta_id'; // for some reason users calls this umeta_id so we need to track this as well.
        $table           = $wpdb->gzd_shipment_itemmeta;
        $object_id_field = $this->meta_type . '_id';

        if ( ! empty( $this->object_id_field_for_meta ) ) {
            $object_id_field = $this->object_id_field_for_meta;
        }

        return array(
            'table'           => $table,
            'object_id_field' => $object_id_field,
            'meta_id_field'   => $meta_id_field,
        );
    }
}