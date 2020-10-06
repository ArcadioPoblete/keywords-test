<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form id="form" @submit.prevent="postName">
                            <div class="form-group">
                                <input  
                                    class="form-control-lg" 
                                    type="text" 
                                    name="domain" 
                                    id="domain" 
                                    aria-describedby="domainHelp" 
                                    placeholder="Enter a Domain Name"
                                    v-model="domain"
                                >
                                <small id="domainHelp" class="form-text text-muted">Enter a domain URL to get results based on the database records.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <div  class="results mt-2" v-for="(item, index) in websites" :key="index">
                            {{ item }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            domain: '',
            websites: [],
        }),
        mounted() {

        },
        methods:{
            postName(){
                
                //Enviar el nombre de dominio
                axios.post('api/websites/search', { domain: this.domain })
                    .then((response) =>{
                        
                        //Cargar los datos a un arreglo
                        this.websites = response.data

                }).catch((error) =>{

                    //Si hay errores al enviar datos
                    console.log(error)
                })
            }
        }
    }
</script>

