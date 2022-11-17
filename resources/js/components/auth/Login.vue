<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        Login
                        <button id="infoBtn" @click="info()" class="btn btn-sm btn-dark"><i class="fa-solid fa-info"></i></button>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="login">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control text-bg-dark border border-secondary" name="email" required
                                        autocomplete="email" autofocus v-model="form.email">
                                        <span class="text-danger" v-if="error">{{error}}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control text-bg-dark border border-secondary" name="password" required
                                        autocomplete="current-password" v-model="form.password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success text-white">
                                        Login
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
                email: '',
                password: '',
            }),
        }
    },
    methods: {
        async login() {
            await this.axios.post('/api/login', this.form)
                .then(response => {
                    if (!response.data.error) {

                        localStorage.setItem('token', response.data.token)
                        //window location was implemented to fixd bug at the first autentication (not autorized), but when refresh the page work perfect
                        window.location.replace("/home");
                        //this.$router.push({name: "showPersonas"});

                    } else {
                        this.error = response.data.error;
                        this.form.password = '';
                    }
                })
        },
        info() {
            this.$swal({
                position: 'center',
                color: '#fff',
                confirmButtonColor: '#198754',
                width: 400,
                background: '#212529',
                icon: 'info',
                text: 'admin@gmail.com;12345678',
                title: 'Demo User: '
            });
        },
    }
}

</script>

