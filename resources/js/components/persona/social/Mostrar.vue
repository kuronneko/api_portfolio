<template>
   <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark text-white border border-secondary">
                     <div class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <router-link :to='{ name: "" }' class="btn btn-sm btn-success text-white">New Social
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
                                        <th>Content</th>
                                        <th>Options</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="social in socials" :key="social.id">

                                        <td>{{ social.id }}</td>
                                        <td>{{ social.name }}</td>
                                        <td>{{ social.content }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a type="button" @click="deleteSocial(social.id)"
                                                    class="btn btn-sm btn-danger">D</a>
                                            </div>
                                        </td>
                                        <td>{{ social.updated_at }}</td>
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
    name: "socials",
    data() {
        return {
            socials: []
        }
    },
    mounted() {
        this.showSocials()
    },
    methods: {
        async showSocials() {
            await this.axios.get(`/api/socials/${this.$route.params.id}`)
                .then(response => {
                    this.socials = response.data
                })
                .catch(error => {
                    this.socials = []
                })
        },
        deleteSocial(id) {
            if (confirm("Do you want to delete this entry?")) {
                this.axios.delete(`/api/social/${id}`)
                    .then(response => {
                        this.showSocials()
                    })
                    .catch(error => {
                        console(error)
                    })
            }
        },
    }
}
</script>

<style>
</style>
