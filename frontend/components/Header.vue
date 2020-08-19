<template>
  <div class="container-fluid">
    <div class="row background--white header">
      <div class="col-2 pt-5 pb-3">
        <div class="w-100 ml-3">
          <nuxt-link to="/">
            <AlgaeCal />
          </nuxt-link>
        </div>
      </div>

      <div class="col-10">
        <nav class="mt-5 pt-4 text-right w-100">
          <nuxt-link v-if="!$store.state.userStore.userInfo.isLoggedIn" to="/login" class="header-link">
            Login
          </nuxt-link>
          <nuxt-link v-if="$store.state.userStore.userInfo.isLoggedIn" to="/login?logout=true" class="header-link">
            Logout
          </nuxt-link>
          <nuxt-link to="/videos" class="header-link">
            Videos
          </nuxt-link>
        </nav>
      </div>
    </div>
  </div>
</template>

<style>

  .header { min-height: 80px; }

  a.header-link {
    margin-right: 15px;
    color: rgb(6,46,36);
    font-size: 1.3em;
  }

</style>
