<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Create new Persona</h4>
                        <router-link to="/home" class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="create">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" v-model="persona.name" :class="
                                                v$.persona.name.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.name.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control" v-model="persona.lastname"
                                                    :class="
                                                    v$.persona.lastname.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.lastname.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label><br>
                                                <select v-model="persona.city_id" :class="
                                                v$.persona.city_id.$error === true ? 'border border-danger' : ''">
                                                    <option v-for="city in cities" :value="city.id" :key="city.id">{{
                                                            city.name
                                                    }}
                                                    </option>
                                                </select><br>
                                                <span class="text-danger small" v-for="error of v$.persona.city_id.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" v-model="persona.title" :class="
                                                v$.persona.title.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.title.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <!-- <div class="form-group">
                                        <input type="hidden" name="status" :value=0>
                                    </div> -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" v-model="persona.email" :class="
                                                v$.persona.email.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.email.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>GitHub</label>
                                                <input type="text" class="form-control" v-model="persona.github" :class="
                                                v$.persona.github.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.github.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>WhatsApp</label>
                                                <input type="text" class="form-control" v-model="persona.whatsapp"
                                                    :class="
                                                    v$.persona.whatsapp.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.whatsapp.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Experience</label><br>
                                                <select v-model="persona.experience"
                                                    :class="
                                                    v$.persona.experience.$error === true ? 'border border-danger' : ''">
                                                    <option v-for="i in 20" :value="i" :key="i">{{ i }}
                                                    </option>
                                                </select><br>
                                                <span class="text-danger small" v-for="error of v$.persona.experience.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea cols="30" rows="2" class="form-control" v-model="persona.description"
                                            :class="
                                            v$.persona.description.$error === true ? 'border border-danger' : ''">
                                                    </textarea>
                                        <span class="text-danger small" v-for="error of v$.persona.description.$errors"
                                            :key="error.$uid">
                                            {{ error.$message }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>About</label>
                                        <textarea cols="30" rows="2" class="form-control" v-model="persona.about"
                                            :class="
                                            v$.persona.about.$error === true ? 'border border-danger' : ''">
                                                    </textarea>
                                        <span class="text-danger small" v-for="error of v$.persona.about.$errors"
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
import { required, email, numeric, url, helpers, maxLength, alpha } from '@vuelidate/validators'
export default {
    name: "create-persona",
    setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            persona: {
                name: "",
                lastname: "",
                title: "",
                description: "",
                about: "",
                //status: "",
                experience: "",
                city_id: "",
                //user_id: "",
                email: "", //social email
                whatsapp: "", //social whatsapp
                github: "", //social github
            },
            cities: []
        }
    },
    validations() {
        return {
            persona: {
                name: { required:helpers.withMessage("Name is required", required), $autoDirty:true, maxLengthValue: maxLength(10), alpha },
                lastname: { required, $autoDirty:true },
                title: { required, $autoDirty:true },
                description: { required, $autoDirty:true },
                about: { required, $autoDirty:true},
                //status: "",
                experience: { required, numeric, $autoDirty:true },
                city_id: { required, $autoDirty:true },
                //user_id: { required },
                email: { required, email, $autoDirty:true }, //social email
                whatsapp: { required, numeric, $autoDirty:true }, //social whatsapp
                github: { required, url, $autoDirty:true }, //social github

            }
        }
    },
    mounted() {
        this.getCities()
        //this.persona.status = document.getElementsByName("status").value
    },
    methods: {
        submit() {
            this.v$.$touch();
            if(!this.v$.$error){
            alert('done')
            }else{
            alert('fail')
            }
        },
        clearFields() {
            this.persona = {
                name: "",
                lastname: "",
                title: "",
                description: "",
                about: "",
                //status: "",
                experience: "",
                city_id: "",
                user_id: "",
                email: "", //social email
                whatsapp: "", //social whatsapp
                github: "", //social github
            },
                this.cities = []
        },
        async create() {
            await this.axios.post('/api/persona', this.persona)
                .then(response => {
                    this.$router.push({ name: "showPersonas" })
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async getCities() {
            await this.axios.get('/api/city')
                .then(response => {
                    this.cities = response.data
                })
                .catch(error => {
                    this.cities = []
                })
        },
    }
}
</script>

<style>
</style>


