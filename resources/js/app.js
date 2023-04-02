import './bootstrap';


import { createApp, h } from 'vue';

import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';

import { createInertiaApp, Link } from '@inertiajs/vue3'
import MainLayout from "./Layouts/MainLayout.vue"



createInertiaApp({
  resolve: name => {
    
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

    let page = pages[`./Pages/${name}.vue`]
    //page.layout ??= MainLayout
    page.default.layout = page.default.layout || MainLayout
    return page


    //return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .component("Link", Link)//Charge le composant Link sur toutes les pages
      .mixin({ methods: { route }})//methode qui permet de rendre ziggy @route disponible dans tous les composant vuejs
      .mount(el)
  },
})
