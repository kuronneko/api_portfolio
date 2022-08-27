<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Edit Detail</h4>
                        <router-link :to='{ name: "detailProject", params: { projectID: this.$route.params.projectID, personaID: this.$route.params.personaID } }'
                            class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="update">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" v-model="detail.description">
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
    name: "edit-detail",
    data() {
        return {
            detail: {
                description: "",
            },
        }
    },
    mounted() {
        this.showDetail()
    },
    methods: {
        async showDetail() {
            await this.axios.get(`/api/detail/${this.$route.params.detailID}`)
                .then(response => {
                    const { description } = response.data
                    this.detail.description = description
                    //this.$route.params.id = project_id //set route id with persona id
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async update() {
            await this.axios.put(`/api/detail/${this.$route.params.detailID}`, this.detail)
                .then(response => {
                    this.$router.push({
                        name: "detailProject" //showDetailProject
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
