<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-secondary">
                    <div
                        class="card-header d-flex justify-content-between align-items-center border border-secondary border-top-0 border-start-0 border-end-0">
                        <h4>Edit Skill</h4>
                        <router-link :to='{ name: "skillPersona", params: { personaID: this.$route.params.personaID } }' class="btn btn-success btn-sm text-white">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="update">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" v-model="skill.name">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label><br>
                                        <select v-model="skill.level">
                                            <option v-for="i in 100" :value="i" :key="i">{{ i }}
                                            </option>
                                        </select>
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
    name: "edit-skill",
    data() {
        return {
            skill: {
                name: "",
                level: "",
            },
        }
    },
    mounted() {
        this.showSkill()
    },
    methods: {
        async showSkill() {
            await this.axios.get(`/api/skill/${this.$route.params.skillID}`)
                .then(response => {
                    const { name, level, persona_id} = response.data
                    this.skill.name = name,
                    this.skill.level = level
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async update() {
            await this.axios.put(`/api/skill/${this.$route.params.skillID}`, this.skill)
                .then(response => {
                    this.$router.push({
                        name: "skillPersona" //showSkillPersona
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
