<template>
  <div class="container">
    <form>
      <div class="form-row">
        <div class="col form-group">
          <label for="first_name">نام</label>
          <input v-model="form.first_name" id="first_name" type="text" class="form-control" />
        </div>
        <div class="col form-group">
          <label for="last_name">نام‌خانوادگی</label>
          <input v-model="form.last_name" id="last_name" type="text" class="form-control" />
        </div>
      </div>
      <div class="form-row">
        <div class="col form-group">
          <label for="mobile">موبایل</label>
          <input
            v-model="form.mobile"
            id="mobile"
            type="text"
            class="form-control"
            dir="ltr"
            placeholder="09*********"
          />
        </div>
        <div class="col form-group">
          <label for="password">کلمه‌عبور</label>
          <input v-model="form.password" id="password" type="text" class="form-control" dir="ltr" />
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <div class="form-check form-check-inline">
            <input
              v-model="form.is_active"
              value="true"
              id="is_active"
              type="checkbox"
              class="form-check-input"
            />
            <label for="is_active" class="form-check-label">فعال</label>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <div class="form-check form-check-inline">
            <input
              v-model="form.roles"
              value="1"
              id="roles-1"
              type="checkbox"
              class="form-check-input"
            />
            <label for="roles-1" class="form-check-label">توزیع‌کننده</label>
          </div>
          <div class="form-check form-check-inline">
            <input
              v-model="form.roles"
              value="2"
              id="roles-2"
              type="checkbox"
              class="form-check-input"
            />
            <label for="roles-2" class="form-check-label">اپراتور</label>
          </div>
          <div class="form-check form-check-inline">
            <input
              v-model="form.roles"
              value="3"
              id="roles-3"
              type="checkbox"
              class="form-check-input"
            />
            <label for="roles-3" class="form-check-label">مدیر</label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="description">توضیحات</label>
        <input v-model="form.description" class="form-control" type="text" id="description" />
      </div>
      <button @click="onSubmit" type="button" class="btn btn-primary">ایجاد</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ["userRoute", "userId"],
  data() {
    return {
      form: { roles: [] }
    };
  },
  mounted() {
    this.userId |= 0;
    if (this.userId < 1) return;

    this.form = await axios.get(`${this.userRoute}/${this.userId}`);
  },
  methods: {
    async onSubmit() {
      let result = await axios.post(this.userRoute, this.form);
      console.log(result);
    }
  }
};
</script>

