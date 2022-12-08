<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header">{{ usersCount }} utilisateurs inscrit</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Utilisateurs</th>
              <th>Role</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr v-for="user in users" :key="user.id">
              <td>
                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                <strong>{{ user.name }}</strong>
              </td>
              <td>{{ user.role.name }}</td>
              <td><span class="badge bg-label-primary me-1">Active</span></td>
              <td class="row g-0 pe-0">
                <a class="col-3" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>
                <a
                  class="col-3"
                  href="javascript:void(0);"
                  @click="destroyUser(user.id)"
                  ><i class="bx bx-trash me-1 text-danger"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import useUser from "../../../services/admin/client/index.js";

const { users, usersCount, getUsers, destroyUser } = useUser();

const deleteUser = async (id) => {
  await destroyUser(id);
};

onMounted(async () => {
  await getUsers();
});
</script>

<style>
</style>