<template>
  <div class="appbar">
    <ToolBar style="border-radius: 0; height: 100%">
      <template #start>
        <div class="appname">
          <i class="pi pi-book" style="font-size: 1rem"></i>
          Библиотека
        </div>
      </template>
      <template #end>
        <div v-if="!userId" style="display: flex; flex-direction: row; align-items: center;">
            
            <RouterLink to="/auth" style="margin-right: 2rem;"><Button
            label="Войти"
            ></Button></RouterLink>
        </div>
        <div v-if="userId" style="display: flex; flex-direction: row; align-items: center;">
            <Button
            label="Выйти"
            @click="logout"
            severity="danger"
            style="margin-right: 2rem;"
            ></Button>
        </div>
      </template>
    </ToolBar>
  </div>
</template>

<script setup>
import { RouterLink, useRouter } from 'vue-router';
import { ref } from 'vue';


let userId = ref(localStorage.getItem('user_id'));
const router = useRouter();

const logout = () => {
    localStorage.setItem('user_id', '');
    location.reload()
};
</script>

<style scoped>
.appname {
    margin-left: 2rem;
    font-size: 24px;
    font-weight: 600;
}

.appbar {
  width: 100%;
  height: 96px;
}
</style>
