/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'underscore',
    'Magento_Ui/js/grid/columns/column',
], function (_, Element, columnStatusValidator) {
    'use strict';
    return Element.extend({
        defaults: {
            bodyTmpl: 'Magenest_Movie/rating/ratingstar',
        },
        getRatingNumber: function(row){

            return console.log(row.rating);
        },

    });
});
