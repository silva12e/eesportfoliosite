window.Vue = require('vue');


// Custom Components
import Experience from './components/experience/experience';
import Skills from './components/skills/skills';
import Main from './components/main/main';
import Admin from './components/admin/main.vue'
import Router from 'vue-router';
import { VueTyper } from 'vue-typer'
import VueTyperPlugin from 'vue-typer'
import VueCarousel from 'vue-carousel';
import Chat from 'vue-beautiful-chat';
import VueParticles from 'vue-particles';


// Router instance
export default new Router({
    routes: [
        {
            path: '/experience',
            name: 'experience',
            component: Experience
        },
        {
            path: '/skills',
            name: 'skills',
            component: Skills
        },
        {
            path: '/',
            name: 'Home',
            component: Main
        },
        {
            path: '/admin',
            name:'Admin',
            component: Admin
        }

    ]
});


// Component definitions
Vue.component(
    'ees-resume-experience',
    require('./components/experience/experience.vue')
);
Vue.component(
    'ees-resume-skills',
    require('./components/skills/skills.vue')
);
Vue.component(
    'ees-resume-main',
    require('./components/main/main.vue')
);

Vue.component(
    'ees-resume-experience-list',
    require('./components/experience/experience-list-component.vue')
);
Vue.component(
    'ees-resume-experience-item',
    require('./components/experience/experience-item.vue')
);
Vue.component(
    'ees-resume-admin-main',
    require('./components/admin/main.vue')
);

Vue.use(VueTyperPlugin);

// Vue scroller
var VueScrollTo = require('vue-scrollto');

Vue.use(VueScrollTo);
Vue.use(VueCarousel);
Vue.use(Chat);
Vue.use(VueParticles);

// You can also pass in the default options
Vue.use(VueScrollTo, {
    container: "body",
    duration: 500,
    easing: "ease",
    offset: 0,
    cancelable: true,
    onStart: false,
    onDone: false,
    onCancel: false,
    x: false,
    y: true
});

// Main app instance
const app = new Vue({
    el: '#app',
    components: {
        Experience,
        Skills,
        Main
    }
});
