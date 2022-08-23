<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark text-white">
                     <div class="card-header d-flex justify-content-between align-items-center">
                        <router-link :to='{ name: "" }' class="btn btn-sm btn-success text-white">New Skill
                        </router-link>
                        <router-link to="/home" class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Options</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="skill in skills" :key="skill.id">

                                        <td>{{ skill.id }}</td>
                                        <td>{{ skill.name }}</td>
                                        <td>{{ skill.level }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a type="button" @click="deleteSkill(skill.id)"
                                                    class="btn btn-sm btn-danger">D</a>
                                            </div>
                                        </td>
                                        <td>{{ skill.updated_at }}</td>
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
    name: "skills",
    data() {
        return {
            skills: []
        }
    },
    mounted() {
        this.showSkills()
    },
    methods: {
        async showSkills() {
            await this.axios.get(`/api/skills/${this.$route.params.id}`)
                .then(response => {
                    this.skills = response.data
                })
                .catch(error => {
                    this.skills = []
                })
        },
        deleteSkill(id) {
            if (confirm("Do you want to delete this entry?")) {
                this.axios.delete(`/api/skill/${id}`)
                    .then(response => {
                        this.showSkills()
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
