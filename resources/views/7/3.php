<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>标签页</title>
    <style>
        [v-cloak]{
            display:none;
        }
        .tabs{
            font-size:14px;
            color:#657180;
        }
        .tabs-bar:after{
            content:'';
            display:block;
            width:100%;
            height:1px;
            background:#d7dde4;
            margin-top:-1px;
        }
        .tabs-tab{
            display:inline-block;
            padding:4px 16px;
            margin-right:6px;
            background:#fff;
            border:1px solid #d7dde4;
            cursor:pointer;
            position:relative;
        }
        .tabs-tab-active{
            color:#3399ff;
            border-top:1px solid #3399ff;
            border-bottom:1px solid #fff;
        }
        .tabs-tab-active:before{
            content:'';
            display:block;
            height:1px;
            background:#3399ff;
            position:absolute;
            top:0;
            left:0;
            right:0;
        }
        .tabs-content{
            padding:8px 0;
        }
    </style>
</head>
<body>
    <div id="app" v-cloak>
        <tabs v-model="activeKey">
            <pane label="标签一" name="1">
                标签一的内容
            </pane>
            <pane label="标签二" name="2">
                标签二的内容
            </pane>
            <pane label="标签三" name="3">
                标签三的内容
            </pane>
        </tabs>
        {{activeKey}}
    </div>
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <script>
        Vue.component('tabs',{
            template:'\
            <div class="tabs">\
                <div class="tabs-bar">\
                    <div \
                        :class="tabCls(item)" \
                        v-for="(item,index) in navList" \
                        @click="handleChange(index)">\
                        {{item.label}}\
                    </div> \
                    <div class="tabs-content">\
                        <slot></slot>\
                    </div> \
            </div> \
            ',
            props:{
                name:{
                    type:String
                },
                label:{
                    type:String,
                    default:''
                },
                value:{
                    type:[String,Number]
                }
            },
            data:function(){
                return {
                    currentValue:this.value,
                    navList:[]
                }
            },
            watch:{
                value:function(val){
                    this.currentValue=val;
                },
                currentValue:function(){
                    this.updateStatus();
                }
            },
            methods:{
                tabCls:function(item){
                    // console.log(item);
                    return ['tabs-tab',{
                        'tabs-tab-active':item.name=== this.currentValue
                    }]
                },
                handleChange:function(index){
                    var nav=this.navList[index];
                    var name=nav.name;
                    this.currentValue=name;
                    this.$emit('input',name);
                    this.$emit('on-click',name);
                },
                getTabs(){
                    return this.$children.filter(function(item){
                        // console.log(item);
                        return item.$options.name === 'pane';
                    });
                },
                updateNav(){
                    this.navList=[];
                    var _this=this;

                    this.getTabs().forEach(function(pane,index){
                        _this.navList.push({
                            label:pane.$attrs.label,
                            name:pane.$attrs.name || index
                        });
                        // console.log(_this.navList);
                        if(!pane.$attrs.name) pane.$attrs.name=index;
                        if(index===0){
                            if(!_this.currentValue){
                                _this.currentValue=pane.$attrs.name || index;
                            }
                        }
                    });
                    this.updateStatus();
                },
                updateStatus(){
                    var tabs=this.getTabs();
                    var _this=this;
                    tabs.forEach(function(tab){
                        // console.log(tab);
                        // console.log(_this.currentValue);
                        return tab.show = tab.$attrs.name === _this.currentValue;
                    })
                }
            }
        });
        Vue.component('pane',{
            template:'\
            <div class="pane" v-show="show">\
                <slot></slot>\
            </div> \
            ',
            data:function(){
                return{
                    show:true
                }
            },
            methods:{
                updateNav(){
                    this.$parent.updateNav();
                }
            },
            watch:{
                label(){
                    this.updateNav();
                }
            },
            mounted(){
                this.updateNav();
            }
        });
        var app = new Vue({
            el:'#app',
            data:{
                activeKey:'1',
                sstep:1
            }
        })
    </script>
</body>
</html>
