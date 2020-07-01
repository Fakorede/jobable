<template>
  <div>
    <form @submit="formSubmit">
      <button
        v-if="show"
        class="btn btn-success btn"
        type="submit"
        style="width:100%"
      >Apply</button>

      <div
        v-else
        class="alert alert-success"
      >
        You have applied for this Job!
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["id"],
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      show: true
    };
  },
  methods: {
    formSubmit(e) {
      e.preventDefault();
      axios
        .post(`/applications/${this.id}`)
        .then(res => {
          this.show = false;
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
