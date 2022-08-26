<template>
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark text-white border border-secondary">
                    <div class="card-header border border-secondary border-top-0 border-start-0 border-end-0">
                        <router-link :to='{ name: "createPersona" }' class="btn btn-sm btn-success text-white">New
                            Persona
                        </router-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover border border-secondary">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Lastname</th>
                                        <th>Github</th>
                                        <th>WhatsApp</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="persona in personas" :key="persona.id">

                                        <td>{{ persona.id }}</td>
                                        <td>{{ persona.name }}</td>
                                        <td>{{ persona.lastname }}</td>
                                        <td>{{ getSocialsContent(persona, 'GitHub') }}</td>
                                        <td>{{ getSocialsContent(persona, 'WhatsApp') }}</td>
                                        <td>{{ getSocialsContent(persona, 'Email') }}</td>
                                        <td>{{ persona.city.name + ', ' + persona.city.country.name }}</td>
                                        <td>
                                            <a v-if="persona.status == 1" type="button"
                                                @click="statusPersona(persona.id)"
                                                class="btn btn-sm btn-dark text-success">
                                                <font-awesome-icon icon="fa-solid fa-toggle-on" />
                                            </a>
                                            <a v-if="persona.status == 0" type="button"
                                                @click="statusPersona(persona.id)"
                                                class="btn btn-sm btn-dark text-danger">
                                                <font-awesome-icon icon="fa-solid fa-toggle-off" />
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <router-link :to='{ name: "editPersona", params: { id: persona.id } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                                </router-link>
                                                <a type="button" @click="deletePersona(persona.id)"
                                                    class="btn btn-sm btn-danger">
                                                    <font-awesome-icon icon="fa-solid fa-trash" />
                                                </a>
                                                <router-link
                                                    :to='{ name: "projectPersona", params: { id: persona.id } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-diagram-project" />
                                                </router-link>
                                                <router-link :to='{ name: "socialPersona", params: { id: persona.id } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-rss" />
                                                </router-link>
                                                    <router-link :to='{ name: "skillPersona", params: { id: persona.id } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-wand-sparkles" />
                                                </router-link>
                                            </div>
                                        </td>
                                        <td>{{ persona.updated_at }}</td>
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
        this.showPersonas()
    },
    methods: {
        async showPersonas() {
            await this.axios.get('/api/persona')
                .then(response => {
                    this.personas = response.data
                })
                .catch(error => {
                    this.persona = []
                })
        },
        deletePersona(id) {
            if (confirm("Do you want to delete this entry?")) {
                this.axios.delete(`/api/persona/${id}`)
                    .then(response => {
                        this.showPersonas()
                    })
                    .catch(error => {
                        console(error)
                    })
            }
        },
        statusPersona(id) {
            this.axios.put(`/api/persona/status/${id}`)
                .then(response => {
                    this.showPersonas()
                })
                .catch(error => {
                    console(error)
                })
        },

        getSocialsContent(data, socialName) {
            let socialNameContent = data.socials.filter(({ name }) => name.includes(socialName) ?? false);
            if (socialNameContent.length > 0) {
                return socialNameContent[0].content;
            } else {
                return '';
            }
        }

    }
}
</script>

<style>
</style>
