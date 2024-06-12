<template>
  <div class="block">
    <h2>Регистрация</h2>
    <InputText class="field" id="name" placeholder="Имя" required />
    <InputText class="field" id="surname" placeholder="Фамилия" required />
    <InputText class="field" id="patronymic" placeholder="Отчество" />
    <InputText class="field" id="email" placeholder="Email" required />
    <Password
      class="field"
      :feedback="false"
      
      placeholder="Пароль"
    />
    <Button style="width: 20rem; margin-top: 3rem" label="Зарегистрироваться" />
  </div>
</template>

<script setup></script>

<style scoped>
.block {
  width: 25rem;
  height: 30rem;
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
