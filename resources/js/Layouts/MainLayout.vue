<template>

    <div class="wrapper">

       <Menu/>

        <div class="content-wrapper">

           <slot/>

        </div>


      
        <Footer/>
    </div>

</template>

<script setup>
import Footer from './partials/Footer.vue';
import Menu from './partials/Menu.vue';


</script>