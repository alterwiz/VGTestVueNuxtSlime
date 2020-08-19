<template>
  <div class="background--green w-100 h-100">
    <div class="container pb-5">
      <div class="d-flex background--white m-auto p-5 mb-5 mwhiteBox">
        <LoginForm :users="users" />
      </div> <!-- /white div -->
    </div> <!-- /container div -->
  </div>
</template>

<script>

export default {

  async fetch() {
    this.users = await fetch(
      'http://localhost:8080/users'
    ).then(res => res.json());
  },

  data() {
    return { users: { data: [] } };
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

</style>

<style scoped>

  .card { border-radius: 0; }

  .custom-checkbox input#input-remember { border-radius: 1px; }

  .whiteBox { min-width: 35rem; min-height: 30rem; }

</style>
