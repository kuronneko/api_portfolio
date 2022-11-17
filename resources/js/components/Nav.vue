<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <router-link :to='{ name: "index" }' class="navbar-brand"><img src="/img/logo.png" style="height:30px; margin-right:10px;" alt="">PortfolioGestor9000</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->

                    <li v-if="!token" class="nav-item">
                        <router-link :to='{ name: "login" }' class="nav-link">Login</router-link>
                    </li>

                    <li v-if="!token" class="nav-item">
                        <router-link :to='{ name: "register" }' class="nav-link">Register</router-link>
                    </li>

                    <li v-if="token" class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Profile
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a @click="logout()" class="dropdown-item">Logout</a>
                            </li>
                        </div>
                    </li>

            </ul>
        </div>
        </div>
    </nav>
</template>
<script>
export default {
    data() {
        return {
            token: localStorage.getItem('token'),
        }
    },
    methods: {
        logout() {
            localStorage.removeItem('token');
            this.token = localStorage.getItem('token');
            this.$router.push({
                name: "index"
            })
        },
    }
}

</script>
