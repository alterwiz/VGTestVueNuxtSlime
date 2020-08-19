<template>
  <div>
    <nuxt-link :to="`/videos/${video.videoId}`">
      <div
        class="video-box text-center d-flex align-items-center p-4"
        @mouseover="hovered = true"
        @mouseleave="hovered = false"
      >
        <img
          :src="`https://fast.wistia.com/embed/medias/${video.videoId}/swatch`"
          class="w-100 h-100"
          style="width:100%;height:100%;object-fit:cover;"
          alt
          aria-hidden="true"
          onload="this.parentNode.style.opacity=1;"
        >
        <button name="play" :class="{'play-hovered': hovered}">
          <span v-if="hovered">Watch now</span>
        </button>
      </div>
    </nuxt-link>

    <div class="video-summary mt-1 px-1">
      <h4>{{ video.title }}</h4>
      <p v-if="video.category">
        <b>Category:</b> {{ video.category }}
      </p>
      <p class="mt-1">
        {{ video.description }}
      </p>
    </div>
  </div>
</template>

<script>

export default {
  props: { video: { type: Object, default() { return null; } } },
  data() { return { hovered: false }; },
};

</script>

<style scoped>

.video-summary h4 {
  color: #1d8368;
}
.video-summary p {
  color: #295950;
  margin-top: 15px;
}
</style>

<style>
.video-container {
  width: 430px;
}
.video-box {
  background-color: #073b30;
  width: 100%;
  height: 220px;
  position: relative;
}
.video-box:hover {
  background-color: rgb(14,108,79);
  /*border: 10px solid rgb(14,108,79);*/
}

button[name='play'] {
  width: 60px;
  height: 40px;
  background: #187d61;
  border: none;
  border-radius: 5px;
  margin: auto;
  cursor: pointer;
  position: absolute;
  top: calc(50% - 17px);
  left: calc(50% - 24px);
}
button[name='play']:focus {
  outline: 0;
  border: 1px solid hsl(210, 58%, 69%);
  box-shadow: 0 0 0 3px hsla(210, 76%, 57%, 0.5);
}
button[name='play']::after {
  content: '';
  display: inline-block;
  position: relative;
  top: 3px;
  left: 3px;
  border-style: solid;
  border-width: 10px 0 10px 20px;
  border-color: transparent transparent transparent white;
}

button[name='play']>span{ color:white; font-weight: bold; }

button[name='play'].play-hovered {

  width: 120px;
  left: calc(50% - 54px);
  border-radius: 50px;

}

.play-hovered::after {

    border-style:none!important;

}

</style>
