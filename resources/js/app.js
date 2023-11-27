import "./bootstrap";
import { createApp } from "vue";
import ChatForm from "./components/ChatForm.vue";
import ChatMessages from "./components/ChatMessages.vue";

const app = createApp({});
app.component("ChatForm", ChatForm);
app.component("ChatMessages", ChatMessages);
app.mount("#app");
