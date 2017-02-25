<template lang="html">
    <div class="chat-log">
        <chat-message v-for="message in messages" :message="message" :user="user"></chat-message>
        <div class="text-center" v-if="messages.length === 0">
            <h3>No tienes mensajes</h3>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages', 'user']
    }
</script>

<style lang="css">
    .chat-log {
        max-height: 45vh;
        margin: 20px 0;
        overflow: scroll;
    }
</style>