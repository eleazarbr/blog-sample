require('./bootstrap')
require('alpinejs')
import Vue from 'vue/dist/vue'
import store from './store'

Vue.config.productionTip = false

import Buefy from 'buefy'
Vue.use(Buefy, {
    defaultIconPack: 'fas'
})

Vue.mixin({
    methods: {
        moment (date = null) {
            let instance = moment()
            if (date) instance = moment(date)
            return instance
        },
        route: route
    }
})

const files = require.context('./components', true, /\.vue$/i)
files.keys().map(key =>
    Vue.component(
        key
            .split('/')
            .pop()
            .split('.')[0],
        files(key).default
    )
)

new Vue({
    el: '#app',
    store
})
