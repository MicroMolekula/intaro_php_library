<template>
    <div class="sidebar">
        <div class="appname">
            <i class="pi pi-book"  style="font-size: 1rem"></i>
            Библиотека
        </div>
        <div class="menu">
            <div class="h">Главная</div>
            <div class="links">
                <Button icon="pi pi-users" severity="secondary" label="Общие" text></Button>
                <Button icon="pi pi-user" severity="secondary" label="Мои" text></Button>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
.sidebar {
    border-right: 1px solid #EAECF0;
    height: 100%;
    width: 280px;
}

.appname {
    margin-top: 2rem;
    text-align: center;
    font-size: 24px;
    font-weight: 600;
    width: 100%;
    height: 4rem;
    border-bottom: 1px solid #EAECF0;
}

.menu {
    margin-top: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.links {
    display: flex;
    flex-direction: column;
}

button {
    width: 7rem;
    font-size: 16px;
    color: black;
}

.h {
    text-align: center;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 0.85rem;
    width: 10rem;
}
</style>