<template>
    <vue-carousel direction="left"
                  :data="data"
                  :controls="data.length > 1 ? 'hover' : false"
    ></vue-carousel>
</template>

<script>
import VueCarousel from "@chenfengyuan/vue-carousel";

export default {
    name: "news",
    components: {VueCarousel},
    props: {
        news: Array
    },
    computed: {
        data() {
            let data = [];

            this.news.forEach((news) => {
                data.push(`<img src="${news.url}" alt="${news.name}" class="w-full mx-auto">`);
            })

            return data;
        }
    }
}
</script>
