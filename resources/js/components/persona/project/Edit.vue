<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Edit Project</h4>
                        <router-link :to='{ name: "projectPersona", params: { personaID: this.$route.params.personaID } }'
                            class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                  <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control text-bg-dark border border-secondary"
                                            v-model="project.name" :class="
                                            v$.project.name.$error === true ? 'border border-danger' : ''">
                                        <span class="text-danger small" v-for="error of v$.project.name.$errors"
                                            :key="error.$uid">
                                            {{ error.$message }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control text-bg-dark border border-secondary"
                                            v-model="project.title" :class="
                                            v$.project.title.$error === true ? 'border border-danger' : ''">
                                        <span class="text-danger small" v-for="error of v$.project.title.$errors"
                                            :key="error.$uid">
                                            {{ error.$message }}
                                        </span>
                                    </div>
                                   <div class="form-group">
                                        <label>Description</label>
                                        <textarea cols="30" rows="2" class="form-control text-bg-dark border border-secondary" v-model="project.description"
                                            :class="
                                            v$.project.description.$error === true ? 'border border-danger' : ''">
                                                    </textarea>
                                        <span class="text-danger small" v-for="error of v$.project.description.$errors"
                                            :key="error.$uid">
                                            {{ error.$message }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" @click="submit" class="btn btn-success btn-sm col-12 text-white">Save</button>
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
    name: "edit-project",
        setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            project: {
                name: "",
                title: "",
                description: "",
            },
        }
    },
        validations() {
        return {
            project: {
                name: { required, maxLengthValue: maxLength(16), alphaNum, $autoDirty: true },
                title: { required, maxLengthValue: maxLength(36), $autoDirty: true },
                description: { required, maxLengthValue: maxLength(800), $autoDirty: true },
            }
        }
    },
    mounted() {
        this.showProject()
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
                title: 'Project edited successfully',
                showConfirmButton: false,
                timer: 1500
            });
        },
        async showProject() {
            await this.axios.get(`/api/project/${this.$route.params.projectID}`)
                .then(response => {
                    const { name, title, description, persona_id } = response.data
                    this.project.name = name,
                    this.project.title = title
                    this.project.description = description
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async update() {
            await this.axios.put(`/api/project/${this.$route.params.projectID}`, this.project)
                .then(response => {
                    this.$router.push({
                        name: "projectPersona" //showProjectPersona
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
