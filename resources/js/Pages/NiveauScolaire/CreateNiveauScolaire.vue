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
              <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" @click="closeModal">Close</button>
              <button type="button" class="btn btn-success">Save </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>				



</template>


<script setup>

const closeModal = ()=>{

    $("#createNiveauModal").modal("hide")
}

</script>





