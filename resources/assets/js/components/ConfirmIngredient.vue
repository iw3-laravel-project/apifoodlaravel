<template>
    <section class="cards">
        <div class="card backgroundCard">
            <header class="card-header">
                <div class="card-header-title is-centered">
                <h4>Verifiy few ingredients</h4>
                </div>
            </header>
                <div>
                    <ul v-for="ing in ingredients" :key="ing.index">
                        <li>{{ing.title}}</li>
                        <div class="content flex--row">
                            <button class="button--green" @click="confirm(ing)">Confirm</button>
                            <button class="button--maroon" @click="reject(ing)">Reject</button>
                        </div>
                    </ul>
                </div>
        </div>

    </section>
</template>

<script>
export default {
  data () {
    return {
      ingredients: [],
      
    }
  },
  created () {
      this.fetchProposedIngredients();
  },
  methods: {
    fetchProposedIngredients() {
        axios.get(`/api/tmp-ingredients/select`)
        .then(res => {
            this.ingredients = res.data
            console.log(this.ingredients)
        })
    },
    confirm (ing) {
        console.log('ing', ing)
        let payload = ing
        payload.positive_votes = 1
      this.$store.dispatch('confirmVote', { payload })
        .then(() => {
          console.log('ingredientAdded', this.ingredientAdded)
          this.ingredientAdded = true
          console.log('ingredientAdded***AFTER', this.ingredientAdded)
        })
        .catch((err) => {
          console.log(err)
        })
    }
  }
}
</script>

<style lang="scss">

section {
    display: flex;
    justify-content: space-around;

    .backgroundCard {
    width: 66vw;
    min-height: 80vh;
    }
}
.marg {
    margin-top: 5vh;
}
</style>