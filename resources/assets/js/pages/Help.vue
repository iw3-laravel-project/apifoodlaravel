<template>
    <div>
        <h1 class="title"> How to Help</h1>
        <p class="title"> It is really easy! </p>
        <h3 class="title">Just propose new Ingredients!</h3>
        <div class="columns flex--row">
            <div v-for="option in options" :key='option.id' class="column has-text-centered">
                <button 
                  class="button--green" 
                  @click="(() =>{openComponent(option.id)})">
                    <i :class=[option.icon]></i> {{ isDesktop ? option.title : ''}}
                </button>
            </div>
        </div>

        <add-ingredient v-if="showComponent && idComponent === 0"></add-ingredient>
        <confirm-ingredient v-if="showComponent && idComponent === 1"></confirm-ingredient>
        <forum v-if="showComponent && idComponent === 2"></forum>

    </div>
</template>

<script>
import AddIngredient from '../components/AddIngredient'
import ConfirmIngredient from '../components/ConfirmIngredient'
import Forum from '../components/Forum'
export default {
  middleware: 'auth',
  components: {
    AddIngredient,
    ConfirmIngredient,
    Forum
  },
  data () {
    return {
      options: [
        {
          id: 0,
          title: 'Propose a new ingedient',
          icon: 'fas fa-plus'
        },
        {
          id: 1,
          title: 'Verify few ingredients',
          icon: 'far fa-eye'
        },
        {
          id: 2,
          title: 'Access the forum',
          icon: 'far fa-comments'
        }
      ],
      showComponent: false,
      idComponent: null,
      isDesktop: true
    }
  },
  methods: {
    openComponent (id) {
      this.showComponent = true
      this.idComponent = id
    },
    isSizeDesktop () {
      if (window.innerWidth > 700) {
        this.isDesktop = true
      } else {
        this.isDesktop = false
      }
    }
  },
  beforeMount () {
    this.isSizeDesktop()
  }
}
</script>

<style lang="scss">

</style>
