import Vue from 'vue/dist/vue'
import Vuex from 'vuex'
import _ from 'lodash'

Vue.use(Vuex)
export default new Vuex.Store({
    strict: false,
    state: {
        user: {}
    },
    mutations: {
        basic (state, payload) {
            state[payload.key] = payload.value
        }
    },
    actions: {},
    computed: {},
    getters: {
        auth (state) {
            return Object.keys(state.user).length
        },
        guest (state) {
            return Object.keys(state.user).length === 0
        }
    }
})
