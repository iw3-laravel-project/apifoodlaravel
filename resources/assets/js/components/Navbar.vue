<template>
  <div class="container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="/">AπFood</a>
        <button class="button navbar-burger" @click="showNav = !showNav" :class="{ 'is-active': showNav }">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="navbar-menu" :class="{ 'is-active': showNav }">
        <div class="navbar-end" @click="showNav = !showNav">
          <router-link class="navbar-item" to="/how-to-help">How To Help</router-link>
          <router-link class="navbar-item" to="/how-it-work">How it Works</router-link>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data () {
    return {
      showNav: false
    }
  }
}
</script>
