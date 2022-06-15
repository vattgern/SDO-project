<template>
  <section id="news" class="h-100">
    <div class="d-flex justify-content-between flex-row">
      <h1>Последние оценки детей</h1>
      <div class="child">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Лиджиев.А.О
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Лиджиев.Е.О
          </label>
        </div>
      </div>
    </div>
    <!--       Оценки         -->
    <div class="row mt-3 gap-4 justify-content-center">
      <div class="card bg-success text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>5</h2>
        </div>
      </div>
      <div class="card bg-primary text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>4</h2>
        </div>
      </div>
      <div class="card bg-warning text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>3</h2>
        </div>
      </div>
      <div class="card bg-danger text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>2</h2>
        </div>
      </div>
      <div class="card bg-success text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>5</h2>
        </div>
      </div>
      <div class="card bg-primary text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>4</h2>
        </div>
      </div>
      <div class="card bg-warning text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>3</h2>
        </div>
      </div>
      <div class="card bg-danger text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>2</h2>
        </div>
      </div>
      <div class="card bg-success text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>5</h2>
        </div>
      </div>
      <div class="card bg-primary text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>4</h2>
        </div>
      </div>
      <div class="card bg-warning text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>3</h2>
        </div>
      </div>
      <div class="card bg-danger text-light" style="max-width: 10rem;">
        <div class="card-header text-center">
          <h5 class="card-title">Предмет</h5>
        </div>
        <div class="card-body text-center">
          <h2>2</h2>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: "MainParentsComponent"
}
</script>

<style scoped>
  #news *::-webkit-scrollbar {
    background: transparent;
  }
</style>