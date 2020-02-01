/**
 * Author: Chandravadana Kandregula.
 * Dated: 01 Feb 2020
 */

define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
    return Component.extend({
        initialize: function () {
            //initialize parent Component
            this._super();

            //Observers qty field changes.
            this.qty = ko.observable(this.defaultQty);
        },
        decreaseQty: function () {
            parseInt(this.qty()) > 1 && this.qty(parseInt(this.qty()) - 1);
        },
        increaseQty: function () {
            this.qty(parseInt(this.qty()) + 1);
        }
    });
});
