@extends('layout')

@section('content')
<section id="top_page">
    <div id="top_left">
        <h1>Nos dernières pépites</h1>
        <p class="p2">Découvrez les dernières nouveautés de notre médiathèque ! Que vous soyez passionné par la littérature, le cinéma ou les tendances culturelles, nous avons quelque chose pour vous. Plongez dans un monde de découvertes et laissez-vous inspirer par nos sélections soigneusement choisies.
        </p>
        <a href="/catalogue?sort=recent"><button>VOIR PLUS <i class="fa-solid fa-arrow-right" style="color: #6887f6;"></i></button></a>
    </div>
    <div id="top_right">
        <img src="./assets/img/booksHome.png" alt="Teloculture">
    </div>
</section>
<section id="literature">
    <div>
        <div>
            <span>-Littérature</span>
            <h2>Découvrez nos catégories !</h2>
            <div>
                <svg class="arrow" id="left_arrow" style="enable-background:new 0 0 1024 1024;" version="1.1" viewBox="0 0 1024 1024" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path fill="#FFFFFF" stroke="#8C8C8C" stroke-width="20" d="M73,512c0,59.3,11.6,116.8,34.5,170.9c22.1,52.3,53.8,99.2,94.1,139.5s87.3,72,139.5,94.1  C395.3,939.4,452.7,951,512,951s116.8-11.6,170.9-34.5c52.3-22.1,99.2-53.8,139.5-94.1s72-87.3,94.1-139.5  C939.4,628.8,951,571.3,951,512s-11.6-116.8-34.5-170.9c-22.1-52.3-53.8-99.2-94.1-139.5c-40.3-40.3-87.3-72-139.5-94.1  C628.8,84.6,571.3,73,512,73s-116.8,11.6-170.9,34.5c-52.3,22.1-99.2,53.8-139.5,94.1c-40.3,40.3-72,87.3-94.1,139.5  C84.6,395.3,73,452.7,73,512z M312,492h351.7L536.2,365.8l28.1-28.4L740.8,512L564.2,686.6l-28.1-28.4L663.6,532H312V492z" id="XMLID_40_" />
                    <g id="XMLID_1_" />
                    <g id="XMLID_2_" />
                    <g id="XMLID_3_" />
                    <g id="XMLID_4_" />
                    <g id="XMLID_5_" />
                </svg>
                <svg class="arrow" id="right_arrow" style="enable-background:new 0 0 1024 1024;" version="1.1" viewBox="0 0 1024 1024" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path fill="#FF625C" d="M73,512c0,59.3,11.6,116.8,34.5,170.9c22.1,52.3,53.8,99.2,94.1,139.5s87.3,72,139.5,94.1  C395.3,939.4,452.7,951,512,951s116.8-11.6,170.9-34.5c52.3-22.1,99.2-53.8,139.5-94.1s72-87.3,94.1-139.5  C939.4,628.8,951,571.3,951,512s-11.6-116.8-34.5-170.9c-22.1-52.3-53.8-99.2-94.1-139.5c-40.3-40.3-87.3-72-139.5-94.1  C628.8,84.6,571.3,73,512,73s-116.8,11.6-170.9,34.5c-52.3,22.1-99.2,53.8-139.5,94.1c-40.3,40.3-72,87.3-94.1,139.5  C84.6,395.3,73,452.7,73,512z M312,492h351.7L536.2,365.8l28.1-28.4L740.8,512L564.2,686.6l-28.1-28.4L663.6,532H312V492z" id="XMLID_40_" />
                    <g id="XMLID_1_" />
                    <g id="XMLID_2_" />
                    <g id="XMLID_3_" />
                    <g id="XMLID_4_" />
                    <g id="XMLID_5_" />
                </svg>
            </div>
        </div>
        <div>
            <p class="p2">Explorez notre collection de livres dans diverses catégories littéraires. Que vous aimiez les romans classiques, les œuvres contemporaines ou les nouveaux talents, nous avons quelque chose pour chaque lecteur.</p>
        </div>
    </div>
    <div id="books_categories">
        <ul>
            <li>
                <div id="books_categories">
                    <div class="categorie">
                        <img src="./assets/img/roman.png" alt="Teloculture">
                        <h3>Roman</h3>
                        <p>Découvrez notre sélection de romans incontournables. Plongez dans des histoires captivantes et laissez-vous emporter par des récits fascinants.</p>
                    </div>
                </div>
            </li>
            <li>
                <div id="books_categories">
                    <div class="categorie">
                        <img src="./assets/img/type_bd_mangas.jpg" alt="Teloculture">
                        <h3>BD et Mangas</h3>
                        <p>Explorez nos incontournables BD et mangas ! Découvrez des récits palpitants et des dessins captivants pour une immersion totale.</p>
                    </div>
                </div>
            </li>
            <li>
                <div id="books_categories">
                    <div class="categorie">
                        <img src="./assets/img/type_jeunesse.jpg" alt="Teloculture">
                        <h3>Jeunesse</h3>
                        <p>Explorez notre catégorie jeunesse ! Des livres qui éveillent l'imagination, des aventures palpitantes et des personnages attachants vous attendent.</p>
                    </div>
                </div>
            </li>
            <li>
                <div id="books_categories">
                    <div class="categorie">
                        <img src="./assets/img/type_poesie.jpg" alt="Teloculture">
                        <h3>Poésie</h3>
                        <p>Plongez dans la magie de la poésie ! Laissez-vous envoûter par des vers qui captent l'amour, la nature et les émotions humaines avec une intensité saisissante.</p>
                    </div>
                </div>
            </li>
            <li>
                <div id="books_categories">
                    <div class="categorie">
                        <img src="./assets/img/type_biographie.jpg" alt="Teloculture">
                        <h3>Biographie</h3>
                        <p>Découvrez notre sélection de biographies ! Des récits captivants qui vous plongent dans la vie fascinante de personnalités inspirantes.</p>
                    </div>
                </div>
            </li>
            <li>
                <div id="books_categories">
                    <div class="categorie">
                        <img src="./assets/img/type_actualites.jpg" alt="Teloculture">
                        <h3>Actualités</h3>
                        <p>Explorez notre rubrique Actualités ! Restez à jour sur les événements récents, les tendances et les sujets d'actualité qui façonnent le monde contemporain.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <a href="/litterature"><button>VOIR PLUS <i class="fa-solid fa-arrow-right" style="color: #6887f6;"></i></button></a>
