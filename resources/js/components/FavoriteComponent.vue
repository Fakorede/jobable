<template>
  <div>
    <button
      v-if="show"
      @click.prevent="save"
      class="btn btn-primary btn"
      style="width:100%"
    >Save</button>

    <button
      v-else
      @click.prevent="unsave"
      class="btn btn-danger btn"
      style="width:100%"
    >UnSave</button>

  </div>
</template>

<script>
export default {
  props: ["id", "favorited"],
  mounted() {
    this.show = this.jobFavorited ? false : true;
  },
  data() {
    return {
      show: true
    };
  },
  methods: {
    save() {
      axios
        .post(`/save/${this.id}`)
        .then(res => {
          this.show = false;
        })
        .catch(err => alert("Unable to save job!"));
    },
    unsave() {
      axios
        .post(`/unsave/${this.id}`)
        .then(res => {
          this.show = true;
        })
        .catch(err => alert("Unable to unsave job!"));
    }
  },
  computed: {
    jobFavorited() {
      return this.favorited;
    }
  }
};
</script>
