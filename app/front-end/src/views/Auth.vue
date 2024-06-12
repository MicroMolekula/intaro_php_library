<template>
    <div class="block">
      <h2>Вход</h2>
      <div>{{ error }}</div>
      <InputText v-model="data.email" class="field" id="email" placeholder="Email" required />
      <Password
        class="field"
        :feedback="false"
        v-model="data.password"
        placeholder="Пароль"
      />
      <Button style="width: 10rem; margin-top: 3rem" label="Войти" @click="authU"/>
    </div>
  </template>
  
<script setup>
import Password from 'primevue/password';
import { ref, toRaw } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import sourceUrl from '@/config';

const authU = () => {
    axios({
        method: 'post',
        url: sourceUrl() + '/users/auth',
        data: toRaw(data.value)
    })
    .then((response) => {
        if(response.data.status == 'ok'){
            localStorage.setItem('user_id', response.data.id);
            router.push('/main');
            console.log(response.data);
        } else {
            error.value = response.data.message;
        }
    })
    
};

const data = ref({
    email: '',
    password: '',
});
const error = ref('');
const router = useRouter();
</script>
  
  <style scoped>
  .block {
    width: 25rem;
    height: 20rem;
    margin: auto;
    border: 1px solid #eaecf0;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 10px;
  }
  
  .field {
    margin-top: 1rem;
    width: 15.5rem;
    display: flex;
    align-items: center;
  }
  </style>
  