</section>
<section id="cinema">
    <div id="left_cine">
        <span>-Cinéma</span>
        <h2>Les dernières sorties au cinéma en DVD !</h2>
        <p class="p2">Ne manquez pas les dernières sorties de films en DVD. Que vous soyez fan de blockbusters, de films indépendants ou de documentaires, notre sélection vous garantit des heures de divertissement.</p>
        <a href="/cinema"><button>VOIR PLUS <i class="fa-solid fa-arrow-right" style="color: #6887f6;"></i></button></a>
    </div>
    <div id="right_cine">
        <img src="./assets/img/cinema.png" alt="Teloculture">
    </div>
</section>
<section id="faq">
    <span>-FAQ</span>
    <div>
        <div id="questions" x-data="{
            faqs: [
                {
                    question : 'Comment puis-je m\'inscrire et accéder aux ressources de la bibliothèque numérique ?',
                    answer : 'Pour vous inscrire, il suffit de se rendre à l\'accueil de votre médiathèque, demander à vous créer un compte. Les identifiants vous seront ensuite transmis par mail. Une fois inscrit, vous pourrez accéder à toutes nos ressources en vous connectant avec votre identifiant et votre mot de passe.',
                    isOpen : false,
                },
                {
                    question : 'Comment puis-je emprunter des livres numériques ou des films ?',
                    answer : 'Pour emprunter un livre ou un film, naviguez jusqu\'à la section souhaitée (Littérature ou Cinéma), puis cliquez sur le titre qui vous intéresse. Ensuite, cliquez sur le bouton \'Réserver\'. Suite à cela, vous pourrez aller chercher votre ressources directement à la médiathèque.',
                    isOpen : false,
                },
                {
                    question : 'Que faire si j\'ai des problèmes techniques ou des questions supplémentaires ?',
                    answer : 'Si vous rencontrez des problèmes techniques ou si vous avez des questions supplémentaires, vous pouvez nous contacter via la section \'Contactez-nous\' de notre site. Remplissez le formulaire de contact avec une description détaillée de votre problème ou question, et notre équipe de support vous répondra dans les plus brefs délais.',
                    isOpen : false,
                },
            ]
        }">
            <template x-for="faq in faqs" :key="faq.question">
                <div>
                    <button @click="faq.isOpen = !faq.isOpen">
                        <div x-text="faq.question"></div>
                    </button>
                    <div id="answer" x-text="faq.answer" x-show="faq.isOpen"></div>
                </div>
            </template>
        </div>
        <div>
            <h2>Qui sommes nous ?</h2>
            <p class="p2">Bienvenue sur Teloculture, votre médiathèque en ligne dédiée à la promotion de la culture sous toutes ses formes. Nous sommes passionnés par la littérature, le cinéma et les tendances culturelles. Notre mission est de vous offrir une plateforme riche en contenus diversifiés et de qualité, accessible à tous. Rejoignez notre communauté et partagez votre amour pour la culture avec nous.</p>
            <a href="/contact">
                <button>CONTACT <i class="fa-solid fa-arrow-right" style="color: #6887f6;"></i></button>
            </a>
        </div>
    </div>
</section>
@endsection