<template>
    <vue-carousel
        direction="right"
        :indicators="false"
        :controls="data.length > 1"
        :data="data"
    ></vue-carousel>
</template>

<script>
import VueCarousel from '@chenfengyuan/vue-carousel';

export default {
    name: "Carousel",
    components: {VueCarousel},
    props: {
        ads: Array
    },
    computed: {
        data() {
            let data = [];

            this.ads.forEach((ad) => {
                data.push('<a href="' + ad.url + '" target="_blank"><img src="' + ad.image + '" alt="صورة الإعلان" class="mx-auto" style="height: 100px;" /></a>')
            });

            return data;
        }
    }
}
</script>
