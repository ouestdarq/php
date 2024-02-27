<template>
  <main v-prefers-color-scheme="colorChange" :class="mainClassHtml">
    <section :class="sectionClassHtml">
      <login-form></login-form>
    </section>
  </main>
</template>

<script setup>
import { computed, inject } from "vue";
import LoginForm from "./Form.vue";

const { prefersColor, themeAttribute } = inject("prefers-color-scheme");

const mainClassArray = [
  "vh-100",
  "w-100",
  "d-flex",
  "flex-column",
  "justify-content-center",
  "bg-body-tertiary",
];

const sectionClassArray = [
  "container",
  "col",
  "col-xxl-3",
  "col-md-5",
  "col-sm-8",
];

const ClassArrayToHtml = function (a = []) {
  return a.reduce(function (past, current, i) {
    return `${past} ${current}`;
  });
}

const mainClassHtml = computed(function () {
  return ClassArrayToHtml(mainClassArray);
});

const sectionClassHtml = computed(function () {
  return ClassArrayToHtml(sectionClassArray);
});

function colorChange(e, el) {
  el.setAttribute(themeAttribute, prefersColor(e));
}
</script>