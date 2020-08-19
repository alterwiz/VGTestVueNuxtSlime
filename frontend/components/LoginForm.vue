<template>
  <b-form class="w-100 d-flex flex-column align-content-stretch align-self-stretch" @submit="onSubmit">
    <div class="d-flex col m-0 pt-1 pb-5 formtitle">
      User Login
    </div>

    <div class="d-flex row">
      <b-form-group id="input-group-1" class="col-12">
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="text"
          required
          placeholder="Your Email Address"
        />
        <!--
                  @todo Assets mockup contains a placeholder "Your Email Address" for some reason
                  placeholder="Enter username"
                -->
      </b-form-group>

      <b-form-group id="input-group-2" class="col-12 pb-5 text-left">
        <!-- @todo Have noticed custom checkbox is required. Not critical now -->

        <p-check
          id="input-remember"
          v-model="form.remember"
          class="p-svg p-curve"
          type="checkbox"
          labelfor="input-remember"
          value="1"
          unchecked-value="0"
        >
          <svg
            width="1em"
            height="1em"
            viewBox="0 0 16 16"
            class="svg svg-icon bi bi-check2"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
          </svg>
          Remember me
        </p-check>
      </b-form-group>
    </div> <!-- /fields div -->

    <div class="d-flex col align-content-stretch  mb-3">
      <b-button
        pill
        block
        type="submit"
        variant="success"
        class="button--green m-auto"
        size="lg"
        :disabled="isUsernameMeetsRequirements"
      >
        Login
      </b-button>
    </div> <!-- /button div -->
  </b-form>
</template>

<script>

const prettyCheck = require('pretty-checkbox-vue/check');

export default {

  components: { 'p-check': prettyCheck },

  props: { users: { type: Object, default() { return { data: [] }; } } },

  data() { return { form: { email: '' } }; },

  computed: { isUsernameMeetsRequirements() { return this.form.email.length < 3; } },

  methods: {

    addUser(user) { this.$store.commit('userStore/add', user); },

    removeUser() { this.$store.commit('user/remove'); },

    async getUsers() { this.users = await this.$axios.get('http://localhost:8080/users').then(res => res.json()); },

    checkUser(user) {
      const compareUsername = this.form.email.toLowerCase().trim();
      const validUser = this.users.data.find(u => compareUsername === u.username.toLowerCase().trim());

      if (validUser) {
        this.addUser(this.form.email);
        this.$router.push('/videos');
      } else {
        this.$toast.show('Sorry, that username is not found');
      }
    },

    onSubmit(event) {
      event.preventDefault(); this.checkUser(this.form.email);
    },

  },

};

</script>

<style src="../node_modules/pretty-checkbox/dist/pretty-checkbox.min.css"></style>

<style>

  .formtitle {
    font-family: 'Optima',
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
    font-weight: 400;
    font-size: 48px;
    color: rgb(14,108,78);
    word-spacing: 5px;
    text-align: center;
    display: block!important;
  }

  .button--green {
    display: inline-block;
    /*border-radius: 4px;*/
    border: 1px solid rgb(14,108,79);
    background-color: rgb(14,108,79);
    /*color: #3b8070;*/
    text-decoration: none;
    padding: 10px 30px;
    font-weight: bold;
    max-height:60px;
    max-width: 38%
  }

  .button--green:hover {
    color: #fff;
    background-color: #3b8070;
  }

  .button--green:disabled {
    color: #fff;
    background-color: lightgray;
    border-color: rgb(200,200,200);
  }

</style>
