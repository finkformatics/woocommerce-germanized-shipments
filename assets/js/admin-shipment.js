window.germanized = window.germanized || {};
window.germanized.admin = window.germanized.admin || {};

( function( $, admin ) {

    $.GermanizedShipment = function( shipmentId ) {

        /*
         * Variables accessible
         * in the class
         */
        this.vars = {
            $shipment  : false,
            params     : {},
            id         : '',
            isEditable : true,
            needsItems : true,
        };

        /*
         * Can access this.method
         * inside other methods using
         * root.method()
         */
        this.root = this;

        /*
         * Constructor
         */
        this.construct = function( shipmentId ) {
            this.vars.id        = shipmentId;
            this.vars.params    = germanized.admin.shipments.getParams();

            this.refreshDom();

            $( document.body )
                .on( 'wc_backbone_modal_loaded', this.backbone.init.bind( this ) )
                .on( 'wc_backbone_modal_response', this.backbone.response.bind( this ) );
        };

        this.refreshDom = function() {
            this.vars.$shipment  = $( '#order-shipments-list' ).find( '#shipment-' + this.getId() );

            this.setNeedsItems( this.vars.$shipment.hasClass( 'needs-items' ) );
            this.setIsEditable( this.vars.$shipment.hasClass( 'is-editable' ) );

            $( '#shipment-' + this.vars.id ).off();

            $( '#shipment-' + this.vars.id )
                .on( 'change', '.item-quantity', this.onChangeQuantity.bind( this ) )
                .on( 'click', 'a.remove-shipment-item', this.onRemoveItem.bind( this ) )
                .on( 'click', 'a.add-shipment-item', this.onAddItem.bind( this ) )
                .on( 'click', 'a.sync-shipment-items', this.onSyncItems.bind( this ) );
        };

        this.getShipment = function() {
            return this.vars.$shipment;
        };

        this.onChangeQuantity = function( e ) {
            var $quantity   = $( e.target ),
                $item       = $quantity.parents( '.shipment-item' ),
                itemId      = $item.data( 'id' ),
                newQuantity = $quantity.val();

            this.blockItems();

            var params = {
                'action'       : 'woocommerce_gzd_limit_shipment_item_quantity',
                'shipment_id'  : this.getId(),
                'item_id'      : itemId,
                'quantity'     : newQuantity
            };

            germanized.admin.shipments.doAjax( params, this.onChangeQuantitySuccess.bind( this ) );
        };

        this.onChangeQuantitySuccess = function( data ) {
            var $item       = this.getShipment().find( '.shipment-item[data-id="' + data.item_id + '"]' ),
                currentQty  = $item.find( '.item-quantity' ).val(),
                maxQuantity = data.max_quantity;

            if ( currentQty > maxQuantity ) {
                $item.find( '.item-quantity' ).val( maxQuantity );
            }

            this.unblockItems();
        };

        this.setIsEditable = function( isEditable ) {
            var root = this;

            if ( typeof isEditable !== "boolean" ) {
                isEditable = true;
            }

            this.vars.isEditable = isEditable === true;

            if ( ! this.vars.isEditable ) {
                this.getShipment().removeClass( 'is-editable' );
                this.getShipment().addClass( 'is-locked' );

                // Disable inputs
                this.getShipment().find( '.remove-shipment-item ' ).hide();
                this.getShipment().find( '.shipment-item-actions' ).hide();
                this.getShipment().find( ':input:not([type=hidden])' ).prop( 'disabled', true );

                $.each( this.vars.params.shipment_locked_excluded_fields, function( i, field ) {
                    root.getShipment().find( ':input[name^=shipment_' + field + ']' ).prop( 'disabled', false );
                });

            } else {
                this.getShipment().addClass( 'is-editable' );
                this.getShipment().removeClass( 'is-locked' );

                // Disable inputs
                this.getShipment().find( '.remove-shipment-item ' ).show();
                this.getShipment().find( '.shipment-item-actions' ).show();
                this.getShipment().find( ':input:not([type=hidden])' ).prop( 'disabled', false );
            }
        };

        this.setNeedsItems = function( needsItems ) {
            if ( typeof needsItems !== "boolean" ) {
                needsItems = true;
            }

            this.vars.needsItems = needsItems === true;

            if ( ! this.vars.needsItems ) {
                this.getShipment().removeClass( 'needs-items' );
            } else {
                this.getShipment().addClass( 'needs-items' );
            }
        };

        this.onSyncItems = function() {
            this.syncItems();

            return false;
        };

        this.syncItems = function() {
            this.blockItems();

            var params = {
                'action'     : 'woocommerce_gzd_sync_shipment_items',
                'shipment_id': this.getId()
            };

            germanized.admin.shipments.doAjax( params, this.onSyncItemsSuccess.bind( this ), this.onSyncItemsError.bind( this ) );
        };

        this.onSyncItemsSuccess = function( data ) {
            this.unblockItems();
        };

        this.onSyncItemsError = function( data ) {
            this.unblockItems();
        };

        this.onAddItem = function() {

            this.getShipment().WCBackboneModal({
                template: 'wc-gzd-dhl-modal-add-shipment-item-' + this.getId()
            });

            return false;
        };

        this.addItem = function( orderItemId, quantity ) {
            quantity = quantity || 1;

            this.blockItems();

            var params = {
                'action'       : 'woocommerce_gzd_add_shipment_item',
                'shipment_id'  : this.getId(),
                'order_item_id': orderItemId,
                'quantity'     : quantity
            };

            germanized.admin.shipments.doAjax( params, this.onAddItemSuccess.bind( this ), this.onAddItemError.bind( this ) );
        };

        this.onAddItemError = function( data ) {
            this.unblockItems();
        };

        this.onAddItemSuccess = function( data ) {
            this.getShipment().find( '.shipment-item-list' ).append( data.new_item );

            this.refreshDom();
            this.unblockItems();
        };

        this.onRemoveItem = function( e ) {
            var $delete = $( e.target ),
                $item   = $delete.parents( '.shipment-item' ),
                itemId  = $item.data( 'id' );

            if ( $item.length > 0 ) {
                this.removeItem( itemId );
            }

            return false;
        };

        this.blockItems = function() {
            this.getShipment().find( '.shipment-items' ).block({
                message: null,
                overlayCSS: {
                    background: '#fff',
                    opacity: 0.6
                }
            });
        };

        this.unblockItems = function() {
            this.getShipment().find( '.shipment-items' ).unblock();
        };

        this.removeItem = function( itemId ) {
            var $item = this.getShipment().find( '.shipment-item[data-id="' + itemId + '"]' );

            var params = {
                'action'       : 'woocommerce_gzd_remove_shipment_item',
                'shipment_id'  : this.getId(),
                'item_id'      : itemId
            };

            this.blockItems();

            germanized.admin.shipments.doAjax( params, this.onRemoveItemSuccess.bind( this ) );
        };

        this.onRemoveItemSuccess = function( data ) {
            var $item = this.getShipment().find( '.shipment-item[data-id="' + data['item_id'] + '"]' );

            if ( $item.length > 0 ) {
                $item.slideUp( 150, function() {
                    $( this ).remove();
                });
            }

            this.unblockItems();
        };

        this.getId = function() {
            return this.vars.id;
        };

        this.backbone = {

            onAddItemSuccess: function( data ) {
                $( '.wc-backbone-modal-content article' ).unblock();

                $select   = $( 'select#wc-gzd-dhl-add-order-items-select' );
                $quantity = $( 'input#wc-gzd-dhl-add-order-items-quantity' );

                $quantity.val( 1 );

                $.each( data.items, function( id, item ) {
                    $select.append( '<option value="' + id + '">' + item.name + '</option>' );
                    $quantity.data( 'max-quantity-' + id, item.max_quantity );
                });

                $( document.body ).on( 'change', 'input#wc-gzd-dhl-add-order-items-quantity', function() {
                    var item_id  = $select.val(),
                        quantity = $( this ).val();

                    if ( $quantity.data( 'max-quantity-' + item_id ) ) {
                        var maxQuantity = $quantity.data( 'max-quantity-' + item_id );

                        if ( quantity > maxQuantity ) {
                            $quantity.val( maxQuantity );
                        }
                    }
                });
            },

            init: function ( e, target ) {
                var id = this.getId();

                if ( ( 'wc-gzd-dhl-modal-add-shipment-item-' + id ) === target ) {

                    $( '.wc-backbone-modal-content article' ).block({
                        message: null,
                        overlayCSS: {
                            background: '#fff',
                            opacity: 0.6
                        }
                    });

                    germanized.admin.shipments.doAjax( {
                        'action'     : 'woocommerce_gzd_get_shipment_available_order_items',
                        'shipment_id': id
                    }, this.backbone.onAddItemSuccess.bind( this ) );

                    return false;
                }
            },

            response: function ( e, target, data ) {
                var id = this.getId();

                if ( ( 'wc-gzd-dhl-modal-add-shipment-item-' + id ) === target ) {
                    this.addItem( data.item_id, data.item_qty );
                }
            }
        };

        /*
         * Pass options when class instantiated
         */
        this.construct( shipmentId );
    };

})( jQuery, window.germanized.admin );