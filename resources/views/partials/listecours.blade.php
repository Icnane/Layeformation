<!doctype html>
<html class="no-js" lang="en">

<!-- <head> -->
@include('partials.head')
<!-- </head> -->

<!-- <body> -->
	<!--header-top start -->
    
	@include('partials.sidbar')
    @vite('resources/css/style.css')
          <title>Formations en Informatique</title>
          @vite('resources/css/styles.css')
            <body>
                <div class="formation-container">
                    <div class="formation">
                        <div class="promo">Promo: Néant</div>
                        <h3>Specialisation en santé mondiale
                        </h3>
                        <p>Fournir une compréhension des enjeux de la santé mondiale, permettant aux participants de travailler dans des contextes internationaux ou au sein d'organisations de santé publique</p>
                        <div class="details">Coût: 20F | 70h par semaine</div>
                        <a href="{{ route('inscription') }}">
        <button class="inscription-btn">S'inscrire</button>
    </a>
                    </div>
                    <div class="formation">
    <div class="promo">Promo: Néant</div>
    <h3>Formation d’Aide-Soignant</h3>
    <p>Préparer les aides-soignants à travailler en milieu hospitalier ou à domicile, en soutenant les infirmiers et en prenant soin des patients</p>
    <div class="details">Coût: 20F | 1ans par semaine</div>
    <a href="{{ route('inscription') }}">
        <button class="inscription-btn">S'inscrire</button>
    </a>
</div>
                    <div class="formation">
                        <div class="promo">Promo: Néant</div>
                        <h3>Diplôme d’État d’Auxiliaire de Puériculture</h3>
                        <p>Former des professionnels capables de travailler dans des crèches, des maternités ou des services de pédiatrie, en assurant le bien-être des enfants</p>
                        <div class="details">Coût: 20F | 12h par semaine</div>
                        <a href="{{ route('inscription') }}">
        <button class="inscription-btn">S'inscrire</button>
    </a>
                    </div>
                    <div class="formation">
                        <div class="promo">Promo: Néant</div>
                        <h3>Formation d’Ambulancier</h3>
                        <p> Préparer les ambulanciers à intervenir lors de situations d’urgence et à assurer le transport sécurisé des patients</p>
                        <div class="details">Coût: 20F | 12h par semaine</div>
                        <a href="{{ route('inscription') }}">
         <button class="inscription-btn">S'inscrire</button>
      </a>
                    </div>
                    <div class="formation">
                        <div class="promo">Promo: Néant</div>
                        <h3>MOOCs en Santé Publique</h3>
                        <p>Permettre aux professionnels de se former à leur rythme sur des thématiques actuelles et essentielles en santé publique</p>
                        <div class="details">Coût: 20F | 18h par semaine</div>
                        <a href="{{ route('inscription') }}">
        <button class="inscription-btn">S'inscrire</button>
    </a>
                    </div>
                    <div class="formation">
                        <div class="promo">Promo: Néant</div>
                        <h3>Formations en Risques Infectieux</h3>
                        <p>Former des professionnels à la gestion des risques infectieux, ce qui est particulièrement pertinent dans le contexte actuel de pandémie</p>
                        <div class="details">Coût: 20F | 12h par semaine</div>
                        <a href="{{ route('inscription') }}">
        <button class="inscription-btn">S'inscrire</button>
    </a>
                    </div>
            </body>
        

            @include('components.footer')
 <!-- </body> -->
	</html>
            