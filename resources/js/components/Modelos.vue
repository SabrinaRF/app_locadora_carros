<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modelos</div>

                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            props: ['csrf_token'],
            data(){
                return {
                    input_id:'',
                    input_nome:''
                }
            },
            method: {
                pesquisar(e){
                    let url = 'http://localhost:8000/api/marcas'
                    let configuracao = {
                        method: 'post',
                        body: new URLSearchParams( {
                            'id' : this.input_id,
                            'nome' : this.input_nome
                        })
                    }
                }
            }
        }


</script>
