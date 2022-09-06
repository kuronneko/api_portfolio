<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h6 class="fw-bolder">Edit Social</h6>
                        <router-link
                            :to='{ name: "socialPersona", params: { personaID: this.$route.params.personaID } }'
                            class="btn btn-dark btn-sm text-white"><font-awesome-icon icon="fa-solid fa-left-long" /></router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control text-bg-dark border border-secondary"
                                            v-model="social.name" :class="
                                            v$.social.name.$error === true ? 'border border-danger' : ''">
                                        <span class="text-danger small" v-for="error of v$.social.name.$errors"
                                            :key="error.$uid">
                                            {{ error.$message }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <input type="text" class="form-control text-bg-dark border border-secondary"
                                            v-model="social.content" :class="
                                            v$.social.content.$error === true ? 'border border-danger' : ''">
                                        <span class="text-danger small" v-for="error of v$.social.content.$errors"
                                            :key="error.$uid">
                                            {{ error.$message }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" @click="submit"
                                        class="btn btn-success btn-sm col-12 text-white">Save</button>
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
import useVuelidate from '@vuelidate/core'
import { required, email, numeric, url, helpers, maxLength, minLength, alpha, alphaNum, minValue, maxValue } from '@vuelidate/validators'
export default {
    name: "edit-social",
    setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            social: {
                name: "",
                content: "",
            },
        }
    },
    validations() {
        return {
            social: {
                name: { required, maxLengthValue: maxLength(16), alpha, $autoDirty: true },
                content: { required, maxLengthValue: maxLength(50), $autoDirty: true }, //social whatsapp
            }
        }
    },
    mounted() {
        this.showSocial()
    },
    methods: {
        submit() {
            this.v$.$touch();
            if (!this.v$.$error) {
                this.update(); //remove create from submit.prevent and set here, to valida frist on front and back if front fail
                this.successAlert();
            } else {
                this.errorAlert();
            }
        },
        errorAlert() {
            this.$swal({
                position: 'center',
                color: '#fff',
                width: 400,
                background: '#212529',
                icon: 'error',
                title: 'All fields are required',
                showConfirmButton: false,
                timer: 1500
            });
        },
        successAlert() {
            this.$swal({
                position: 'center',
                color: '#fff',
                width: 400,
                background: '#212529',
                icon: 'success',
                title: 'Social edited successfully',
                showConfirmButton: false,
                timer: 1500
            });
        },
        async showSocial() {
            await this.axios.get(`/api/social/${this.$route.params.socialID}`)
                .then(response => {
                    const { name, content, persona_id } = response.data
                    this.social.name = name,
                        this.social.content = content
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async update() {
            await this.axios.put(`/api/social/${this.$route.params.socialID}`, this.social)
                .then(response => {
                    this.$router.push({
                        name: "socialPersona" //showSocialPersona
                    })
                })
                .catch(error => {
                    console.log(error)
                })
        },
    }
}
</script>

<style>
</style>
