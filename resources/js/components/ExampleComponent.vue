<template>
  <div class="container">{{user}}</div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      user: null,
    };
  },

  methods: {
    async getUser() {
      let response = await axios.get("api/user");
      this.user = response.data;
    },
  },

  mounted() {
    this.getUser();
  },
};
</script>
