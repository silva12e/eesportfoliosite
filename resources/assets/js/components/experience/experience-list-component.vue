<template>
    <div class="columns is-multiline experience-columns">
        <div class="column is-half" v-for="item in experienceList">
                <div class="card hidden" v-infocus="'showElement'">
                    <div class="card-content">
                        <div class="media ">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4 job-title">
                                    {{ item.company_name }}
                                </p>
                                <p class="subtitle is-6 job-title" style="font-size: 15px;">
                                    {{ item.job_role }}  -
                                    <time datetime="2016-1-1">
                                        {{ item.date_from }} - {{ item.date_to }}
                                    </time>
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            <p>
                                {{ item.description }}
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['experienceList'],
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

            }
        },
        mounted() {
        }
    }
</script>

<style>
    .label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .card {
         border-radius: 2% !important;
    }
    .card-content {
        font-size: 16px;
        padding: 20px;
        margin-top: 60px;

    }
    .card-content .content {
        margin-top: 20px;
        text-align: left;
        padding: 20px 20px;
        border-top: #25284A solid 1px;
    }
    .media-content .job-title {
        font-family: 'Patua One', cursive;
        font-size: 18px;
        color: #25284A;
    }

    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
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
