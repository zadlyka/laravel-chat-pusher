<template>
  <div class="grid gap-2">
    <textarea
      class="block w-full px-4 py-2 text-black bg-white border border-gray-200 rounded-md focus:border-black focus:ring-secondary focus:ring-opacity-40 focus:outline-none focus:ring"
      rows=6 name="message" placeholder="Type your message here..." ref="message" @keyup.enter="sendMessage"></textarea>
    <button
      class="w-full px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-black rounded-lg hover:bg-secondary hover:text-white focus:outline-none focus:ring focus:ring-secondary focus:ring-opacity-80"
      @click="sendMessage">
      Send
    </button>
  </div>
</template>

<script lang="js">
export default {
  props: ['receiver_id'],
  methods: {
    sendMessage() {
      const message = this.$refs.message.value;
      const receiver_id = this.receiver_id;
      axios.post('/messages', { message, receiver_id }).then(response => {
      });
    },
  },
};
</script>