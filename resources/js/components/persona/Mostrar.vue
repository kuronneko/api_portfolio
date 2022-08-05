<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                <router-link :to='{ name: "crearPersona" }' class="btn btn-info text-white">Nueva Persona</router-link>
                            </div>
                            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Contenido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="persona in personas" :key="persona.id">
                                <td>{{ persona.id }}</td>
                                <td>{{ persona.name }}</td>
                                <td>{{ persona.lastname }}</td>
                                <td>
                                    <div class="btn-group">
                                    <router-link :to='{ name: "editarPersona", params: { id: persona.id } }' class="btn btn-info text-white">
                                        Editar</router-link>
                                    <a type="button" @click="borrarPersona(persona.id)" class="btn btn-danger">Borrar</a>
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
            if (confirm("Confirmar eliminar el registro?")) {
                this.axios.delete(`/api/persona/${id}`)
                    .then(response => {
                        this.mostrarPersonas()
                    })
                    .catch(error => {
                        console(error)
                    })
            }
        }
    }
}
</script>

<style>
</style>
