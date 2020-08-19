<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col text-left py-5">
        <nuxt-link to="/videos" class="sublink ml-3">
          Back
        </nuxt-link>
      </div>
    </div>

    <div class="d-flex justify-content-center align-items-center">
      <div class="text-center">
        <h1 class="player-title text-left mb-4">
          Video Player
        </h1>

        <client-only placeholder="Loading . . .">
          <VideoPlayer :video-id="videoId" />
        </client-only>

        <h1 class="video-title text-left mt-4">
          {{ video.title }}
        </h1>

        <h2 class="video-description text-left mt-3">
          {{ video.description }}
        </h2>
      </div>
    </div>
  </div>
</template>

<script>

export default {

  middleware: 'loggedin',

  async asyncData({ params, $axios, route }) {
    const res = await $axios.get(
        `http://localhost:8080/videos/${route.params.id}`
    );

    return res.data.data ? { video: res.data.data } : { video: [] };
  },

  data({ route }) {
    return {
      videos: [],
      videoId: this.$route.params.id,
    };
  },

};

</script>

<style>
  .player-title {font-family: Optima; font-size: 240%; color: rgb(14,108,79);}
  .video-title { font-size: 220%; font-family: Optima; color: rgb(14,108,79);}
  .video-description { font-size: 120%; }
  a.sublink { font-weight:bold; text-decoration: underline; color: rgb(6,46,36); }
  a.sublink:hover {color:gray;}
</style>
