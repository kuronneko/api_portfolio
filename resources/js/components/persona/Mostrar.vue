<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                <router-link :to='{ name: "crearPersona" }' class="btn btn-success text-white">New Persona</router-link>
                            </div>
                            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Lastname</th>
                                <th>Github</th>
                                <th>WhatsApp</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Last Updated</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="persona in personas" :key="persona.id">
                                <td>{{ persona.id }}</td>
                                <td>{{ persona.name }}</td>
                                <td>{{ persona.lastname }}</td>
                                <td>{{ persona.github }}</td>
                                <td>{{ persona.whatsapp }}</td>
                                <td>{{ persona.email }}</td>
                                <td>{{ persona.location }}</td>
                                <td>{{ persona.updated_at }}</td>
                                <td>
                                    <a v-if="persona.status == 1" type="button" @click="statusPersona(persona.id)" class="btn btn-success">Active</a>
                                    <a v-if="persona.status == 0" type="button" @click="statusPersona(persona.id)" class="btn btn-dark">Disable</a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                    <router-link :to='{ name: "editarPersona", params: { id: persona.id } }' class="btn btn-success text-white">
                                        Edit</router-link>
                                        <a type="button" @click="borrarPersona(persona.id)" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>



</template>

<script>
export default {
    name: "personas",
    data() {
        return {
            personas: []
        }
    },
    mounted() {
        this.mostrarPersonas()
    },
    methods: {
        async mostrarPersonas() {
            await this.axios.get('/api/persona')
                .then(response => {
                    this.personas = response.data
                })
                .catch(error => {
                    this.persona = []
                })
        },
        borrarPersona(id) {
            if (confirm("Do you want to delete this entry?")) {
                this.axios.delete(`/api/persona/${id}`)
                    .then(response => {
                        this.mostrarPersonas()
                    })
                    .catch(error => {
                        console(error)
                    })
            }
        },
                statusPersona(id) {
                this.axios.put(`/api/persona/status/${id}`)
                    .then(response => {
                        this.mostrarPersonas()
                    })
                    .catch(error => {
                        console(error)
                    })
        }
    }
}
</script>

<style>
</style>
