<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger mt-4" v-if="errors.length">
                    <ul class="mb-0">
                        <li v-for="(error, index) in errors" :key="index">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <form @submit.prevent="updateContact" novalidate>
                    <fieldset>
                        <div class="form-group">
                            <label for="form-label mt-4">Enter Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" v-model="contact.name">
                        </div>
                         <div class="form-group">
                            <label for="form-label mt-4">Enter Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" v-model="contact.email">
                        </div>
                         <div class="form-group">
                            <label for="form-label mt-4">Enter Designation</label>
                            <input type="text" class="form-control" placeholder="Enter Designation" v-model="contact.designation">
                        </div>
                         <div class="form-group">
                            <label for="form-label mt-4">Enter Contact Number</label>
                            <input type="text" class="form-control" placeholder="Enter Contact Number" v-model="contact.contact_number">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:'EditContact',

    data(){
        return {
            contact:{},
            name:'',
            email:'',
            designation:'',
            contact_number:'',
            errors:[]
        }
    },
    created(){
        this.getContactById();
    },
    methods:{
        async getContactById(){
            let url = `http://127.0.0.1:8000/api/get_contact/${this.$route.params.id}`;
            await axios.get(url).then(response => {
                console.log(response);
                this.contact = response.data;
            });
        },

    async updateContact(){  
            this.errors = [];
            if(!this.contact.name){
                this.errors.push("Name is required");
                
            }

            if(!this.contact.email){
                this.errors.push("Email is required");
            }

            if(!this.contact.designation){
                this.errors.push("Designation is required");
            }

            if(!this.contact.contact_number){
                this.errors.push("Contact Number is required");
            }

            if(!this.errors.length){
                let formData =  new FormData();
                formData.append('name', this.contact.name);
                formData.append('email', this.contact.email);
                formData.append('designation', this.contact.designation);
                formData.append('contact_number', this.contact.contact_number);
                let url = `http://127.0.0.1:8000/api/update_contact/${this.$route.params.id}`;
                await axios.post(url, formData).then((response) => {
                    console.log(response);
                    if(response.status == 200){
                       
                        alert(response.data.message);
                    } else{
                        console.log('error');
                    }
                }).catch(error => {
                    this.errors.push(error.response);
                });
            }
        }
    },
    mounted:function(){
        console.log("Edit Component form component loading...");
    }
    
}
</script>

<style>

</style>