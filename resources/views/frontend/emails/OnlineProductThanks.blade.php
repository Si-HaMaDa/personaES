<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reham El hawary</title>
    <style>

        /** General Styles **/

        body {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        p {
            color: 707070;
        }

        /** Header Styles **/

        header {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 60vh;
            clip-path: polygon(0 0, 100% 0%, 100% 85%, 0% 100%);

        }

        header .container {
            height: 100%;
            display: flex;
            justify-content: flex-end; 
            align-items: center;
        }

        header h1 {
            text-align: center;
            color: #fff;
						float: right;
            font-size: 3rem;
        }

        /** Section Styles **/

        section:first-of-type {
            padding-top: 50px;
            padding-bottom: 25px;
        }

        section:last-of-type {
            padding-bottom: 50px;
            padding-top: 25px;
        }


        section h2 {
            color: #C71375;
            text-transform: capitalize;
        }

        /** Footer Styles **/

        footer {
            background-color: #033F5B;
            color: #fff;
            padding-top: 100px;
            padding-bottom: 20px;
            clip-path: polygon(0 30%, 100% 0%, 100% 100%, 0% 100%);
        }

        footer .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        footer .container > * {
            padding: 10px;
        }

        footer a {
            color: #fff;
        }

        footer a.logo {
            display: flex;
            align-items: center;
        }
        
        footer a.logo span {
            text-transform: capitalize;
            padding-left: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        footer p {
						float: right;
						color: #fff;
            font-size: 20px;
            font-weight: bold;
        }

    </style>
</head>

<body>

    <!-- Header -->

    <header style="background-image: url('{{it()->url(setting()->home_photo)}}')">
        <div class="container">
            <div class="header-wrapper">
                <h1>Persona international <br>confirms your <br> </b> <span style="color: #C71375">purchase</span> of ...</h1>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <h2>Messege</h2>
            <p>
							Thank you for purchasing online profile title {{$data['product']['titel']}}
							Your personal access link will be delivered to your email within 48 hours
							your report will be generated automatically once you respond to the questionnaire
							if you desire debriefing session on your report ,, please contact persona international (number)
            </p>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>note</h2>
            <p>
							Services, products, labels, availability, content and usage subject to change without notice. All rights reserved & stringently prosecuted. Reproduction, distribution, copying, modeling, imitating, extracting, adapting concepts, or any derivative thereof, strictly prohibited. All rights reserved. Unauthorized use is an infringement of copyrights, trademarks, or proprietary rights.
            </p>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container">
            <a class="logo">
                <img src="{{it()->url(setting()->logo)}}" alt="logo">
                <span>persona <br>international</span>
            </a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </footer>
</body>

</html>
