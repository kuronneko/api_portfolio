<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Edit Project</h4>
                        <router-link :to='{ name: "projectPersona", params: { id: this.$route.params.id } }'
                            class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="update">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" v-model="project.name">
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" v-model="project.title">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" v-model="project.description">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-success btn-sm col-12 text-white">Save</button>
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
    name: "edit-project",
    data() {
        return {
            project: {
                id: this.$route.params.id, //save project id at start
                name: "",
                title: "",
                description: "",
            },
        }
    },
    mounted() {
        this.showProject()
    },
    methods: {
        async showProject() {
            await this.axios.get(`/api/project/${this.$route.params.id}`)
                .then(response => {
                    const { name, title, description, persona_id } = response.data
                    this.project.name = name,
                        this.project.title = title
                    this.project.description = description
                    this.$route.params.id = persona_id //set route id with persona id
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async update() {
            await this.axios.put(`/api/project/${this.project.id}`, this.project)
                .then(response => {
                    this.$router.push({
                        name: "projectPersona" //showProjectPersona
                    })
                })
                .catch(error => {
                    console.log(error)
                })
        },
    }
}
</script>

<style>
</style>
