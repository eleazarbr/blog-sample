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
      <div class="buttons pt-3">
        <b-button expanded type="is-primary" :loading="isLoading" @click="store">
          Save
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
          window.location.href = route("web.index");
        })
        .finally(() => {
          this.isLoading = false;
        });
    },
  },
};
</script>
