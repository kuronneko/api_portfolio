<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h6 class="fw-bolder">Create New Persona</h6>
                        <router-link to="/home" class="btn btn-dark btn-sm text-white"><font-awesome-icon icon="fa-solid fa-left-long" /></router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control text-bg-dark border border-secondary" v-model="persona.name" :class="
                                                v$.persona.name.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.name.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" class="form-control text-bg-dark border border-secondary" v-model="persona.lastname"
                                                    :class="
                                                    v$.persona.lastname.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.lastname.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label><br>
                                                <select v-model="persona.city_id" class="text-bg-dark border border-secondary" :class="
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
                                                <input type="text" class="form-control text-bg-dark border border-secondary" v-model="persona.title" :class="
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
                                                <input type="text" class="form-control text-bg-dark border border-secondary" v-model="persona.email" :class="
                                                v$.persona.email.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.email.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>GitHub</label>
                                                <input type="text" class="form-control text-bg-dark border border-secondary" v-model="persona.github" :class="
                                                v$.persona.github.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.github.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>WhatsApp</label>
                                                <input type="text" class="form-control text-bg-dark border border-secondary" v-model="persona.whatsapp"
                                                    :class="
                                                    v$.persona.whatsapp.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.persona.whatsapp.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Experience</label><br>
                                                <select v-model="persona.experience" class="text-bg-dark border border-secondary"
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
                                        <textarea cols="30" rows="2" class="form-control text-bg-dark border border-secondary" v-model="persona.description"
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
                                        <textarea cols="30" rows="2" class="form-control text-bg-dark border border-secondary" v-model="persona.about"
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
import { required, email, numeric, url, helpers, maxLength, minLength, alpha, alphaNum, minValue } from '@vuelidate/validators'
const alpha2 = helpers.regex(/^[a-zA-ZÀ-ÿ\s]{1,16}$/i);
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
                //name: { required:helpers.withMessage("Name is required", required), $autoDirty:true, maxLengthValue: maxLength(16), alpha },
                name: { required, alpha2:helpers.withMessage("Invalid Format", alpha2), maxLengthValue: maxLength(16), $autoDirty: true },
                lastname: { required, alpha2:helpers.withMessage("Invalid Format", alpha2), maxLengthValue: maxLength(16), $autoDirty: true },
                title: { required, $autoDirty:true, maxLengthValue: maxLength(26) },
                description: { required, $autoDirty:true },
                about: { required, $autoDirty:true },
                //status: "",
                experience: { required, $autoDirty:true, numeric },
                city_id: { required, $autoDirty:true, numeric },
                //user_id: { required },
                email: { required, $autoDirty:true, email }, //social email
                whatsapp: { required, $autoDirty:true, numeric, minLengthValue: minLength(11), maxLengthValue: maxLength(11) }, //social whatsapp
                github: { required, $autoDirty:true, url }, //social github
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
            this.create(); //remove create from submit.prevent and set here, to valida frist on front and back if front fail
            this.successAlert();
            }else{
            this.errorAlert();
            }
        },
            errorAlert(){
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
            successAlert(){
            this.$swal({
                position: 'center',
                color: '#fff',
                width: 400,
                background: '#212529',
                icon: 'success',
                title: 'Persona created successfully',
                showConfirmButton: false,
                timer: 1500
            });
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


