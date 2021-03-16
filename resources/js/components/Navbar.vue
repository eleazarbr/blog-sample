<template>
  <b-navbar wrapper-class="container is-fluid" type="is-light">
    <template slot="brand">
      <b-navbar-item tag="a" target="_self" :href="route('web.index')">
        <strong> Blog </strong>
      </b-navbar-item>
    </template>

    <!-- left items -->
    <template slot="start"> </template>

    <!-- right items -->
    <template slot="end">
      <!-- guest items -->
      <b-navbar-item v-if="guest" tag="div">
        <div class="buttons is-centered">
          <b-button type="is-primary" tag="a" :href="route('login')" outlined>
            <strong class="text-base">Login</strong>
          </b-button>
          <b-button type="is-primary" tag="a" :href="route('register')">
            <strong class="text-base"> Register </strong>
          </b-button>
        </div>
      </b-navbar-item>
      <!-- auth items -->
      <b-navbar-item v-else @click="logout"> Logout </b-navbar-item>
    </template>
  </b-navbar>
</template>

<script>
import { mapState, mapGetters } from "vuex";
export default {
  name: "Navbar",
  props: ["authUser"],

  mounted() {
    this.$store.commit("basic", { key: "user", value: this.authUser });
  },

  methods: {
    logout() {
      axios.post(route("logout")).then((r) => {
        window.location.href = route("web.index");
      });
    },
  },

  computed: {
    ...mapGetters(["guest"]),
  },
};
</script>
