@extends('layout')

@section('content')
<h2>Documents dans le réseau</h2>

<!--Pour chaque produit sélectionné-->
<div>
    <div>
        <div class="img_book">
            <img src="./assets/img/imgbook.png" alt=""> <!-- couverture du livre -->
        </div>
        <div class="desc_book">
            <span>-BD / manga</span> <!-- type du document -->
            <div>
                <p class="book_name">Paradoxe. 1</p> <!-- nom du document -->
                <p class="author_name">Marazano, Richard</p> <!-- auteur/réalisateur du document -->
            </div>
            <p>Collection - 2023</p> <!--éditeur/acteurs du document -->
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, ...</p> <!-- résumé du document -->
        </div>
    </div>
    <a href="#"> <!--redirection vers détail document-->
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256" style="fill:#000000;">
                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <g transform="scale(5.12,5.12)">
                        <path d="M25,2c-12.6907,0 -23,10.3093 -23,23c0,12.69071 10.3093,23 23,23c12.69071,0 23,-10.30929 23,-23c0,-12.6907 -10.30929,-23 -23,-23zM25,4c11.60982,0 21,9.39018 21,21c0,11.60982 -9.39018,21 -21,21c-11.60982,0 -21,-9.39018 -21,-21c0,-11.60982 9.39018,-21 21,-21zM25,11c-1.65685,0 -3,1.34315 -3,3c0,1.65685 1.34315,3 3,3c1.65685,0 3,-1.34315 3,-3c0,-1.65685 -1.34315,-3 -3,-3zM21,21v2h1h1v13h-1h-1v2h1h1h4h1h1v-2h-1h-1v-15h-1h-4z"></path>
                    </g>
                </g>
            </svg>
            Plus d'informations
        </button>
    </a>


    <!-- si exemplaire dispo : -->
    <div>
        <div class="circleYes"></div>
        <p>Exemplaire disponible dans le réseau</p>
    </div>

    <!-- si exemplaire pas dispo : 
    <div>
        <div class="circleNo"></div>
        <p>Exemplaire pas disponible dans le réseau</p>
    </div>
-->
    <hr>
</div>
<button>
    Réserver !
</button>
@endsection