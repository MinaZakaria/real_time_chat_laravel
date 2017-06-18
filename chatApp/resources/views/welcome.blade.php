<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>

        <title>Laravel</title>

    </head>
    <body>
        <h1>New Users</h1>
        <!-- <ul>
            <li v-for="user in users">@{{ user }}</li>
        </ul> -->

        <ul id="app">
            <li v-for="user in users"> @{{ user }} </li>
        </ul>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>

        <script>
        var socket = io("http://localhost:3000");
        console.log('outside blade');
        new Vue ({
            el: '#app',
            data: {
             users: ['hello world','hello mina']
            },
            mounted: function(){
                console.log('inside ready');
                socket.on('test-channel:UserSignedIn',function(data){
                    console.log('inside blade');
                    this.users.push(data.username)
                }.bind(this));
            }
        });
        </script>
    </body>
</html>
