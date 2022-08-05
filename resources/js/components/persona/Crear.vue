<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                     <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Create new Persona</h4>
                        <router-link to="/home" class="btn btn-info btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="crear">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" v-model="persona.name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lastname</label>
                                        <input type="text" class="form-control" v-model="persona.lastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Github</label>
                                        <input type="text" class="form-control" v-model="persona.github">
                                    </div>
                                    <div class="form-group">
                                        <label for="">WhatsApp</label>
                                        <input type="text" class="form-control" v-model="persona.whatsapp">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" v-model="persona.email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Location</label>
                                        <input type="text" class="form-control" v-model="persona.location">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-info btn-block text-white">Save</button>
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
                github: "",
                whatsapp: "",
                email: "",
                location: "",
            }
        }
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
        }
    }
}
</script>

<style>
</style>


