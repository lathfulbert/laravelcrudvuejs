<template>

	
        <div class="modal fade"

        id="editNiveauModal"

        data-backdrop = "static"

        data-keyboard = "false"

        aria-hidden="true"
        >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier Niveau "{{ editNiveauScolaire.nom }}"</h4>
              <button type="button" @click="closeModal" class="close"  aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="soumettre" id="editForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nom">nom</label>
                    <input type="text" required v-model="editNiveauScolaire.nom" class="form-control" :class="{'is-invalid' : editNiveauScolaire.nomError != ''}" >
                  </div>

                  <span v-if="editNiveauScolaire.nomError!=null"> {{ editNiveauScolaire.nomError }}</span>

                  
                </div>
                <!-- /.card-body -->

               
              </form>
            </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" @click="closeModal">Close</button>
              <button type="submit" form="editForm" class="btn btn-success">Save </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>				



</template>


<script setup>


import axios from 'axios';

import { router } from '@inertiajs/vue3';

import { useSwalSuccess, useSwalError } from '../../Composables/alert';

import { reactive, watch } from 'vue';

const emit = defineEmits(["modalClosed"])



const props = defineProps({

    niveauScolaireId: {
        type: Number,
        required :true
    },

    show: {
      type: Boolean,
      default: false
}
})

const editNiveauScolaire = reactive({
    id: "",
    nom : "",
    nomError: ""
})


const soumettre = ()=>{

  router.put(
    route("niveauscolaire.update",{niveauScolaire: props.niveauScolaireId} ),

  {nom : editNiveauScolaire.nom },

  {
      onSuccess: (response)=>{

        useSwalSuccess('Niveau Scolaire mis à jour avec succès')

      },

      onError: (error)=>{

       editNiveauScolaire.nomError = error.nom
       
        useSwalError('Une erreur a été rencontrée')

      }

  }

  
  )

}



const openModal = ()=>{

    getNiveauScolaireById()

    $("#editNiveauModal").modal("show")

}


const closeModal = ()=>{

    $("#editNiveauModal").modal("hide")

    emit("modalClosed")

}





const getNiveauScolaireById = ()=>{
    
  axios.get(route("niveauscolaire.edit", { niveauScolaire: props.niveauScolaireId}))
        .then((response)=>{

            editNiveauScolaire.id = response.data.niveauScolaire.id

            editNiveauScolaire.nom = response.data.niveauScolaire.nom

          //  console.log("reponse:", response.data)

        }).catch((error)=>{
            console.log(error)
         

        })
}


watch(

  () => props.show,

  (newVal, oldVal) =>{

      if(newVal){

        openModal()

      }else{

        closeModal()

      }
  }


)

</script>





