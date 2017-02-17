<template>
    <div class="chat-message">
        <p>{{ message.message }}</p>
        <small>{{ message.user }}</small>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>

<style lang="css">
    .chat-message {
        padding: 1rem;
        background-color: #fff;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .chat-message > p {
        margin-bottom: .5rem;
    }
</style>