<template>
<div>
<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Admin Sidebar</header>
      <a href="/admin/user" :class="classActiveUser">
        <i class="fas fa-person"></i>
        <span>Manage User</span>
      </a>
      <a href="/admin/unit" :class="classActiveUnit" >
       <i class="fa-solid fa-motorcycle"></i>
        <span>Manage Units</span>
      </a>
      <a href="/admin/order" :class="classActiveOrder">
        <i class="fa-solid fa-pen-to-square"></i>
        <span>Manage Orders</span>
      </a>
      <a href="/admin/collector" :class="classActiveCollector">
         <i class="fa-solid fa-hand-holding-dollar"></i>
        <span>Manage Collectors</span>
      </a>
      <a href="/admin/promo" :class="classActivePromo">
        <i class="fa-solid fa-ear-listen"></i>
        <span>Manage Promo</span>
      </a>
      <a href="/admin/SMS" :class="classActiveSMS">
        <i class="fas fa-sms"></i>
        <span>Manage SMS</span>
      </a>
      <a href="/admin/superfunc" :class="[classActiveSuper, classSuper]">
        <i class="fas fa-dumpster-fire"></i>
        <span>SuperAdmin Func</span>
      </a>
    </div>
  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Montserrat:600|Open+Sans:600&display=swap');
*{
  margin: 0;
  padding: 0;
  text-decoration: none;
}
.sidebar{
  position: fixed;
  width: 280px;
  left: -280px;
  height: 100%;
  top: 0;
  background: #1e1e1e;
  transition: all .5s ease;
}
.sidebar header{
  font-size: 28px;
  color: white;
  line-height: 70px;
  text-align: center;
  background: #1b1b1b;
  user-select: none;
  font-family: 'Montserrat', sans-serif;
}
.sidebar a{
  display: block;
  height: 65px;
  width: 100%;
  color: white;
  line-height: 65px;
  padding-left: 30px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  border-top: 1px solid rgba(255,255,255,.1);
  border-left: 5px solid transparent;
  font-family: 'Open Sans', sans-serif;
  transition: all .5s ease;
}
a.active,a:hover{
  border-left: 5px solid #b93632;
  color: #b93632;
}
a.IsSuper{
  display:none;
}
.sidebar a i{
  font-size: 23px;
  margin-right: 16px;
}
.sidebar a span{
  letter-spacing: 1px;
  text-transform: uppercase;
}
#check{
  display: none;
}
label #btn,label #cancel{
  position: absolute;
  cursor: pointer;
  color: white;
  border-radius: 5px;
  border: 1px solid #262626;
  margin: 5px 30px;
  font-size: 29px;
  background: #262626;
  height: 45px;
  width: 45px;
  text-align: center;
  line-height: 45px;
  transition: all .5s ease;
  top: 0;
}
label #cancel{
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ .sidebar{
  left: 0;
}
#check:checked ~ label #btn{
  margin-left: 290px;
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ label #cancel{
  margin-left: 290px;
  opacity: 1;
  visibility: visible;
}
@media(max-width : 860px){
  .sidebar{
    height: auto;
    width: 70px;
    left: 0;
    margin: 100px 0;
  }
  header,#btn,#cancel{
    display: none;
  }
  span{
    position: absolute;
    margin-left: 23px;
    opacity: 0;
    visibility: hidden;
  }
  .sidebar a{
    height: 60px;
  }
  .sidebar a i{
    margin-left: -10px;
  }
  a:hover {
    width: 200px;
    background: inherit;
  }
  .sidebar a:hover span{
    opacity: 1;
    visibility: visible;
  }
}
</style>

<script>
    export default {
        props: ['routename', 'super'],
        computed: {
           classActiveUnit(){
             return{
              active: (this.routename == 'admin.unit.index')

             }
           },
           classActiveUser(){
             return{
              active: (this.routename == 'admin.user.index')

             }
           },
          classActivePromo(){
             return{
              active: (this.routename == 'admin.promo.index')

             }
           },
           classActiveSMS(){
             return{
              active: (this.routename == 'admin.SMS.index')

             }
           },
           classActiveCollector(){
             return{
              active: (this.routename == 'admin.collector.index')

             }
           },
           classActiveOrder(){
             return{
              active: (this.routename == 'admin.order.index')

             }
           },
           classActiveSuper(){
             return{
              active: (this.routename == 'admin.super.index')

             }
           },
           classSuper(){
             return{
              IsSuper: (this.super == '0')
             }
           }
        }
    }
</script>