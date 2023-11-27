<template>
  <div class="h-screen p-4 overflow-y-scroll bg-gray-100">
    <div class="grid grid-cols-1 gap-4 mx-auto">
      <div v-for="item in messages">
        <div class="flex justify-start p-5 bg-white rounded-tl-none rounded-2xl" v-if="item.receiver_id == user_id">{{
          item.message }}</div>
        <div class="flex justify-end p-5 text-white bg-black rounded-tr-none rounded-2xl"
          v-else-if="item.sender_id == user_id">{{
            item.message }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['interlocutors_id', 'user_id'],
  data() {
    return {
      messages: [],
    };
  },
  created() {
    this.fetchMessages()
  },
  mounted() {
    const self = this;
    const privateChannel = Echo.private("message-channel");
    privateChannel.listen(".message-event", function (data) {
      self.fetchMessages();
    });
  },
  methods: {
    fetchMessages() {
      axios.get("/messages").then((response) => {
        const data = response.data;
        this.messages = data.filter((item) => (item.sender_id === this.interlocutors_id && item.receiver_id === this.user_id) || (item.sender_id === this.user_id && item.receiver_id === this.interlocutors_id));
      });
    },
  },
};
</script>