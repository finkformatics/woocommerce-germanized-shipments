<?php

namespace Vendidero\Germanized\Shipments;
use WC_Data;
use WC_Data_Store;

defined( 'ABSPATH' ) || exit;

/**
 * Order item class.
 */
class ShipmentItem extends WC_Data {

    protected $order_item = null;

    protected $shipment = null;

    protected $product = null;

    /**
     * Order Data array. This is the core order data exposed in APIs since 3.0.0.
     *
     * @since 3.0.0
     * @var array
     */
    protected $data = array(
        'shipment_id'   => 0,
        'order_item_id' => 0,
        'quantity'      => 1,
        'product_id'    => 0,
        'weight'        => '',
        'width'         => '',
        'length'        => '',
        'height'        => '',
        'sku'           => '',
        'name'          => '',
    );

    /**
     * Stores meta in cache for future reads.
     * A group must be set to to enable caching.
     *
     * @var string
     */
    protected $cache_group = 'shipment-items';

    /**
     * Meta type. This should match up with
     * the types available at https://developer.wordpress.org/reference/functions/add_metadata/.
     * WP defines 'post', 'user', 'comment', and 'term'.
     *
     * @var string
     */
    protected $meta_type = 'shipment_item';

    /**
     * This is the name of this object type.
     *
     * @var string
     */
    protected $object_type = 'shipment_item';

    /**
     * Constructor.
     *
     * @param int|object|array $item ID to load from the DB, or WC_Order_Item object.
     */
    public function __construct( $item = 0 ) {
        parent::__construct( $item );

        if ( $item instanceof ShipmentItem ) {
            $this->set_id( $item->get_id() );
        } elseif ( is_numeric( $item ) && $item > 0 ) {
            $this->set_id( $item );
        } else {
            $this->set_object_read( true );
        }

        $this->data_store = WC_Data_Store::load( 'shipment-item' );

        if ( $this->get_id() > 0 ) {
            $this->data_store->read( $this );
        }
    }

    /**
     * Merge changes with data and clear.
     * Overrides WC_Data::apply_changes.
     * array_replace_recursive does not work well for order items because it merges taxes instead
     * of replacing them.
     *
     * @since 3.2.0
     */
    public function apply_changes() {
        if ( function_exists( 'array_replace' ) ) {
            $this->data = array_replace( $this->data, $this->changes ); // phpcs:ignore PHPCompatibility.FunctionUse.NewFunctions.array_replaceFound
        } else { // PHP 5.2 compatibility.
            foreach ( $this->changes as $key => $change ) {
                $this->data[ $key ] = $change;
            }
        }
        $this->changes = array();
    }

    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    /**
     * Get order ID this meta belongs to.
     *
     * @param  string $context What the value is for. Valid values are 'view' and 'edit'.
     * @return int
     */
    public function get_shipment_id( $context = 'view' ) {
        return $this->get_prop( 'shipment_id', $context );
    }

    /**
     * Get order ID this meta belongs to.
     *
     * @param  string $context What the value is for. Valid values are 'view' and 'edit'.
     * @return int
     */
    public function get_order_item_id( $context = 'view' ) {
        return $this->get_prop( 'order_item_id', $context );
    }

    /**
     * Get order ID this meta belongs to.
     *
     * @param  string $context What the value is for. Valid values are 'view' and 'edit'.
     * @return int
     */
    public function get_product_id( $context = 'view' ) {
        return $this->get_prop( 'product_id', $context );
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function get_sku( $context = 'view' ) {
        return $this->get_prop( 'sku', $context );
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function get_quantity( $context = 'view' ) {
        return $this->get_prop( 'quantity', $context );
    }

    /**
     * Get weight.
     *
     * @return string
     */
    public function get_weight( $context = 'view' ) {
        return $this->get_prop( 'weight', $context );
    }

    /**
     * Get width.
     *
     * @return string
     */
    public function get_width( $context = 'view' ) {
        return $this->get_prop( 'width', $context );
    }

    /**
     * Get length.
     *
     * @return string
     */
    public function get_length( $context = 'view' ) {
        return $this->get_prop( 'length', $context );
    }

    /**
     * Get height.
     *
     * @return string
     */
    public function get_height( $context = 'view' ) {
        return $this->get_prop( 'height', $context );
    }

    public function get_name( $context = 'view' ) {
        if ( $item = $this->get_order_item() ) {
            return $item->get_name();
        }

        return $this->get_prop( 'name', $context );
    }

    /**
     * Get parent order object.
     *
     * @return WC_GZD_Shipment
     */
    public function get_shipment() {
        if ( is_null( $this->shipment ) && 0 < $this->get_shipment_id() ) {
            $this->shipment = wc_gzd_get_shipment( $this->get_shipment_id() );
        }

        $shipment = ( $this->shipment ) ? $this->shipment : false;

        return $shipment;
    }

    public function get_order_item() {
        if ( is_null( $this->order_item ) && 0 < $this->get_order_item_id() ) {
            if ( $shipment = $this->get_shipment() ) {
                if ( $order = $shipment->get_order() ) {
                    $this->order_item = $order->get_item( $this->get_order_item_id() );
                }
            }
        }

        $item = ( $this->order_item ) ? $this->order_item : false;

        return $item;
    }

    public function get_product() {
        if ( is_null( $this->product ) && 0 < $this->get_product_id() ) {
            $this->product = wc_get_product( $this->get_product_id() );
        }

        $product = ( $this->product ) ? $this->product : false;

        return $product;
    }

    /*
    |--------------------------------------------------------------------------
    | Setters
    |--------------------------------------------------------------------------
    */

    /**
     * Set order ID.
     *
     * @param int $value Order ID.
     */
    public function set_shipment_id( $value ) {
        $this->order_item = null;
        $this->shipment   = null;

        $this->set_prop( 'shipment_id', absint( $value ) );
    }

    /**
     * Set order ID.
     *
     * @param int $value Order ID.
     */
    public function set_order_item_id( $value ) {
        $this->set_prop( 'order_item_id', absint( $value ) );
    }

    /**
     * Set order ID.
     *
     * @param int $value Order ID.
     */
    public function set_product_id( $value ) {
        $this->product = null;
        $this->set_prop( 'product_id', absint( $value ) );
    }

    public function set_sku( $sku ) {
        $this->set_prop( 'sku', $sku );
    }

    public function set_weight( $weight ) {
        $this->set_prop( 'weight', '' === $weight ? '' : wc_format_decimal( $weight ) );
    }

    public function set_width( $width ) {
        $this->set_prop( 'width', '' === $width ? '' : wc_format_decimal( $width ) );
    }

    public function set_length( $length ) {
        $this->set_prop( 'length', '' === $length ? '' : wc_format_decimal( $length ) );
    }

    public function set_height( $height ) {
        $this->set_prop( 'height', '' === $height ? '' : wc_format_decimal( $height ) );
    }

    public function get_dimensions() {
        return array(
            'length' => $this->get_length(),
            'width'  => $this->get_width(),
            'height' => $this->get_height(),
        );
    }

    public function set_quantity( $quantity ) {
        $this->set_prop( 'quantity', absint( $quantity ) );
    }

    public function set_name( $name ) {
        $this->set_prop( 'name', $name );
    }

    /*
    |--------------------------------------------------------------------------
    | Other Methods
    |--------------------------------------------------------------------------
    */
}