import Vue from 'vue';
import VueRouter from 'vue-router';

import Index from './pages/Index.vue';
import Help from './pages/Help.vue';
import Work from './pages/Work.vue';
import ProposeIngredients from './pages/ProposeIngredients.vue';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/how-to-help',
      name: 'Help',
      component: Help
    },
    {
      path: '/how-it-work',
      name: 'Work',
      component: Work
    },
    {
      path: '/propose-an-ingredient',
      name: 'ProposeIngredients',
      component: ProposeIngredients
    }
  ]

})

export default router;