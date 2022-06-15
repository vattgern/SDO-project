<template>
    <section id="news" class="h-100">
        <!--       Оценки         -->
        <div class="d-flex flex-column ">
            <div class="d-flex w-100 justify-content-start align-items-center flex-row">
                <div>
                    <h3 class="mb-3">Последние оценки </h3>
                </div>
            </div>
            <div>
                <div id="carouselOne" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" >
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-success" >5</h4>
                                            <p class="card-text text-black">Предмет</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-primary">4</h4>
                                            <p class="card-text text-black">Предмет</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-warning">3</h4>
                                            <p class="card-text text-black">Предмет</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" >
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-success">5</h4>
                                            <p class="card-text text-black">Предмет</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-danger">2</h4>
                                            <p class="card-text text-black">Предмет</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title text-primary">4</h4>
                                            <p class="card-text text-black">Предмет</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary " data-bs-target="#carouselOne" data-bs-slide="prev">
                        Назад
                    </button>
                    <button class="btn btn-outline-primary ms-2" type="button" data-bs-target="#carouselOne" data-bs-slide="next">
                        Вперед
                    </button>
                </div>
            </div>
        </div>
        <!--        Новости        -->
        <div class="w-100 d-flex flex-column mt-5">
            <h3 class="card-title mb-3" >Новости</h3>
            <div class="list-group overflow-auto w-100" style="height: 70vh;">
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">List group item heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">now</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Another title here</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph that goes a little longer so it wraps to a new line.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">3d</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Third heading</h6>
                            <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                    </div>
                </a>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "MainStudentComponent"
}
</script>

<style scoped>
    #news *::-webkit-scrollbar {
        background: transparent;
    }
</style>
