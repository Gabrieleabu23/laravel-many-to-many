<script >
    import axios from 'axios';
export default{
    name:'TechnologyComp',
    data(){
        return{
            technologies:[],
            newTechnology: {
                name: "",
            },
            createFormActive:false
        }
    },
    methods:{
        createNewTek() {
            this.createFormActive = true;
        },
        submitNewTechnology() {
            // console.log("submit: ", this.newTechnology);

            axios
                .post(
                    "http://127.0.0.1:8000/api/v1/tech",
                    this.newTechnology
                )
                .then((res) => {
                    const data = res.data.data;
                    console.log(data.status);

                    if (data.status == "success") {
                        this.technologies.push(data.technologies);
                        this.createFormActive = false;
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted(){
        axios.get('http://localhost:8000/api/v1/tech').
        then(res=>
        {
            this.technologies=res.data.technologies.data ;
        })
        .catch(err=> console.log(err));

    }
}
</script>

<template>
    <div>
      <form v-if="createFormActive" @submit.prevent="submitNewTechnology">
        <label for="name">Technology name: </label>
        <input
          type="text"
          name="name"
          id="name"
          v-model="newTechnology.name"
        />
        <input type="submit" value="CREA" />
        <br />
      </form>
  
      <div v-else>
        <button @click="createNewTek">CREA NUOVA TECNOLOGIA</button>
        <h2 v-for="tech in technologies" :key="tech.id">{{ tech.name }}</h2>
      </div>
    </div>
    
  </template>
  
  

<style scoped>

</style>
