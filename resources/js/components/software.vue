<template>

<div class="container-fluid">
  <div class="row">
    <div class="col-7">
      <div class="container-fluid">
    <div class="row justify-content-center mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-blue">Software List</h3>
            <div class="card-tools">

                  <!-- SEARCH FORM -->
    <form class="form-inline ml-3" >
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


            </div>
          </div>

          <div class="card-body">
            <div class="card-body table-responsive p-0">
              {{softwares.data}}
              <table class="table table-hover text-nowrap">
                <thead class ="thead-dark">
                  <tr>
                    <th>ID</th>   
                    <th>Software</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="software in softwares" :key="software.sof_id">
                    <td>{{software.sof_id}}</td>
                    <td>
                        <input type="text" v-model="editForm.firstName" class="form-control" v-if="edit">
                        <span v-else>{{software.sof_name | capitalize}}</span>
                    </td>
                    <td>
                        <input type="text" v-model="editForm.middleName" class="form-control" v-if="edit">
                        <span v-else>{{software.sof_description  | capitalize}}</span>
                    </td>
                    <td>
                    
                      <button type="button" v-if="software.sof_status === 1"><i class="fas fa-check-square"></i></button>
                      <button type="button" v-if="software.sof_status === 0"><i class="fas fa-times"></i></button>
                    </td>
                  
                    <td>
                      <button type="button" v-on:click="editSoftware(software)" ><i class="fa fa-edit text-blue"> </i></button>
                     <!--  <button type="button" v-on:click="cancelEdit" v-if="edit"><i class="fa fa-edit text-blue"> Cancel</i></button> -->
                     <!--  <button type="button" v-on:click="updateSoftware(software,editForm)" class="btn btn-primary" v-if="edit"><i class="fa fa-edit"> Update</i></button> -->

                      <button type="button" v-on:click="deleteSoftware(software)" v-if="!edit"><i class="fa fa-trash text-red"></i></button>

                      <button type="button" v-on:click="statusSoftware(software)" v-if="software.sof_status === 0">Active</i></button>
                      <button type="button" v-on:click="statusSoftware(software)" v-if="software.sof_status === 1">In Active</i></button>
                    </td>
                    </tr>


                    
                    
                  </tbody>
                </table>
              </div>
      </div>
    </div>
  </div>
</div>
</div>

    </div>

    <div class="col-5">
       <div class="container-fluid">
    <div class="row justify-content-center mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-blue">Add/Edit Software</h3>
            <div class="card-tools">

            </div>
          </div>

          <div class="card-body">
            <div class="form-group row" style="display:none;">
                            <label for="id" class="col-md-4 col-form-label text-md-right">Id :</label>

                            <div class="col-8">
                                <input id="id" type="number" name="id" v-model="editForm.id" autofocus>

                            </div>
                        </div>
            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Software :</label>

                            <div class="col-8">
                                <input id="name" type="text" v-model="editForm.name" name="name" autofocus>

                            </div>
                        </div>

             <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description :</label>

                            <div class="col-8">
                               <textarea id="description" v-model="editForm.description" rows="5"></textarea>

                            </div>
                        </div>

             
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mx-2" v-on:click="addSoftware(software)">
                                    Save
                                </button>

                                 <button type="submit" class="btn btn-primary" v-on:click="reset">
                                    Cancel
                                </button>
                            </div>
                      

      </div>
    </div>
  </div>
</div>
</div>
    </div>

  </div>
</div>

  
</template>

<script>
export default {
  data()
  {
            // variable decleration insode return ok
            return{
              softwares:{},

                  // Create a new form instance
                  form: new Form({
                    sof_id:'',
                    sof_name: '',
                    sof_description: '',
                    sof_status:'',
                  }),
                  tick:true,
                  edit:false,
                  editForm:{ 
                              id:'',
                              name:'',
                              description:'',
                          }
                }},
                mounted(){
                  this.getSoftwares();
                  
                },
                filters: {
                        capitalize: function (value) {
                          if (!value) return ''
                          value = value.toString()
                          return value.charAt(0).toUpperCase() + value.slice(1)
                        },
                      },

                methods:{
                  reset(){
                    this.editForm.id='';
                    this.editForm.name='';
                    this.editForm.description='';
                  },
                  getSoftwares(){
                    this.form.get('/getsoftwares')
                    .then(
                      ({data})=>(this.softwares=data)
                      )
                  },

                  statusSoftware(software)
                  {
                    
                      this.form.patch("/status-software/"+software.sof_id).then(response => {

                        this.getSoftwares();

                      });
                    
                  },

                  deleteSoftware(software)
                  {
                    if(confirm("Do you really want to delete?"))
                    {
                      this.form.delete("/deletesoftware/"+software.sof_id).then(response => {

                        this.getSoftwares();

                      });
                    }
                  },

                  editSoftware(software){
                    // this.edit=true;
                    // console.log(player.p_u_id);
                    if(software.sof_id){
                        this.editForm.name=software.sof_name;
                        this.editForm.description=software.sof_description;
                      }
                  },

                  cancelEdit(){
                    this.edit=false;
                    this.editForm.name='';
                    this.editForm.description='';
                  },

                  updateSoftware(oldsoftware, newsoftware){

                    if(newsoftware.name == ""){
                      newsoftware.name = '-'
                    }
                    if(newsoftware.description == ""){
                      newsoftware.description = '-'
                    }
                    this.form.patch("/updatesoftware/"+oldsoftware.sof_id+"/"+newsoftware.name+"/"+newsoftware.description).then(response=>{
                      this.cancelEdit();
                       this.getSoftwares();
                    })
                  },

              },

              }
              </script>

