<template>
    <div>
        <section class="box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><router-link :to="{ name: '/' }">Home</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ page_name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    props: [
        "page_name"
    ],
    setup() {

        return {

        }
    }
}
</script>

<style>

</style>