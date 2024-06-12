<template>
    <main>
        <div class="main">
            <AppTopBar></AppTopBar>
            <div class="content">
                <RouterView></RouterView>
            </div>
        </div>
    </main>
</template>

<script setup>
import AppSideBar from '@/views/Layout/AppSideBar.vue'
import AppTopBar from '@/views/Layout/AppTopBar.vue'
import { RouterView } from 'vue-router';
</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
}

main {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

.main {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
}
</style>