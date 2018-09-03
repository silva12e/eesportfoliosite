<template>
    <div class="welcome-wrapper">
        <section class="hero main-section is-fullheight">
            <div>
                <vue-particles
                    color="#000"
                    :particleOpacity="0.3"
                    :particlesNumber="200"
                    shapeType="circle"
                    :particleSize="4"
                    linesColor="#fff"
                    :linesWidth="1"
                    :lineLinked="false"
                    :lineOpacity="0.4"
                    :linesDistance="150"
                    :moveSpeed="0.2"
                    :hoverEffect="true"
                    hoverMode="grab"
                    :clickEffect="true"
                    clickMode="push"
                >
                </vue-particles>
            </div>
            <div>
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <h1 class="title is-3">
                            <vue-typer text='EES - Software Development'
                                       @typed='onTyped'
                                       :repeat=0
                                       :type-delay=80>
                            </vue-typer>
                        </h1>
                        <h2 class="subtitle title"
                            v-if="showSubtitle">
                            <vue-typer text='Design Portfolio'
                                       @typed='onTyped'
                                       :repeat=0
                                       :type-delay=80>
                            </vue-typer>
                        </h2>
                    </div>
                </div>
                <footer class="footer">
                    <transition name="fade">
                        <div class="content has-text-centered arrow-icon"
                             v-show="showDownArrow">
                            <h1 class="is-6 subtitle page-title-experience">
                                Experience Resume
                            </h1>
                            <a href="#"
                               v-scroll-to="'#experience-section'">
                                <i class="fas fa-arrow-circle-down bounce">
                                </i>
                            </a>
                        </div>
                    </transition>
                </footer>
            </div>
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        mounted() {
        },
        methods: {

        }
    }
</script>
