import "./bootstrap";
import "@/scss/app.scss";

import { createApp } from "vue";
import LoginView from "./components/LoginComponents/LoginView.vue";

const app = createApp({
    data() {
        return {
            message: "some message",
        };
    },
    components: {
        LoginView,
    },
});

app.mount("#app");

// const app = createApp({
//     mounted() {
//         console.log("The app is working");
//     },
//     // components: {
//     //     LoginView,
//     // },
// });

// app.mount("#app");
