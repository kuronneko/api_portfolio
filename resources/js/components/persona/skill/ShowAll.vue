<template>
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <router-link
                            :to='{ name: "createPersonaSkill", params: { personaID: this.$route.params.personaID } }'
                            class="btn btn-sm btn-success text-white">New Skill
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
                                        <th>Level</th>
                                        <th>Type</th>
                                        <th>Options</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="skill in skills" :key="skill.id">
                                        <td>{{ skill.id }}</td>
                                        <td>{{ skill.name }}</td>
                                        <td>{{ skill.level }}</td>
                                        <td>{{ skill.type.name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <router-link
                                                    :to='{ name: "editPersonaSkill", params: { skillID: skill.id, personaID: this.$route.params.personaID } }'
                                                    class="btn btn-sm btn-success text-white">
                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" />
                                                </router-link>
                                                <a type="button" @click="deletePersonaSkill(skill.id)"
                                                    class="btn btn-sm btn-danger">
                                                    <font-awesome-icon icon="fa-solid fa-trash" />
                                                </a>
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
            await this.axios.get(`/api/skills/${this.$route.params.personaID}`)
                .then(response => {
                    this.skills = response.data
                })
                .catch(error => {
                    this.skills = []
                })
        },
        deletePersonaSkill(id) {
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
                    this.axios.delete(`/api/skill/${id}`)
                        .then(response => {
                            this.showSkills()
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
                        title: 'Skill deleted successfully',
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
