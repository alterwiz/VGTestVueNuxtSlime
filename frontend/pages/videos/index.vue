<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xm-12 col-sm-12 col-md-6 col-lg-6 col-xl-5">
        <b-dropdown
          :model="options"
          html="<div class='text-left'>Video Filter</div>"
          block
          split
          variant="success"
          split-variant="outline-success"
          class="mx-3 my-5"
          menu-class="custom-dropdown-menu w-100"
          toggle-class="custom-dropdown-split"
        >
          <b-dropdown-divider />

          <b-dropdown-item v-for="(item) in videos.data" :key="item.id" :to="`/videos/${item.videoId}`">
            {{ item.title }}
          </b-dropdown-item>
        </b-dropdown>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="flex-grid video-list">
          <div v-for="video in videos.data" :key="video.id" class="m-3 video-item background--white">
            <VideoSummary :video="video" />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col text-center">
        <b-button pill type="button" variant="warning" class="button--orange m-auto">
          More Videos
        </b-button>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  middleware: 'loggedin',

  async asyncData({ params, $axios }) {
    const res = await $axios.get('http://localhost:8080/videos');
    const listItems = [];

    for (let i = res.data.length - 1; i >= 0; i--) {
      const item = res.data[i];
      listItems.push({ value: item.videoId, text: item.title });
    }

    return { videos: res.data, options: listItems };
  },

  data() {
    return {
      videos: [],
      options: [],

    };
  },

  methods: {

  },
};
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand',
  'Source Sans Pro',
  -apple-system,
  BlinkMacSystemFont,
  'Segoe UI',
  Roboto,
  'Helvetica Neue',
  Arial,
  sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}

.button--orange {
  display: inline-block;
  border: 1px solid rgb(228, 58, 28);;
  background-color: rgb(228, 58, 28);
  text-decoration: none;
  padding: 10px 30px;
  font-weight: bold;
  max-height:60px;
  max-width: 30%;

  color: #fff;
}

.button--orange:hover { color:#343a40; background-color: rgb(266, 96, 66); }

.dropdown-item { padding-left: 12px; color: rgb(90,95,101); overflow-x: hidden; }

.dropdown-item:hover { background-color: rgb(14,108,79); color: white; }

.custom-dropdown { border-color: gray!important; color: gray; }

button.btn.dropdown-toggle.btn-success.custom-dropdown-split.dropdown-toggle-split {
  border-color: gray;
  color: gray;
  background-color: white;
  border-left-style: none;
  border-radius: 0;
  border-top-right-radius: 0.1rem;
  border-color: rgb(90,95,101);
}

.btn.btn-outline-success.btn-block {
  border-color: rgb(90,95,101);
  color: gray;
  border-radius: 0.1rem;
  border-color: rgb(90,95,101)
}

.btn.btn-outline-success.btn-block:hover {background-color: white;border-right: none;}

.dropdown-menu.custom-dropdown-menu {
  border-radius: 0;
  border-bottom-left-radius: 0.1rem;
  border-bottom-right-radius: 0.1rem;
  margin-top: -2px;
  border-top-style: none;
  border-color: rgb(90,95,101);
}

.dropdown-divider {
  width: 95%;
  margin-top: -7px;
  margin-left: auto;
  margin-right: auto;
  border-color: rgb(90,95,101);
}

</style>

<style scoped>

.video-list{
  display: grid;
  grid-template-columns: repeat(auto-fill,minmax(360px, 1fr));
}

.video-item {
  flex:1 1 25%;
}

.btn-outline-success { border-color: gray!important; }
.btn-outline-success:hover { border-color: gray!important; }

</style>
