<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Bootstrap -->
        <link href="../../css/app.css" rel="stylesheet">

        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- Axios -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            function registerAPI() {
                axios.post('http://localhost:8000/api/register', {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                    password_confirmation: document.getElementById('password_confirmation').value,
                    headers:  {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                })
                .then(function (response) {
                    document.getElementById('token').value = response.data.token;
                    document.getElementById('resposta').innerHTML = JSON.stringify(response.data);
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            function loginAPI() {
                axios.post('http://localhost:8000/api/login', {
                    email: document.getElementById('email_login').value,
                    password: document.getElementById('password_login').value,
                    headers:  {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                })
                .then(function (response) {
                    document.getElementById('token').value = response.data.token;
                    document.getElementById('resposta').innerHTML = JSON.stringify(response.data);
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            function userAPI() {
                axios.get('http://localhost:8000/api/user', {
                    headers:  {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': 'Bearer '+document.getElementById('token').value,
                    },
                })
                .then(function (response) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(response.data);
                    console.log(response);
                })
                .catch(function (error) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(error);
                    console.log(error);
                });
            }
            function loginCookieAPI() {
                axios.defaults.crossDomain = true;
                axios.defaults.withCredentials = true;
                axios.post('http://localhost:8000/api/cookielogin', {
                    email: document.getElementById('email_login').value,
                    password: document.getElementById('password_login').value,
                    headers:  {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                })
                .then(function (response) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(response.data);
                    console.log(response);
                })
                .catch(function (error) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(error);
                    console.log(error);
                });
            }
            function openAPI() {
                axios.get('http://localhost:8000/api/open', {
                    headers:  {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                })
                .then(function (response) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(response.data);
                    console.log(response);
                })
                .catch(function (error) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(error);
                    console.log(error);
                });
            }
            function closedAPI() {
                axios.get('http://localhost:8000/api/closed', {
                    headers:  {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': 'Bearer '+document.getElementById('token').value,
                    },
                })
                .then(function (response) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(response.data);
                    console.log(response);
                })
                .catch(function (error) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(error);
                    console.log(error);
                });
            }
            function closedCookieAPI() {
               axios.defaults.withCredentials = true;
               axios.defaults.crossDomain = true;
                axios.post('http://localhost:8000/api/closedcookie', {
                    headers:  { 
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                })
                .then(function (response) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(response.data);
                    console.log(response);
                })
                .catch(function (error) {
                    document.getElementById('resposta').innerHTML = JSON.stringify(error);
                    console.log(error);
                });
            }
        </script>
    </head>
    <body>
        <div class="content">
            <div class="container" id="accordionExample">
                <div class="jumbotron">
                    <h1>Client</h1>
                </div>
                <h5>Result</h5>
                <div class="bg-dark p-3 mb-3">
                    <pre><code id='resposta' class="text-light"></code></pre>
                </div>
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#collapseregister">Register</div>
                    <div class="card-body collapse" id="collapseregister" data-parent="#accordionExample">
                        <p><input class='form-control' type="text" id='name' placeholder="nome"/></p>
                        <p><input class='form-control' type="text" id='email' placeholder="email"/></p>
                        <p><input class='form-control' type="password" id='password' placeholder="password"/></p>
                        <p><input class='form-control' type="password" id='password_confirmation' placeholder="password"/></p>
                        <p><button class='btn btn-block btn-primary' onclick="registerAPI()">Register API - JS</button></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#collapselogin">Login</div>
                    <div class="card-body collapse" id="collapselogin" data-parent="#accordionExample">
                        <p><input class='form-control' type="text" id='email_login' placeholder="email"/></p>
                        <p><input class='form-control' type="password" id='password_login' placeholder="password"/></p>
                        <p><button class="btn btn-block btn-primary" onclick="loginAPI()">Login API - JS</button></p>
                        <p><button class="btn btn-block btn-secondary" onclick="loginCookieAPI()">Login API - JS / returns cookie</button></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#collapse">Access API</div>
                    <div class="card-body collapse" id="collapse" data-parent="#accordionExample">
                        <p><input class='form-control' type="text" id='token' placeholder="<<TOKEN>>"/></p>
                        <p><button class="btn btn-block btn-secondary" onclick="openAPI()">Access API - JS (open)</button></p>
                        <p><button class="btn btn-block btn-secondary" onclick="userAPI()">User API - JS (needs authentication / text jwt)</button></p>
                        <p><button class="btn btn-block btn-secondary" onclick="closedAPI()">Access closed API - JS (needs authentication / text jwt)</button></p>
                        <p><button class="btn btn-block btn-secondary" onclick="closedCookieAPI()">Access closed API - JS  (needs authentication / cookie)</button></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
