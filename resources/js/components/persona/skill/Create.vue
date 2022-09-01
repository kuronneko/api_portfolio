<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Create new Skill</h4>
                        <router-link :to='{ name: "skillPersona", params: { personaID: this.$route.params.personaID } }' class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                     <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control text-bg-dark border border-secondary" v-model="skill.name" :class="
                                                v$.skill.name.$error === true ? 'border border-danger' : ''">
                                                <span class="text-danger small" v-for="error of v$.skill.name.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                     <div class="form-group">
                                                <label>Level</label><br>
                                                <select v-model="skill.level" class="text-bg-dark border border-secondary"
                                                    :class="
                                                    v$.skill.level.$error === true ? 'border border-danger' : ''">
                                                    <option v-for="i in 100" :value="i" :key="i">{{ i }}
                                                    </option>
                                                </select><br>
                                                <span class="text-danger small" v-for="error of v$.skill.level.$errors"
                                                    :key="error.$uid">
                                                    {{ error.$message }}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label><br>
                                                <select v-model="skill.type_id" class="text-bg-dark border border-secondary" :class="
                                                v$.skill.type_id.$error === true ? 'border border-danger' : ''">
                                                    <option v-for="skillType in skillTypes" :value="skillType.id" :key="skillType.id">{{
                                                            skillType.name
                                                    }}
                                                    </option>
                                                </select><br>
                                                <span class="text-danger small" v-for="error of v$.skill.type_id.$errors"
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
    name: "create-skill",
        setup() {
        return { v$: useVuelidate() }
    },
    data() {
        return {
            skill: {
                name: "",
                level: "",
                persona_id: this.$route.params.personaID,
                type_id: "",
            },
            skillTypes: []

        }
    },
        validations() {
        return {
            skill: {
                name: { required, maxLengthValue: maxLength(16), alpha, $autoDirty: true },
                level: { required, minValue: minValue(1), maxValue: maxLength(100), numeric, $autoDirty:true }, //social whatsapp
                type_id: { required, numeric, $autoDirty:true }, //social whatsapp
            }
        }
    },
    mounted() {
        this.getSkillTypes()
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
                title: 'Skill created successfully',
                showConfirmButton: false,
                timer: 1500
            });
        },
        async create() {
            await this.axios.post('/api/skill', this.skill)
                .then(response => {
                    this.$router.push({ name: "skillPersona" }) //showSkillPersona
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async getSkillTypes() {
            await this.axios.get('/api/skill/get/types')
                .then(response => {
                    this.skillTypes = response.data
                })
                .catch(error => {
                    this.skillTypes = []
                })
        },
    }
}
</script>

<style>
</style>


