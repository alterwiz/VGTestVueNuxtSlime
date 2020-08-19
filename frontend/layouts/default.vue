<template>
  <div>
    <Header />

    <div class="w-100">
      <Nuxt />
    </div>
  </div>
</template>

<style>

html {
  font-family:
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover { color: #fff; background-color: #35495e; }

.background--green { background-color: rgb(4,45,35); }

.background--white { background-color: #fefeff; }

.container-fluid, .container-sm, .container-md, .container-lg, .container-xl { padding-left:12%;padding-right:12%; }

</style>
