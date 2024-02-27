// import "./bootstrap";
// import "@/scss/app.scss";

// import { createApp } from "vue";
// import { prefersColor, prefersColorScheme } from "./prefersColorScheme.js";
// import LoginView from "./components/LoginComponents/LoginView.vue";

// const themeAttribute = "data-bs-theme";

// const app = createApp({});

// app.component("login-view", LoginView);

// app.directive("prefers-color-scheme", {
//     created: function (el, binding) {
//         console.log(binding);
//         el.setAttribute(themeAttribute, prefersColor(prefersColorScheme.value));
//     },
//     mounted: function (el, binding) {
//         let f = function (e) {
//             if (binding.value(e, el))
//                 prefersColorScheme.value.removeEventListener("change", f);
//         };
//         prefersColorScheme.value.addEventListener("change", f);
//     },
// });

// app.provide("prefers-color-scheme", {
//     prefersColor,
//     themeAttribute,
// });

// app.mount("#app");

// app.mount("#app");
