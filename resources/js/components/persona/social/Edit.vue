<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Edit Social</h4>
                        <router-link :to='{ name: "socialPersona", params: { id: this.$route.params.id } }' class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="update">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                     <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" v-model="social.name">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <input type="text" class="form-control" v-model="social.content">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-success btn-sm text-white">Save</button>
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
    name: "edit-social",
    data() {
        return {
            social: {
                id: this.$route.params.id, //save social id at start
                name: "",
                content: "",
            },
        }
    },
    mounted() {
        this.showSocial()
    },
    methods: {
        async showSocial() {
            await this.axios.get(`/api/social/${this.$route.params.id}`)
                .then(response => {
                    const { name, content, persona_id} = response.data
                    this.social.name = name,
                    this.social.content = content
                    this.$route.params.id = persona_id //set route id with persona id
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async update() {
            await this.axios.put(`/api/social/${this.social.id}`, this.social)
                .then(response => {
                    this.$router.push({
                        name: "socialPersona" //showSocialPersona
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
