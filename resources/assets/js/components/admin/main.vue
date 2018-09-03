<template>
    <div class="container">
        <h1 class="title is-1" style="margin: 60px 0;">
            <a href="/">
                EESResume
            </a>
            - Admin
        </h1>
        <div class="tabs">
            <ul>
                <li class="is-active" style="color: #4275D5;">
                    Jobs
                </li>
            </ul>
        </div>
        <section class="hero is-fullheight">
            <div class="tile is-ancestor" style="margin-top: 40px;">
                <div class="tile is-vertical is-3"></div>
                <div class="tile is-vertical is-6">
                    <div class="field">
                        <label class="label">Company Name</label>
                        <div class="control">
                            <input class="input" v-model="jobBody.companyName" type="text">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Job Role</label>
                        <div class="control">
                            <input v-model="jobBody.jobRole" class="input" type="text">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea v-model="jobBody.description" class="textarea"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Image</label>
                        <div class="control">
                            <input class="input" v-model="jobBody.jobImg" type="text">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label"> From</label>
                        <div class="control">
                            <input class="input" v-model="jobBody.dateFrom" type="text">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Until</label>
                        <div class="control">
                            <input v-model="jobBody.dateTo"
                                   class="input"
                                   type="text">
                        </div>
                    </div>
                    <a class="button is-primary"
                       v-on:click="submitJobItem()">
                        Submit
                    </a>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                jobBody: {
                    companyName: '',
                    jobRole: '',
                    description: '',
                    jobImg: '',
                    dateFrom: '',
                    dateTo: ''
                }
            }
        },
        mounted() {
        },
        methods: {
            submitJobItem() {
                axios.post('http://eesresume.local:8888/experience/store', this.jobBody)
                    .then(response => {
                        console.log(response);
                        this.jobBody = {};
                    })
                    .catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>
<style>
    .label {
        color: #4275D5;
    }
</style>
