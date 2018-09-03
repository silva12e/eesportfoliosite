<template>
    <div class="main-wrapper">
        <!--Main section-->
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

        <!--Experience section-->
        <ees-resume-experience id="experience-section">
        </ees-resume-experience>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: {
                    mainTitle: 'EES - Software Development',
                    mainSubtitle: 'Design Portfolio'
                },
                showSubtitle: false,
                showDownArrow: false
            }
        },
        mounted() {
        },
        methods: {
            onTyped: function(typedString) {
                switch(typedString) {
                    case this.message.mainTitle:
                        this.showSubtitle = true;
                        break;
                    case this.message.mainSubtitle:
                        this.showDownArrow = true;
                        break;
                }
            }
        }
    }
</script>
<style>
    .main-section canvas {
        /*height: 400px !important;*/
        position: absolute !important;
    }
    .hero-body {
        position: absolute !important;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        top: 20%;
    }
    .arrow-icon {
        z-index: 999;
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        bottom: 20%;
    }
</style>
