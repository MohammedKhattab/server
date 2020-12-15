<template>
    <button
        :class="[buttonClasses]"
        class="text-xs sm:text-lg md:text-2xl w-6/12 py-2 sm:py-4"
        @click="!selected ? $emit('panelClicked', name) : null"
    >
        <slide-y-down-transition :duration="100">
            <span v-show="!selected" class="inline-block">
                أو كـ
            </span>
        </slide-y-down-transition>

        <slot/>
    </button>
</template>

<script>
import {SlideYDownTransition} from 'vue2-transitions';

export default {
    name: "panelButton",
    components: {
        SlideYDownTransition
    },
    props: {
        name: String,
        selected: Boolean
    },
    computed: {
        buttonClasses() {
            if (this.selected) {
                return 'bg-white rounded-t';
            }

            return 'bg-indigo-500 text-white border-2 border-indigo-300 rounded shadow-lg mx-4 mb-3';
        }
    }
}
</script>
