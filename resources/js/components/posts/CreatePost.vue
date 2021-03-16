<template>
  <div class="columns">
    <div class="column is-half-desktop">
      <!-- Section title -->
      <div class="content">
        <h2 class="title">Create post</h2>
      </div>

      <!-- Form -->
      <b-field label="Title">
        <b-input v-model="form.title"></b-input>
      </b-field>
      <b-field label="Description">
        <textarea class="textarea" v-model="form.description"></textarea>
      </b-field>
      <b-field label="Select a date">
        <b-datepicker
          v-model="form.published_at"
          placeholder="Click to select..."
          trap-focus
        >
        </b-datepicker>
      </b-field>
      <div class="buttons is-centered pt-3">
        <b-button icon-left="angle-left" tag="a" :href="route('posts.index')">
          <span class="text-sm font-bold"> Cancel </span>
        </b-button>
        <b-button type="is-primary" :loading="isLoading" @click="store">
          <span class="text-sm font-bold"> Save </span>
        </b-button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "CreatePost",
  data: () => ({
    isLoading: false,
    form: {
      title: "",
      description: "",
      published_at: new Date(),
    },
  }),

  methods: {
    store() {
      this.isLoading = true;
      axios
        .post(route("posts.store"), this.form)
        .then((r) => {
          window.location.href = route("posts.index");
        })
        .finally(() => {
          this.isLoading = false;
        });
    },
  },
};
</script>
