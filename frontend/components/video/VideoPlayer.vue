<template>
  <div>
    <script src="https://fast.wistia.com/assets/external/E-v1.js" async />

    <div :class="embedClass">
      <div class="wistia_swatch h-100 w-100 wistia_swatch_customized">
        <img
          :src="imageScr"
          style="width:100%;height:100%;object-fit:cover;"
          alt
          aria-hidden="true"
          onload="this.parentNode.style.opacity=1;"
        >
      </div>
    </div>
  </div>
</template>


<script>

export default {
  props: { videoId: { type: String, default() { return ''; } } },
  data() {
    return {
      embedClass: `wistia_embed wistia_async_${this.videoId} wistia_embed_customized`,
      imageScr: `https://fast.wistia.com/embed/medias/${this.videoId}/swatch`,
    };
  },
};

</script>

<style>

  .wistia_embed_customized {

    position: relative;
    width: 640px;
    height: 360px;

  }

  .wistia_swatch_customized {

    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 200ms;

  }

</style>
