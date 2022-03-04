import ContactList from '../components/ContactList' ;
import AddContact from '../components/AddContact.vue' ;
import EditContact from '../components/EditContact.vue' ;
import {createWebHistory, createRouter} from 'vue-router'


const routes = [
   {
    name: 'ContactList',
    path: '/',
    component: ContactList
   },
   {
    name: 'AddContact',
    path: '/add_contacts',
    component: AddContact
   },
   {
    name: 'EditContact',
    path: '/contact/edit/:id?',
    component: EditContact
   },
  


];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;