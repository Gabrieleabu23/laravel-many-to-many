<script >
    import axios from 'axios';
export default{
    name:'TechnologyComp',
    data(){
        return{
            boh:''
        }
    },
    mounted(){
        axios.get('http://localhost:8000/api/v1/test').
        then(res=>
        {
            this.boh= res.data.message;
        })
        .catch(err=> console.log(err));

    }
}
</script>

<template>
<h2>{{ boh }}</h2>
 
</template>

<style scoped>

</style>
