<template>
  <div>
    <input
      type="text"
      v-model="keyword"
      placeholder="Search Jobs..."
      v-on:keyup="searchJobs"
      class="form-control"
    >

    <div
      class="card-footer"
      v-if="jobs.length"
    >
      <ul class="list-group">
        <li
          class="list-group-item"
          v-for="job in jobs"
          :key="job.slug"
        >
          <a
            style="color: #000;"
            :href="`/jobs/${job.slug}`"
          >
            {{ job.title }}
            <br>
            <small class="badge badge-success">{{ job.position }}</small>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      keyword: "",
      jobs: []
    };
  },
  methods: {
    searchJobs() {
      this.jobs = [];
      if (this.keyword.length > 1) {
        axios
          .get(this.endpoint, { params: { keyword: this.keyword } })
          .then(res => {
            this.jobs = res.data;
          });
      }
    }
  },
  computed: {
    endpoint() {
      return `/jobs/search`;
    }
  }
};
</script>
