import { computed, reactive, ref } from "vue";

const prefersColorSchemeEnum = ["light", "dark"];

const dark = ref(true);

const needle = computed(function () {
    return prefersColorSchemeEnumfromBool(dark.value);
});

const other = computed(function () {
    return prefersColorSchemeEnumfromBool(!dark.value);
});

const query = computed(function () {
    return `(prefers-color-scheme: ${needle.value}`;
});

const prefersColorScheme = computed(function () {
    return window.matchMedia(query.value);
});
const prefersColorSchemeMatch = reactive({
    get theme() {
        return needle.value;
    },
    set theme(t) {
        if (!prefersColorSchemeEnum.includes(t)) return;

        switch (t) {
            case other.value:
                dark.value = !dark.value;
                break;
        }
    },
    get dark() {
        return dark.value;
    },
    set dark(b) {
        dark.value = b;
    },
    get light() {
        return !dark.value;
    },
    set light(b) {
        dark.value = !b;
    },
});

function prefersColor(e) {
    if (!e) return;

    return e.matches ? needle.value : other.value;
}

function prefersColorSchemeEnumfromBool(b, arr) {
    return prefersColorSchemeEnum[Number(b)];
}

export { prefersColor, prefersColorScheme, prefersColorSchemeMatch };
