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
              <h4 class="modal-title">Modifier Niveau</h4>
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
//import { emit } from 'process';

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



const openModal = ()=>{

    $("#editNiveauModal").modal("show")

}


const closeModal = ()=>{

    $("#editNiveauModal").modal("hide")
    emit("modalClosed")

}





const getNiveauScolaireById = ()=>{
    axios.get(route("niveauscolaire.edit", { niveauScolaire: props.niveauScolaireId}))
        .then((response)=>{

            console.log("reponse:", response.data)

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





