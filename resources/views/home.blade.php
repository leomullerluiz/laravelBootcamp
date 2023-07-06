<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Bootcamp</title>
</head>
<body>

    @auth
        <p>Você já esta logado</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <div>
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Title">
                <textarea name="body" id="" cols="30" rows="10" placeholder="post content"></textarea>
                <input type="submit" value="Create Post">
            </form>
        </div>


    @else
    <div>
        <h2>
            Register
        </h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="Register">
        </form>
    </div>

    <div>
        <h2>
            Login
        </h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginName" placeholder="name">
            <input type="password" name="loginPassword" placeholder="password">
            <input type="submit" value="Log in">
        </form>
    </div>

    @endauth

    
</body>
</html>