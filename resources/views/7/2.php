<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <component-a v-model="value" class="sss" :step="sstep"></component-a>
        <input type="text" v-model="sstep">
        <div>{{value}}</div>
    </div>
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <script>
        Vue.component('component-a',{
            template:' \
                <div class="input-number"> \
                    <input \
                    type="text" \
                    :value="currentValue" \
                    @change="handleChange" \
                    @keyup.up="handleUp" \
                    @keyup.down="handleDown" \
                    > \
                    <button \
                    @click="handleDown" \
                    >-</button> \
                    <button \
                    @click="handleUp" \
                    >+</button> \
                </div> \
            ',
            props:{
                min:{
                    type:Number,
                    default:-Infinity
                },
                max:{
                    type:Number,
                    default:Infinity
                },
                value:{
                    type:Number,
                    default:0
                },
                step:{
                    type:Number,
                    default:1
                }
            },
            data:function(){
                return {
                    currentValue:this.value
                }
            },
            methods:{
                handleDown:function(){
                    if(this.currentValue <= this.min) return;
                    this.currentValue -= this.step;
                },
                handleUp:function(){
                    if(this.currentValue >= this.max) return;
                    this.currentValue +=Number(this.step)
                },
                handleChange:function(event){
                    var val= event.target.value.trim();
                    var max= this.max;
                    var min= this.min;

                    if(this.isValueNumber(val)){
                        val= Number(val);
                        this.currentValue=val;

                        if(val> max){
                            this.currentValue=max;
                        }else if(val < min){
                            this.currentValue=min;
                        }
                    }else{
                        event.target.value=this.currentValue;
                    }
                },
                isValueNumber:function(value){
                    return (/(^-?[0-9]+\.{1}\d+$)|(^-?[1-9][0-9]*$)|(^-?0{1}$)/).test(value + '');
                },
                updateValue:function(val){
                    if(val> this.max) val= this.max;
                    if(val < this.min) val=this.min;
                    this.currentValue=val;
                }
            },
            watch:{
                currentValue:function(val){
                    this.$emit('input',val);
                    this.$emit('on-change',val);
                },
                value:function(val){
                    this.updateValue(val);
                }
            }
        });
        app = new Vue({
            el:'#app',
            data:{
                value:5,
                sstep:1
            }
        })
    </script>
</body>
</html>


