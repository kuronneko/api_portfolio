<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        Register
                    </div>
                    <div class="card-body">
                        <p class="text-danger text-center" v-if="error">{{error}}</p>

                        <form @submit.prevent="register">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required
                                        autocomplete="name" autofocus v-model="form.name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required
                                        autocomplete="email" v-model="form.email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="new-password" v-model="form.password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm
                                    Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" v-model="form.password_confirmation">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success text-white">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import { reactive, ref } from 'vue';

export default {
    data() {
        return {
            error: ref(''),
            form: reactive({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }),
        }
    },
    methods: {
        async register() {
            await this.axios.post('/api/register', this.form)
                .then(response => {
                    if (!response.data.error) {

                        localStorage.setItem('token', response.data.token)
                        //window location was implemented to fixd bug at the first autentication (not autorized), but when refresh the page work perfect
                        window.location.replace("/home");
                        //this.$router.push({name: "showPersonas"});

                    } else {
                        this.error = response.data.error;
                    }
                })
        },
    }
}

</script>
