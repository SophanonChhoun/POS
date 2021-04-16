
window.Vue = require('vue');
window._ = require('lodash');

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);


import InputTag from 'vue-input-tag';

Vue.component('input-tag', InputTag);

Vue.directive('select2', {
    inserted(el) {
        $(el).on('select2:select', () => {
            const event = new Event('change', {bubbles: true, cancelable: true});
            el.dispatchEvent(event);
        });
    }
});


Vue.use(require('vue-moment'));


import Popover  from 'vue-js-popover'
Vue.use(Popover)
