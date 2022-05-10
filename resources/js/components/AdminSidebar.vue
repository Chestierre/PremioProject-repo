<template>
  <div>
    <button class ="btn btn-primary" @click="sidebarCollapse">Toggle Sidebar</button>
  </div>
</template>

<script>
    export default {
        mounted(){
        },
    methods: {
        sidebarCollapse(){
            alert('on development');
        }
    }
    }
</script>