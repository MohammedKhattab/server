<template>
    <div :class="field.parent_class || 'col-span-1'">
        <label
            :for="name"
            class="text-sm sm:text-base block mb-2 text-gray-800"
            :class="{'text-red-600': hasError}"
            v-text="field.label"
        />

        <template v-if="['text', 'email', 'number'].includes(field.type)">
            <input
                :type="field.type"
                :id="name"
                :value="value"
                @input="$emit('input', $event.target.value)"
                class="form-input block w-full"
                :placeholder="field.placeholder"
                :autocomplete="field.autocomplete"
            >
        </template>
        <template v-if="field.type === 'textarea'">
            <textarea
                :value="value"
                @input="$emit('input', $event.target.value)"
                :id="name"
                :rows="field.rows || 10"
                :placeholder="field.placeholder"
                class="form-textarea block w-full"
            ></textarea>
        </template>
        <template v-if="field.type === 'tel'">
            <div class="mt-1 relative rounded-md shadow-sm" dir="ltr">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm sm:leading-5">
                          +966
                      </span>
                </div>
                <input
                    :type="field.type"
                    :id="name"
                    :value="value"
                    @input="$emit('input', $event.target.value)"
                    class="form-input block w-full pl-12 sm:text-sm sm:leading-5"
                    :placeholder="field.placeholder || '5xxxxxxxxx'"
                    :autocomplete="field.autocomplete"
                >
            </div>
        </template>
        <template v-if="field.type === 'select'">
            <select
                :id="name"
                :value="value"
                @input="$emit('input', $event.target.value)"
                class="form-select block w-full"
            >
                <option value disabled v-text="field.label"/>
                <option v-for="option in field.options || {}" :value="option" v-text="option"/>
                <option value="other" v-text="'آخرى'"/>
            </select>

            <input
                v-if="field.hasOwnProperty('related_by')"
                type="text"
                @input="$emit('relatedChanged', $event.target.value)"
                v-show="value === 'other'"
                class="form-input mt-2 block w-full"
                :placeholder="field.placeholder"
            >
        </template>
        <template v-if="field.type === 'radio'">
            <div class="space-x-2 space-x-reverse">
                <template v-for="(option, index) in field.options || {}">
                    <label class="inline-flex items-center" :key="index">
                        <input
                            type="radio"
                            :name="name"
                            :value="index"
                            @input="$emit('input', $event.target.value)"
                            class="form-radio"
                        >
                        <span class="mr-2" v-text="option"/>
                    </label>
                </template>
            </div>
        </template>

        <span
            class="text-sm text-red-500"
            v-if="hasError"
            v-text="error"
        />
    </div>
</template>

<script>
export default {
    name: "Field",
    props: [
        'field', 'name', 'value', 'hasError', 'error', 'showOtherInput'
    ]
}
</script>
