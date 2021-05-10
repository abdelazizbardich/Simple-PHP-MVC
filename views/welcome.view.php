<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,400&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        background-color: #f44336;
        font-family: 'Poppins', sans-serif;
    }
    main{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    main h1{
        color: #ffffff  ;
    }
    main p{
        width: 90%;
        max-width: 700px;
        text-align: center;
    }
    main .box{
        padding: 16px;
        border-radius: 5px;
        width: 90%;
        max-width: 900px;
        text-align: center;
    }
    .box h1{
        margin-bottom: 16px;
    }
    .grid{
        display: grid;
        grid-template-columns: repeat(2,1fr);
        grid-template-rows: auto 1fr;
        height: 100%;
        grid-gap: 5px;
    }
    .fr0{
        grid-column: 1/3;
    }
    .card {
        box-shadow: #d9d9d9 0px 1px 2px;
        border: 1px solid #00000008;
        background: #FFFFFF;
        border-radius: 5px;
        min-height: 200px;
        transition: .1s;
    }
    .card:hover {
        box-shadow: #000000 0px 3px 8px;
        background-color: #131317;
        color: #ffffff;
    }
    .card a{
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
        color: inherit;
        font-size: xx-large;
        font-weight: 400;
        flex-direction: column;
    }
    .card a i{
        font-size: xx-large;
    }
    small{
        font-size: x-small;
        opacity: .5;
    }
    </style>
</head>
<body>
    <main>
        <h1>Welcome to MVC Strater</h1>
        <p>Create you MVC based project with easy steps using this MVC starter template<br>this template provides (Routing, controller, moddel, Moddlewar & viwe systems) so you can use it to create any web project you want</p>
        <div class="box">
            <div class="grid">
                <div class="fr1 card">
                    <a href="https://github.com/abdelazizbardich/Template_MVC_Version1-master" target="_blank"><i class="fab fa-github"></i> Github</a>
                </div>
                <div class="fr2 card">
                    <a href="https://github.com/abdelazizbardich/Template_MVC_Version1-master/blob/main/README.md" target="_blank"><i class="fas fa-book"></i> Documentation <small>(Readme.md)</small></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>