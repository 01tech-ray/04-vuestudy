
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.directive('test',{
    bind:function(el,binding,vnode){
        var keys=[];
        for (var i in vnode){
            keys.push(i);
        }

        el.innerHTML=
        'name:'+binding.name+'<br>'+
        'value:'+binding.value+'<br>'+
        'expression:'+binding.expression+'<br>'+
        'argument:'+binding.arg+'<br>'+
        'modifiers:'+binding.modifiers+'<br>'+
        'vnode keys:'+keys.join(',')
    }
});

Vue.directive('clockoutside',{
    bind:function(el,binding,vnode){
        function documentHandler(e){
            if(el.contains(e.target)){
                return false;
            }

            if(binding.expression){
                binding.value(e);
            }
        }
        el.__vueClickOutside__=documentHandler;
        document.addEventListener('click',documentHandler);
    },
    unbind:function(el,binding){
        document.removeEventListener('click',el.__vueClickOutside__);
        delete el.__vueClickOutside__;
    }
});

const app = new Vue({
    el: '#app',
    data:()=>{
        return {
            show:false,
            message:'test'
        }
    },
    methods:{
        handleClose: function(){
            this.show=false;
        }
    }
});
