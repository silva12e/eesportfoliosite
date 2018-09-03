<template>
    <div>
        <section class="hero is-fullheight experience-section">
            <div class="tile is-ancestor" style="margin-top: 40px;">
                <div class="tile is-vertical is-6 has-text-centered-desktop hidden"  v-infocus="'showElement'">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child notification" style="background: transparent">
                                <figure class="image">
                                    <img class="is-rounded user-avatar"
                                         style="margin: auto"
                                         src="http://res.cloudinary.com/eesportfolio/image/upload/ar_1:1,b_rgb:262c35,bo_5px_solid_rgb:000000,c_fill,g_auto,r_max/v1534720272/samples/ernesto-avatar.png"
                                         alt="Placeholder image">
                                </figure>
                                <p class="title is-2" style="color: white; margin-top: 40px;">
                                    Edgard E. Silva
                                </p>
                                <p class="title is-4" style="color: white; margin-top: 40px;">
                                    Software/Web development
                                </p>
                                <i class="fab fa-linkedin" style=" color: #fff !important;"></i>
                                <i class="fab fa-github" style=" color: #fff !important;"></i>
                                <i class="fab fa-instagram" style=" color: #fff !important;"></i>
                                <ul style="color: #fff;">

                                    <li>
                                        Edgard.ernesto.silva@gmail.com
                                    </li>
                                    <li>
                                        250-864-0736
                                    </li>
                                    <li>
                                        Kelowna, BC, Canada
                                    </li>
                                </ul>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="tile is-vertical is-6 hidden"  v-infocus="'showElement'">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child notification" style="background: transparent">
                                <p class="title is-5" style="color: white;">
                                    Technical Tools
                                </p>
                                <div v-for="tag in technicalToolsTags" style="display:inline; padding: 5px;">
                                <span class="tag is-dark">
                                    {{ tag }}
                                </span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="tile is-parent is-vertical">
                        <article class="tile is-child notification" style="background: transparent">
                            <p class="title is-5" style="color: white;">
                                Additional Tools / Frameworks
                            </p>
                            <div v-for="tag in additionalToolsTagsAfter " style="display:inline; padding: 5px;">
                                <span class="tag is-dark">
                                    {{ tag }}
                                </span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="tile is-ancestor">

            </div>
            <p class="title is-2" style="color: white; margin-top: 40px; padding-left: 20px;">
                Projects
            </p>
            <section class="section" style="margin-top: 0; padding-top: 0">
                <ees-resume-experience-list :experienceList="experienceList">
                </ees-resume-experience-list>
            </section>
        </section>
        <section class="hero ees-resume-footer hidden" v-infocus="'showElement'">
            <footer class="footer ees-resume-footer" >
                <div class="content has-text-centered">
                    <p>
                        Website Design by Edgard Ernesto Silva 2018
                    </p>
                </div>
            </footer>
        </section>

        <transitions>
            <div>
                <beautiful-chat
                    :agentProfile="agentProfile"
                    :onMessageWasSent="onMessageWasSent"
                    :messageList="messageList"
                    :newMessagesCount="newMessagesCount"
                    :isOpen="isChatOpen"
                    :close="closeChat"
                    :open="openChat"
                    :showEmoji="true"
                    :showFile="false" />
            </div>
        </transitions>
    </div>

</template>

<script>
    import axios from 'axios';
    import VueTagsInput from '@johmun/vue-tags-input';
    export default {
        components: {
            VueTagsInput,
        },
        Template: 'ees-resume-experience',
        directives: {
            infocus: {
                    isLiteral: true,
                    inserted: (el, binding, vnode) => {
                        let f = () => {
                            let rect = el.getBoundingClientRect();
                            let inView = (
                                rect.width > 0 &&
                                rect.height > 0 &&
                                rect.top >= 0 &&
                                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
                            );
                            if (inView) {
                                el.classList.add(binding.value);
                                window.removeEventListener('scroll', f)
                            }
                        };
                        window.addEventListener('scroll', f);
                        f()
                    }
                }
            },
        data() {
            return {
                agentProfile: {
                    teamName: 'Send me a message',
                    imageUrl: 'https://a.slack-edge.com/66f9/img/avatars-teams/ava_0001-34.png'
                },
                messageList: [],
                newMessagesCount: 0,
                isChatOpen: false,

                experienceList: [],
                technicalToolsTags: [
                    'Typescript',
                    'JavaScripts',
                    'EcmaScript',
                    'JSON',
                    'JQuery',
                    'Sass/Css',
                    'HTML/XML',
                    'Php',
                    'SQL',
                    'Bash',
                    'Java',
                    'C++',
                    'C',
                    'MySQl',
                    'Git'
                ],
                additionalToolsTags :[
                    'Angular + 2',
                    'Ionic + 2',
                    'Laravel 5.x',
                    'Vue.js 2',
                    'NGRX',
                    'Redux',
                    'Npm',
                    'Bootstrap',
                    'Postman',
                    'Bulma',
                    'Redis',
                    'LAMP Stack',
                    'C-Panel',
                    'WAMP/ MAMP',
                    'Wordpress',
                    'Jira',
                ],
                additionalToolsTagsAfter: [],
                technicalToolsTagsAfter: []
            }
        },
        mounted() {
            this.initExperienceList();
            this.initTagsAnimation();
        },
        methods: {
            initTagsAnimation() {
                this.additionalToolsTags.forEach(value => {
                    this.additionalToolsTagsAfter.push(value);
                });
            },
            initExperienceList() {
                axios
                    .get('http://eesresume.local:8888/experience/')
                    .then(response =>{
                        this.experienceList = response.data;
                    }).catch(error => {
                    console.log(error);
                });
            },
            sendMessage (msg) {
                if (text.length > 0) {
                    this.newMessagesCount = this.isChatOpen ? this.newMessagesCount : this.newMessagesCount + 1;
                    this.messageList.push(msg);
                }
            },
            onMessageWasSent (msg) {
                this.messageList.push(msg);
            },
            openChat () {
                this.isChatOpen = true;
                this.newMessagesCount = 0;
            },
            closeChat () {
                this.isChatOpen = false;
            }
        }
    }
</script>
<style>
    .title {
        font-family: 'Patua One', cursive;
    }
    .image .user-avatar {
        width: 50%;
        /*padding-left: 20px;*/
    }
    .ees-resume-footer {
        background-color: #363636 !important;
        color: #fff;
    }
    .page-title-experience.title {
        color: #fff !important;
    }
    .user-avatar {
        width: 300px !important;
        margin-bottom: 40px;
    }
    /* the classes */
    .hidden {
        opacity: 0;
    }

    .hidden-right {
        transform: translate(50px, 0);
    }

    .hidden-left {
        transform: translate(-50px, 0);
    }

    .showElement {
        opacity: 1;
        transform: translate(0, 0);
        -webkit-transition: all 0.5s ease-out;
        -moz-transition: all 0.5s ease-out;
        transition: all 0.5s ease-out;
    }
</style>
