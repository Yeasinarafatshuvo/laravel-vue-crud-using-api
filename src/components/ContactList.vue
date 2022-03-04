<template>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Action</th>
                </tr>

            </thead>
            <tbody v-for="contact in contacts" :key="contact.id">
                <tr class="table-secondary">
                    <td scope="row">{{ contact.id }}</td>
                    <td scope="row">{{ contact.name }}</td>
                    <td scope="row">{{ contact.email }}</td>
                    <td scope="row">{{ contact.designation }}</td>
                    <td scope="row">{{ contact.contact_number }}</td>
                    <td scope="row"><router-link :to="{name: 'EditContact', params: {id:contact.id}}" class="btn btn-primary">Edit</router-link></td>
                    <td scope="row"><button class="btn btn-danger btn-sm" @click="deleteContact(contact.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:'ContactList',
    data(){
        return {
            contacts:[]
        }
    },
    created(){
        this.getContacts()
    },
    methods:{
        async getContacts(){
            let url = 'http://127.0.0.1:8000/api/contacts';
            await axios.get(url).then(response => {
                this.contacts = response.data.contacts;
                console.log(this.contacts);
            }).catch(error => {
                console.log(error);
            });
        },

        async deleteContact(id){
            let url = `http://127.0.0.1:8000/api/delete_contact/${id}`;
            await axios.delete(url).then(response => {
                alert(response.data.message);
                this.getContacts();
            }).catch(error => {
                console.log(error);
            });
        }
    },
    mounted(){
        console.log('Contact List Component mounted');
    }
}
</script>

<style>

</style>