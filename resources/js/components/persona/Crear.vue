<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h4>Crear Blog</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="crear">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Titulo</label>
                                        <input type="text" class="form-control" v-model="blog.titulo">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="floatingTextarea2">Contenido</label>
                                    <div class="form-floating">
                                        <textarea cols="30" rows="10" class="form-control" id="floatingTextarea2" v-model="blog.contenido"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-info text-white">Guardar</button>
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
    name:"crear-blog",
    data(){
        return{
            blog:{
                titulo:"",
                contenido:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/blog', this.blog)
            .then(response=>{
                this.$router.push({name:"mostrarBlogs"})
            })
            .catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

<style>
</style>


