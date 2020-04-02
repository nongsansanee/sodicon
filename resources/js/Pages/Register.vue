<template>
    <div class="w-full  flex justify-center  bg-blue-300"  >
        <form class=" bg-white shadow-md rounded px-12 pt-6 pb-2 m-2">
            <div class="  mb-4 ">
                <label class="block text-gray-700 text-xl font-bold mb-2" for="username">
                    Register
                </label>
                    <img :src="avatar" alt="" width="100" height="100">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="username" 
                        type="text" 
                        placeholder="Username"
                        :value="name"
                        >
            </div>
            <div class="w-full">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Email
                </label>
                <input class="shadow appearance-none border-red-500  border rounded w-full py-2 px-3" 
                    type="text" 
                    name="" 
                    id=""
                     placeholder="e-mail"
                      :value="email"
                     >
                <!-- <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                        id="email" 
                        type="text" 
                        placeholder="e-mail"
                        :value="email"
                        > -->
                <p class="text-red-500 text-xs italic">กรุณาใส่ E-mail</p>
            </div>
            <div class="flex items-center justify-between">
                <button 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="button"
                    @click="register"
                    >
                Register
                </button>
               
            </div>
        </form>

       
    </div>


    
</template>
<script>
export default {
    props:['social_id','name','email','avatar'],
    data(){
        return{
              user_profile:{
                 name:this.name,
                 email:this.email,
                 social_id: this.social_id,
                 avatar:this.avatar,

             },
        }
      
    },
    methods:{
        register(){
          console.log('register')
          console.log(this.user_profile)
             this.$inertia.post(`${this.$page.app.baseUrl}/register`, this.user_profile)
                     .then(() => {
                    
                     })
        }
    }
}
</script>