<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="offer-box mt-20 mb-20">
                <h3><span class="regular blue">Sale Up To</span><br><span class="semibold">30% Off</span></h3>
                <a href="#" class="buy-now">Buy Now <i class="bi-chevron-double-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="offer-box mt-20 mb-20">
                <h3><span class="regular blue">Sale Up To</span><br><span class="semibold">30% Off</span></h3>
                <a href="#" class="buy-now">Buy Now <i class="bi-chevron-double-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="offer-box mt-20 mb-20">
                <h3><span class="regular blue">Sale Up To</span><br><span class="semibold">30% Off</span></h3>
                <a href="#" class="buy-now">Buy Now <i class="bi-chevron-double-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'MainOffers2',
    mounted() {
    }
}
</script>
<style scoped>
.offer-box {
    background: var(--bg-color-4);
    background-size: cover;
    background-position: center;
    padding: 15% 8%;
}

.offer-box .buy-now {
    text-transform: uppercase;
    color: #4c4c4c;
    font-weight: 500;
    text-decoration: none;
    font-size: 14px;
    margin-top: 12px;
    display: block;
}
</style>