<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Create new Project</h4>
                        <router-link :to='{ name: "projectPersona", params: { personaID: this.$route.params.personaID } }'
                            class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="create">
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
                                    <button type="submit"
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
export default {
    name: "create-project",
    data() {
        return {
            project: {
                name: "",
                title: "",
                description: "",
                status: 1,
                persona_id: this.$route.params.personaID
            },
        }
    },
    mounted() {

    },
    methods: {
        async create() {
            await this.axios.post('/api/project', this.project)
                .then(response => {
                    this.$router.push({ name: "projectPersona" }) //showProjectPersona
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


