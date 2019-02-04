<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue示例</title>
</head>
<body>
    <div id="app">
        <div>
            <span>复选框单独使用</span>

            <input type="checkbox" name="" id="checked" v-model="checked">
            <label for="checked">选择状态：{{checked  }}</label>
        </div>
        <div>
            <span>复选框组合使用</span>
            <br>
            <input type="checkbox" name="" id="html" v-model="zchecked" value="html">
            <label for="html">html</label>
            <br>
            <input type="checkbox" name="" id="js" v-model="zchecked" value="js">
            <label for="js">js</label>
            <br>
            <input type="checkbox" name="" id="php" v-model="zchecked" value="php">
            <label for="php">php</label>
            <br>
            <p>选择的项是：{{zchecked}}</p>
        </div>
        <div>
            <span>选择列表-单选</span>
            <br>
            <select name="" id="" v-model="selected">
                <option value="js">Javascript</option>
                <option >html</option>
                <option value="php">php</option>
            </select>
            <p>选择的项是：{{selected}}</p>
        </div>
        <div>
            <span>选择列表-多选</span>
            <br>
            <select multiple name="" id="" v-model="mselected">
                <option value="js">Javascript</option>
                <option >html</option>
                <option value="php">php</option>
            </select>
            <p>选择的项是：{{mselected}}</p>
        </div>
    </div>
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <script>
        new Vue({
            el:'#app',
            data:{
                checked:true,
                zchecked:['html','js'],
                selected:'html',
                mselected:['html','js'],
            }
        })
    </script>
</body>
</html>
