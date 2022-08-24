<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Edit Persona</h4>
                        <router-link to="/home" class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="actualizar">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" v-model="persona.name">
                                    </div>
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control" v-model="persona.lastname">
                                    </div>
                                    <div class="form-group">
                                        <label>City</label><br>
                                        <select v-model="persona.city_id">
                                            <option v-for="city in cities" :value="city.id" :key="city.id">{{ city.name
                                            }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" v-model="persona.title">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea cols="30" rows="2" class="form-control"
                                            v-model="persona.description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>About</label>
                                        <textarea cols="30" rows="2" class="form-control"
                                            v-model="persona.about"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Experience</label><br>
                                        <select v-model="persona.experience">
                                            <option v-for="i in 10" :value="i" :key="i">{{ i }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-success btn-sm text-white">Save</button>
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
export default {
    name: "editar-persona",
    data() {
        return {
            persona: {
                name: "",
                lastname: "",
                title: "",
                description: "",
                about: "",
                experience: "",
                city_id: "",
                user_id: ""
            },
            cities: []
        }
    },
    mounted() {
        this.getCities(),
        this.mostrarPersona()
    },
    methods: {
        async mostrarPersona() {
            await this.axios.get(`/api/persona/${this.$route.params.id}`)
                .then(response => {
                    const { city_id, name, lastname, title, description, about, experience } = response.data
                        this.persona.name = name,
                        this.persona.lastname = lastname,
                        this.persona.title = title,
                        this.persona.description = description,
                        this.persona.about = about,
                        this.persona.experience = experience,
                        this.persona.city_id = city_id
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async actualizar() {
            await this.axios.put(`/api/persona/${this.$route.params.id}`, this.persona)
                .then(response => {
                    this.$router.push({
                        name: "mostrarPersonas"
                    })
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
