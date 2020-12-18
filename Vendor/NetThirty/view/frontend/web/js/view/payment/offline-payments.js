define([
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
], function (Component, rendererList) {
    'use strict';

    rendererList.push(
        {
            type: 'netthirty',
            component: 'Vendor_NetThirty/js/view/payment/method-renderer/netthirty-method'
        }
    );

    /** Add view logic here if needed */
    return Component.extend({});
});
