<template>
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <router-link :to='{ name: "createPersonaProject", params: { personaID: this.$route.params.personaID } }'
                            class="btn btn-sm btn-success text-white">New Project
                        </router-link>
                        <router-link to="/home" class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover border border-secondary">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="project in projects" :key="project.id">
                                        <td>{{ project.id }}</td>
                                        <td>{{ project.name }}</td>
                                        <td>{{ project.title }}</td>
                                        <td>{{ project.description }}</td>
                                        <td>
                                            <a v-if="project.status == 1" type="button"
                                                @click="statusProject(project.id)"
                                                class="btn btn-sm btn-dark text-success">
                                                <font-awesome-icon icon="fa-solid fa-toggle-on" />
                                            </a>
                                            <a v-if="project.status == 0" type="button"
                                                @click="statusProject(project.id)"
                                                class="btn btn-sm btn-dark text-danger">
                                                <font-awesome-icon icon="fa-solid fa-toggle-off" />
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <router-link
                                                    :to='{ name: "editPersonaProject", params: { projectID: project.id, personaID: this.$route.params.personaID } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                                </router-link>
                                                <a type="button" @click="deletePersonaProject(project.id)"
                                                    class="btn btn-sm btn-danger">
                                                    <font-awesome-icon icon="fa-solid fa-trash" />
                                                </a>
                                                <router-link :to='{ name: "detailProject", params: { projectID: project.id, personaID: this.$route.params.personaID } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-asterisk" />
                                                </router-link>
                                            </div>
                                        </td>
                                        <td>{{ project.updated_at }}</td>
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
    name: "projects",
    data() {
        return {
            projects: []
        }
    },
    mounted() {
        this.showProjects()
    },
    methods: {
        async showProjects() {
            await this.axios.get(`/api/projects/${this.$route.params.personaID}`)
                .then(response => {
                    this.projects = response.data
                })
                .catch(error => {
                    this.project = []
                })
        },
        deletePersonaProject(id) {
            if (confirm("Do you want to delete this entry?")) {
                this.axios.delete(`/api/project/${id}`)
                    .then(response => {
                        this.showProjects()
                    })
                    .catch(error => {
                        console(error)
                    })
            }
        },
        statusProject(id) {
            this.axios.put(`/api/project/status/${id}`)
                .then(response => {
                    this.showProjects()
                })
                .catch(error => {
                    console(error)
                })
        },
    }
}
</script>

<style>
</style>
