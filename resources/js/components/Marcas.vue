<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Marcas</div>

                    <div class="card-body">
                        Listagem das marcas.
                        {{ id }} -{{ nome }}

                        <form class="row g-3 needs-validation" novalidate method="POST" @submit.prevent="pesquisar($event)">
                            <input type="hidden" name="_token" :value="csrf_token" ><!--cookie-->

                            <div class="col-md-6">
                                <label for="input_id" class="form-label">ID da Marca</label>
                                <input type="text" class="form-control" id="input_id" value="Pesquisa pelo ID">
                                
                            </div>
                            <div class="col-md-6">
                                <label for="input_nome" class="form-label">Nome da Marca</label>
                                <input type="text" class="form-control" id="input_nome" value="BMW" >
                                
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Pesquisar</button>
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
