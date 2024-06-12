<script setup>
import { onMounted, ref, toRaw } from "vue";
import sourceUrl from "@/config";
import axios from "axios";
import Toolbar from "primevue/toolbar";
import { useRouter } from "vue-router";

const getData = () => {
  axios.get(sourceUrl() + "/book").then((response) => {
    data.value = response.data;
    data.value.forEach(element => {
      element.created_at = element.created_at.split(' ')[0];
    });
    console.log(data.value);
  });
};

const newData = () => {
  axios({
    method: 'post',
    url: sourceUrl() + '/book/new',
    data: toRaw(editData.value)
  }).then((response) => {
    console.log(response.data);
    visible.value = false;
    editData.value = {};
    location.reload();
  })
};


const editAxData = () => {
  axios({
    method: 'post',
    url: sourceUrl() + '/book/edit',
    data: toRaw(editData.value)
  }).then((response) => {
    console.log(response.data);
    visible.value = false;
    editData.value = {};
  });
}

const deleteAxData = (el) => {
  axios({
    method: 'post',
    url: sourceUrl() + '/book/delete',
    data: toRaw(el)
  }).then((response) => {
    console.log(response.data);
    location.reload();
  })
}

const newDataDialog = () => {
  editData.value = {};
  visible.value = true;
};

const editDialogData = (el) => {
  editData.value = el;
  visible.value = true;
  console.log(editData);
};

const saveDataDialog = () => {
  editData.value.created_at = typeof editData.value.created_at === 'object' ? toISO(editData.value.created_at.toLocaleDateString()) : editData.value.created_at;
  if(editData.value.id){
    editAxData();
    console.log(editData)
  } else {
    newData();
    console.log(editData.value)
  }
}

const cancelDataDialog = () => {
  editData.value = {};
  visible.value = false;
};

onMounted(() => {
  getData();
});

const data = ref();
const editData = ref();
const router = useRouter();
let userId = localStorage.getItem("user_id");
const visible = ref(false);

const openFile = (url) => {
  window.location.href = sourceUrl() + url;
};

const onUpload = (response) => {
    if( JSON.parse(response.xhr.response).type == 'file'){
      editData.value.image_book = JSON.parse(response.xhr.response).file_book;
      console.log(editData.value);
    } else {
      editData.value.file_book = JSON.parse(response.xhr.response).image_book;
      console.log(editData.value);
    }
};

const toISO = (el) => {
    return `${el.split('.')[2]}-${el.split('.')[1]}-${el.split('.')[0]}`;
};
</script>

<template>
  <div class="cards">
    <DataView :value="data" layout="grid">
      <template #header>
        <Toolbar>
          <template #end>
            <Button
              v-if="userId"
              style="margin-bottom: 0.8rem; width: 10rem"
              icon="pi pi-plus"
              label=" Добавить"
              @click="newDataDialog"
            />
          </template>
        </Toolbar>
      </template>
      <template #grid="slotProps">
        <div class="grid-container">
          <Card
            style="width: 25rem; overflow: hidden; margin-bottom: 2rem"
            v-for="item in slotProps.items"
          >
            <template #header>
              <div style="display: flex; height: 16rem">
                <img
                  style="width: 10rem; margin-inline: auto"
                  :alt="item.title"
                  :src="sourceUrl() + item.file_book"
                />
              </div>
            </template>
            <template #title>{{ item.title }}</template>
            <template #subtitle>{{ item.author }}, {{ item.genre }}</template>
            <!-- <template #content>
              <p class="m-0">
                {{ item.description }}
              </p>
            </template> -->
            <template #footer>
              <div
                style="
                  display: flex;
                  flex-direction: column;
                  width: 13rem;
                  margin-inline: auto;
                "
              >
                <Button
                  style="margin-bottom: 0.8rem"
                  :disabled="!item.download_allow"
                  label="Открыть"
                  severity="secondary"
                  outlined
                  @click="openFile(item.image_book)"
                />
                <Button
                  v-if="userId"
                  icon="pi pi-pencil"
                  style="margin-bottom: 0.8rem"
                  label="Редактировать"
                  class="w-full"
                  @click="editDialogData(item)"
                />
                <Button
                  v-if="userId"
                  icon="pi pi-trash"
                  style="margin-bottom: 0.8rem"
                  severity="danger"
                  label="Удалить"
                  class="w-full"
                  @click="deleteAxData(item)"
                />
              </div>
            </template>
          </Card>
          <!-- Добавьте больше карточек по мере необходимости -->
        </div>
      </template>
    </DataView>

    <div class="card flex justify-content-center">
      <Dialog
        v-model:visible="visible"
        modal
        header="Информация о книге"
        style="width: 25rem"
      >
        <div style="display: flex; flex-direction: column">
          <InputText
            placeholder="Автор"
            id="author"
            v-model="editData.author"
            class="flex-auto"
            autocomplete="off"
            style="margin-bottom: 1rem;"
          />
          <InputText
            placeholder="Название"
            id="title"
            class="flex-auto"
            v-model="editData.title"
            autocomplete="off"
            style="margin-bottom: 1rem;"
          />
          <InputText
            placeholder="Жанр"
            id="genre"
            v-model="editData.genre"
            class="flex-auto"
            autocomplete="off"
            style="margin-bottom: 1rem;"
          />
          <label for="image">Обложка книги</label>
          <FileUpload uploadIcon="pi" v-model="editData.file_book" chooseLabel="Выберите обложку для книги" id="image" mode="basic" name="image" :url="sourceUrl() + '/book/image_upload'" accept="image/*" :maxFileSize="1000000" @upload="onUpload" />

          <label style="margin-top: 1rem;" for="book">Файл с книгой</label>
          <FileUpload uploadIcon="pi" v-model="editData.image_book" chooseLabel="Выберите файл с книгой" id="book" mode="basic" name="book" :url="sourceUrl() + '/book/upload'"  @upload="onUpload" />

          <div style="display: flex; flex-direction: row; margin-top: 1rem;">
            <InputSwitch unstyled style="margin-right: 1rem;" v-model="editData.download_allow" />
            <label for="download_allow" class="ml-2"> Разрешить скачивание </label>
          </div>

          <Calendar v-model="editData.created_at" style="margin-top: 1rem;" placeholder="Дата прочтения" dateFormat="yy-mm-dd" />

          <div style="margin-top: 2rem;">
            <Button
              type="button"
              label="Отмена"
              severity="secondary"
              @click="cancelDataDialog"
              style="margin-right: 1rem;"
            ></Button>
            <Button
              type="button"
              label="Сохранить"
              @click="saveDataDialog"
            ></Button>
          </div>
        </div>
      </Dialog>
    </div>
  </div>
</template>

<style scoped>
.cards {
  margin: 2rem 2rem 2rem 2rem;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(25rem, 1fr));
  grid-gap: 20px;
  padding: 20px;
}
</style>
