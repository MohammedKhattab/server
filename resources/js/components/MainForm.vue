<template>
    <article>
        <h3 class="block md:hidden mb-4 text-lg text-gray-800">تقديم طلب جديد</h3>

        <div class="flex">
            <panel-button
                name="customer"
                :selected="selected === 'customer'"
                @panelClicked="select"
            >عميل
            </panel-button>
            <panel-button
                name="client"
                class="rounded-tl-none"
                :selected="selected === 'client'"
                @panelClicked="select"
            >بائع
            </panel-button>
        </div>

        <div class="p-6 bg-white rounded-r shadow-lg">
            <slide-x-right-transition>
                <form @submit.prevent="submit" v-show="ready">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <template v-for="(field, name) in selectedFields">
                            <field
                                v-if="! field.hasOwnProperty('related_to')"
                                :key="name"
                                :field="field"
                                :name="name"
                                :has-error="form.hasError(name)"
                                :error="form.getError(name)"
                                v-model="form[name]"
                                @relatedChanged="e => form[field.related_by] = e"
                            />
                        </template>

                        <div class="col-span-1">
                            <label class="text-sm sm:text-base block mb-2 text-gray-800">
                                الغرض من الطلب
                            </label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" v-model="form.why_you_send" value="1">
                                    <span class="mr-2">استلام وتسليم المنتج من العميل</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 w-6/12 md:w-4/12 mr-auto text-center">
                        <button
                            type="submit"
                            :disabled="disabled"
                            :class="[buttonClasses]"
                            class="transition-all duration-150 font-bold py-2 shadow text-center text-white"
                        >
                            <span v-if="disabled" class="fa fa-spinner fa-spin"></span>
                            <span v-else>ارسل الطلب</span>
                        </button>
                    </div>
                </form>
            </slide-x-right-transition>
        </div>
    </article>
</template>

<script>
import Form from 'form-backend-validation';
import {SlideXRightTransition} from 'vue2-transitions'
import {FormMixin} from "./form.mixin";

export default {
    name: "mainForm",
    components: {SlideXRightTransition},
    mixins: [FormMixin],
    props: {
        sharedFields: Object,
        customerFields: Object,
        clientFields: Object
    },
    data() {
        return {
            selected: '',
            form: new Form(),
            ready: false,
            disabled: false,
        }
    },
    computed: {
        selectedFields() {
            return this[this.selected + 'Fields'] || {};
        },
        formFields() {
            const form = {};

            for (const field in this.selectedFields) {
                if (this.selectedFields.hasOwnProperty(field)) {
                    form[field] = this.selectedFields[field].value || '';
                }
            }

            return form;
        },
        url() {
            return `api/v1/register/${this.selected}`;
        }
    },
    mounted() {
        this.select('customer')
    },
    methods: {
        select(tab) {
            this.ready = false;

            setTimeout(() => {
                this.selected = tab;
                this.form = new Form({
                    why_you_send: 1,
                    is_for_client: (this.selected === 'client'),
                    ...this.formFields
                });
                this.ready = true;
            }, 10);
        }
    }
}
</script>
