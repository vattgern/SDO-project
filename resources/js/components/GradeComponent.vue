<template>
  <div class="container">
    <div class="d-flex justify-content-end align-items-center flex-row">
      <select class="p-2 w-25" style="cursor: pointer" id="subject">
        <!-- В value можем запихнуть id из БД группы и так будет легко сортировать -->
        <option value="all" selected>Предмет</option>
        <option value="1">ТРПО</option>
        <option value="2">Ин.яз</option>
        <option value="3">Менеджмент</option>
        <option value="4">ПиРИП</option>
        <option value="5">ИСРПО</option>
        <option value="6">Физ-ра</option>
      </select>
      <select class="p-2 w-25" style="margin-left: 2.5%; cursor: pointer" id="group">
        <!-- В value можем запихнуть id из БД группы и так будет легко сортировать -->
        <option value="all" selected>Предмет</option>
        <option value="1">ТРПО</option>
        <option value="2">Ин.яз</option>
        <option value="3">Менеджмент</option>
        <option value="4">ПиРИП</option>
        <option value="5">ИСРПО</option>
        <option value="6">Физ-ра</option>
      </select>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Студент/Дата</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
</template>

<script>
export default {
  name: "GradeComponent"
}
</script>

<style scoped>

</style>