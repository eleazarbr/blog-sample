<template>
  <b-navbar wrapper-class="container is-fluid" type="is-light">
    <template slot="brand">
      <b-navbar-item tag="a" target="_self" href="">
        <strong> Blog </strong>
      </b-navbar-item>
    </template>

    <!-- left items -->
    <template slot="start"> </template>

    <!-- right items -->
    <template slot="end">
      <b-navbar-item tag="div">
        <div class="buttons">
          <b-button type="is-primary" outlined>
            <strong class="text-base">Login</strong>
          </b-button>
          <b-button type="is-primary">
            <strong class="text-base"> Register </strong>
          </b-button>
        </div>
      </b-navbar-item>
    </template>
  </b-navbar>
</template>

<script>
export default {
  name: "Navbar",
};
</script>
