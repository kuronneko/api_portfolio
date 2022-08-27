<template>
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <router-link
                            :to='{ name: "createProjectDetail", params: { projectID: this.$route.params.projectID, personaID: this.$route.params.personaID } }'
                            class="btn btn-sm btn-success text-white">New Detail
                        </router-link>
                        <router-link
                            :to='{ name: "projectPersona", params: { personaID: this.$route.params.personaID } }'
                            class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover border border-secondary">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Description</th>
                                        <th>Options</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="detail in details" :key="detail.id">
                                        <td>{{ detail.id }}</td>
                                        <td>{{ detail.description }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <router-link
                                                    :to='{ name: "editProjectDetail", params: { detailID: detail.id, projectID: this.$route.params.projectID, personaID: this.$route.params.personaID } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                                </router-link>
                                                <a type="button" @click="deleteProjectDetail(detail.id)"
                                                    class="btn btn-sm btn-danger">
                                                    <font-awesome-icon icon="fa-solid fa-trash" />
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ detail.updated_at }}</td>
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
    name: "details",
    data() {
        return {
            details: [],
        }
    },
    mounted() {
        this.showDetails()
    },
    methods: {
        async showDetails() {
            await this.axios.get(`/api/project/details/${this.$route.params.projectID}`)
                .then(response => {
                    this.details = response.data;
                })
                .catch(error => {
                    this.details = []
                })
        },
        deleteProjectDetail(id) {
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                background: '#212529',
                color: '#fff',
                width: 400,
                position: 'center',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.axios.delete(`/api/detail/${id}`)
                        .then(response => {
                            this.showDetails()
                        })
                        .catch(error => {
                            console(error)
                        })
                    this.$swal({
                        position: 'center',
                        color: '#fff',
                        width: 400,
                        background: '#212529',
                        icon: 'success',
                        title: 'Project deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    }
                    )
                }
            })
        },
    }
}
</script>

<style>
</style>
