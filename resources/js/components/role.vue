<template>
    <form>
        <div class="modal-body">
            <label><span style="color:red">* </span>Required</label>
            <div class="form-group">
                <label>Role Name <span style="color:red">*</span></label>
                <input v-model="form.name" type="text" name="name" placeholder="Role Name"
                    class="form-control" :class="{'is-invalid': form.errors.has('name')}">
                <has-error :form="form" field="name"></has-error>
               
            </div>

            <b-form-group label="Assign Permissions">
                <b-form-checkbox
                    v-for="option in permissions"
                    v-model="form.permissions"
                    :key="option.name"
                    :value="option.name"
                    name="flavour-3a"
                >
                    {{ option.name }}
                </b-form-checkbox>
            </b-form-group>

        </div>
        <div class="modal-footer justify-content-between">
            <b-button type="submit" variant="primary" class="btn-lg btn-primary" v-if="!dis" disabled><b-spinner small type="grow"></b-spinner>Creating Role</b-button>
            <button type="submit"  v-if="dis" @click.prevent="createRole()" class="btn btn-lg btn-primary"><i class="fas fa-save"></i> Save Role</button>
        </div>
    </form>
</template>
window.toast = Toast;

<script>
   import { Form, HasError, AlertError } from 'vform' 
    export default {
        data() {
            
            return {
            selectAll: false,
              dis: true,
            action: '',
            searchWord: '',
            loading: false,
            load: true,
            roles: [],
            permissions: [],
            form: new Form({
                'name' : '',
                'permissions' : []
            })
          }
        },
        methods: {
            getPermissions() {
                axios.get("/getAllPermission")
                    .then((response) => {
                        this.permissions = response.data.permissions
                    }).catch(() => {
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    });
            },

            createRole(){
                this.dis = false;
                this.form.post("/postRole").then(()=>{
                    swal.fire({
                        icon: 'success',
                        title: 'Role Created',
                        text: 'Your Role has been created',
                    })
                    window.location = "/role";
                }).catch(()=>{
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                });
                this.dis=true;
            },


            editRole(){
            //this.form.reset();
            this.form.fill(role);
            this.form.permissions = user.userPermissions
           
            },

            updateRole(){
            this.action = 'Updating role ...'
            this.load = false;
            this.form.put("/role/update/" +this.form.id).then((response) => {
                this.load = true;
                this.$toastr.s("Role information updated succefully", "Updated");
                Fire.$emit("loadRole");
                $("#updateRole").modal("hide");
                this.form.reset();
            }).catch(() => {
                this.load = true;
                this.$toastr.e("Cannot update role information, try again", "Error");
            });
        },


        },

        created(){
          this.getPermissions();
        }
    }
</script>


