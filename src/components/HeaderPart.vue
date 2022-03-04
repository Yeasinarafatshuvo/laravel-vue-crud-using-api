<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                    <router-link class="nav-lilnk-active" to="/">Home</router-link>
                    </li>
                    <li class="nav-item active">
                        <router-link class="nav-link-active" to="/add_contacts">Add Contact</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name:'HeaderPart'
}
</script>

<style>

</style>