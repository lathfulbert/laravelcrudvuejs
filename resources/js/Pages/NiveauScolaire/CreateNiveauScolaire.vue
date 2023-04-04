<template>

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createNiveauModal">
        <i class="fa fa-plus"></i>          Create
                </button>



				
				
        <div class="modal fade"

        id="createNiveauModal"

        data-backdrop = "static"

        data-keyboard = "false"

        style="display: none;"
        aria-hidden="true"
        >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ajouter Niveau</h4>
              <button type="button" @click="closeModal" class="close"  aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="soumettre" id="createForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nom">nom</label>
                    <input type="text" required v-model="nomNiveau" class="form-control" :class="{'is-invalid' : nomError != ''}" id="nom" placeholder="Entrer un titre">
                  </div>

                  <span v-if="nomError!=null"> {{ nomError }}</span>

                  
                </div>
                <!-- /.card-body -->

               
              </form>
            </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" @click="closeModal">Close</button>
              <button type="submit" form="createForm" class="btn btn-success">Save </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>				



</template>


<script setup>
import { onMounted, ref ,reactive } from 'vue';

import { router } from '@inertiajs/vue3';
//import { useSwalSuccess, useSwalError } from '../../Composables/alert';
import { useSwalSuccess, useSwalError } from '@/Composables/alert';


const nomNiveau = ref("");

const nomError = ref("")


let createNiveauModal =""

onMounted(() =>{

    createNiveauModal = $("#createNiveauModal")
}

)

const closeModal = ()=>{

    createNiveauModal.modal("hide")
    nomNiveau.value= ""
    nomError.value =""
}


const soumettre = ()=>{

   const nom = nomNiveau.value

   const url = route("niveauscolaire.store")

   router.post(
    url, 
   {nom},
   {
    onSuccess: (page) =>{
        closeModal()

        useSwalSuccess('Ajouté avec succès')


    },

   
    onError: (errors) =>{
       // closeModal()

       if(errors.nom != null){
        nomError.value =errors.nom
       }
        

        useSwalError('Une erreur c\'est produite')
    }
   }
   
   )


}

</script>





