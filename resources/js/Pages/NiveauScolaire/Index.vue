<template>

    <MainLyaout>
 <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste Niveaux</h1>
                        </div>
                       
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                   <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
              <Pagination

              :links="props.niveauScolaires.links"
              :prev="props.niveauScolaires.prev_page_url"
              :next="props.niveauScolaires.next_page_url"

              />

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Task</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                 
                 
                    <tr v-for="niveauScolaire in props.niveauScolaires.data">
                         <td>{{niveauScolaire.nom}}</td>
                      <td>
                        <div class="d-flex"> 
                             <button class="btn btn-info btn-sm me-3"><i class="fa fa-pencil-alt"></i></button>
                          <button class="btn btn-danger btn-sm me-3"><i class="fa fa-trash-alt"></i></button></div>
                      
                    </td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>

                </div>
            </div>

        </MainLyaout> 

</template>

<script setup>
import Pagination from '../../Shared/Pagination.vue';

  const props = defineProps({
    niveauScolaires: Object
  })
</script>




