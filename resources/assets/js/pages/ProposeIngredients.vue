<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <div class="form-group">
          <label for="title">Ingredient Title</label>
          <input v-model="newIngredientTitle" id="title" type="text" class="form-control">
        </div>
        <button @click="addTmpIngredient(newIngredientTitle)" 
          :class="{disabled: (!newIngredientTitle)}"
          class="btn btn-block btn-primary">Submit</button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        newIngredientTitle: ""
      }
    },
    created() {
      this.listenForChanges();
    },
    // mounted() {
    //     Echo.channel('ingredients')
    //         .listen('.newIngredientProposed', (tmpingredient) => {
    //             this.messages.push(tmpingredient);
    //         });
    // },
    methods: {
      addTmpIngredient(ingredientName) {
        // check if entries are not empty
        if(!ingredientName)
          return;

        // make API to save post
        axios.post('/api/tmp-ingredient', {
          title: ingredientName
        }).then( response => {
          if(response.data) { 
            this.newIngredientTitle = "";
          }
        })
      },
      listenForChanges() {
          console.log('on listen')
        Echo.channel('ingredients')
          .listen('IngredientPublished', newIngredientTitle => {
              console.log('ing')
            if (! ('Notification' in window)) {
              alert('Web Notification is not supported');
              return;
            }

            Notification.requestPermission( permission => {
              let notification = new Notification('New ingredient proposed!', {
                body: tmpingredient.title, // content for the alert
                icon: "https://pusher.com/static_logos/320x320.png" // optional image url
              });

              // link to page on clicking the notification
              notification.onclick = () => {
                window.open(window.location.href);
              };
            });
          })
        }
      } 
    }
</script>