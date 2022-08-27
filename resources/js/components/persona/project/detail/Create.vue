<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Create new Detail</h4>
                        <router-link
                            :to='{ name: "detailProject", params: { projectID: this.$route.params.projectID, personaID: this.$route.params.personaID } }'
                            class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea cols="30" rows="2"
                                            class="form-control text-bg-dark border border-secondary"
                                            v-model="detail.description" :class="
                                            v$.detail.description.$error === true ? 'border border-danger' : ''">
                                                    </textarea>
                                        <span class="text-danger small" v-for="error of v$.detail.description.$errors"
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
    name: "create-detail",
    setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            detail: {
                description: "",
                project_id: this.$route.params.projectID
            },
        }
    },
    validations() {
        return {
            detail: {
                description: { required, maxLengthValue: maxLength(300), $autoDirty: true },
            }
        }
    },
    mounted() {

    },
    methods: {
        submit() {
            this.v$.$touch();
            if (!this.v$.$error) {
                this.create(); //remove create from submit.prevent and set here, to valida frist on front and back if front fail
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
                title: 'Detail created successfully',
                showConfirmButton: false,
                timer: 1500
            });
        },
        async create() {
            await this.axios.post('/api/detail', this.detail)
                .then(response => {
                    this.$router.push({ name: "detailProject" }) //showDetailProject
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


