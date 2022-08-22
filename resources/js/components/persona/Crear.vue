<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Create new Persona</h4>
                        <router-link to="/home" class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="crear">
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
                                            <option v-for="city in cities" :value="city.id" :key="city.id">{{ city.name }}
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
                                <!-- <div class="form-group">
                                        <input type="hidden" name="status" :value=0>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Experience</label><br>
                                        <select v-model="persona.experience">
                                            <option v-for="i in 10" :value="i" :key="i">{{ i }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-success btn-block text-white">Save</button>
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
    name: "crear-persona",
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
                user_id: ""
            },
            cities: []
        }
    },
    mounted() {
        this.getCities()
        //this.persona.status = document.getElementsByName("status").value
    },
    methods: {
        async crear() {
            await this.axios.post('/api/persona', this.persona)
                .then(response => {
                    this.$router.push({ name: "mostrarPersonas" })
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


