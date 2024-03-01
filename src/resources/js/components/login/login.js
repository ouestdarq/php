import "@/scss/app.scss";

import { createApp } from "vue";
import { prefersColor, prefersColorScheme } from "@/js/prefersColorScheme.js";
import LoginView from "./View.vue";

const themeAttribute = "data-bs-theme";

const app = createApp(LoginView);

app.directive("prefers-color-scheme", {
    created: function (el, binding) {
        console.log(binding);
        el.setAttribute(themeAttribute, prefersColor(prefersColorScheme.value));
    },
    mounted: function (el, binding) {
        let f = function (e) {
            if (binding.value(e, el))
                prefersColorScheme.value.removeEventListener("change", f);
        };
        prefersColorScheme.value.addEventListener("change", f);
    },
});

app.provide("prefers-color-scheme", {
    prefersColor,
    themeAttribute,
});

app.mount("#app");
