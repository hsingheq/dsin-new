<template>
    <div>
        <button @click="logout()">logout</button>
    </div>
</template>

<script >
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

import { UserStore } from '@/store/UserStore';




export default {


    setup() {
        function logout() {
            const router = useRouter();
            const store = UserStore();
            store.removeEmail('email');
            store.removeEmail('name');
            store.removeItem('access_token');
            store.removeItem('token');
            // router.push({ name: '/' });
        }
        return {
            logout
        }
    }

}
</script>

<style>

</style>