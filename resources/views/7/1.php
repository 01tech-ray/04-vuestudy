<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>数字输入框组件</title>
</head>
<body>
    <div id="app">
        <input-number v-model = "value" :min="0" :max="10"></input-number>
    </div>
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <script>
        function isValueNumber(value){
            return (/(^-?[0-9]+\.{1}\d+$)|(^-?[1-9][0-9]*$)|(^-?0{1}$)/).test(value + '');
        }

        Vue.component('input-number',{
            template:' \
                <div class="input-number"> \
                    <input \
                    type="text" \
                    :value="currentValue" \
                    @change="handleChange"> \
                    <button \
                    @click="handleDown" \
                    :disable="currentValue < = min">-</button> \
                    <button \
                    @click="handleUp" \
                    :disable="currentValue > = max">+</button> \
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
                }
            },
            data:function(){
                return {
                    currentValue:this.value
                }
            },
            watch:{
                currentValue:function(val){
                    this.$emit('input',val);
                    this.$emit('on-change',val);
                }
            },
            methods:{
                updateValue:function(val){
                    if(val> this.max) val= this.max;
                    if(val < this.min) val=this.min;
                },
                handleDown:function(){
                    if(this.currentValue<= this.min) return;
                    this.currentValue -=1;
                },
                handleUp:function(){
                    if(this.currentValue>=this.max) return;
                    this.currentValue +=1;
                },
                handleChange:function(event){
                    var val= event.target.value.trim();
                    var max= this.max;
                    var min= this.min;

                    if(isValueNumber(val)){
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
                }
            },
            mounted:function(){
                this.updateValue(this.value);
            }

        });
        new Vue({
            el:'#app',
            data:{
                value:5
            }
        })
    </script>
</body>
</html>
